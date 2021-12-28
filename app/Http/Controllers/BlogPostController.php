<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\CommonMarkConverter;
use Aidantwoods\SecureParsedown\SecureParsedown;

class BlogPostController extends Controller
{

    public function index() {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostForm $request)
    {

        $this->validate(request(), [
            'title',
            'content',
        ]);
 
        $originalSlug = $slug = Str::slug(request('title'), '-');
        $posts = Post::slugLike($slug)->pluck('slug');
        $i=0;
        while($posts->contains($slug)){
            $slug = $originalSlug .'-'. ++$i;
        }

        if($slug == "-1") $slug = md5(uniqid(rand(), true));

        $post = Post::where('slug', '=', $slug)->first();

        if($post == null)
        {
            $user = $request->user();
            
            $formData = $request->all();
    
            $formData['slug'] = $slug;
            
            $post = $user->posts()->create($formData);

            $file = $request->file('image');

            if($file != null) {
                $imagePath = Storage::disk('local')->put($user->email . '/posts/'. $post->id, $file);
                PostImage::create([
                    'post_image_path' => 'storage/app/' . $imagePath,
                    'post_id' => $post->id 
                ]);
            }

            return $slug;

        }
        else
        {
            return redirect()->route('posts.create')->with('error', 'There is another post with that title. Please try another one.');
        }

    }

    public function single(Post $post, $slug)
    {

        $post = $post->withSlug($slug)->first();

        $environment = new Environment();
        
        $converter = new CommonMarkConverter([], $environment);

        $post->content = $converter->convertToHtml($post->content);

        $config = \HTMLPurifier_Config::createDefault();
        
        $config->set('Core.LexerImpl', 'DirectLex');
        $config->set('HTML.Allowed', 'h1,h2,h3,h4,h5,h6,br,b,i,strong,em,a,pre,code,img,tt,ins,del,sup,sub,p,ol,ul,table,thead,tbody,tfoot,blockquote,dl,dt,dd,kbd,q,samp,var,hr,li,tr,td,th,s,strike');
        $config->set('HTML.AllowedAttributes', 'img.src,*.style,*.class, code.class,a.href,*.target');
        
        $purifier = new \HTMLPurifier($config);
        $post->content = $purifier->purify($post->content);


        if($post != null) {
            return view('posts.single', ['post' => $post]);
        }

    }

    public function edit($post)
    {

        $post = Post::where('slug', '=', $post)->first();

        if($post == null) return redirect('/')->with('error', 'Post not found (test)');

        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $title = $request->input('title');
        $content = $request->input('content');

        $post->update(['title' => $title, 'content' => $content]);

        Log::build([
          'driver' => 'single',
          'path' => storage_path('logs/postupdate.log'),
        ])->info($request->user() . "\n" . "<updated>" . $post . '<request>' . $request);

        return redirect()->route('posts.single', ['slug' => $post->slug])
            ->withSuccess(__('Post updated successfully.'));
    }


}