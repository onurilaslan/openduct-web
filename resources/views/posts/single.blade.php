<?php
    $dt = new DateTime();
    $dt->setTimeZone(new DateTimeZone('Europe/Istanbul'));
?>
@extends('layouts.app-master')

@section('content')

<div class="flex mx-auto max-w-screen-xl mb-10 mt-10">
    <article class="flex flex-col overflow-hidden p-4 pr-8 max-w-screen-md xl:max-w-screen-lg grow" >
        @role('admin')
        <div class="w-full flex flex-row space-x-12 justify-between items-center" >
            <a class="hover:text-violet-400 text-violet-500 dark:bg-fuchsia-700 dark:hover:bg-fuchsia-600 p-3 dark:text-zinc-300 rounded-lg transition-colors dark:shadow-md cursor-pointer" href="{{ route('posts.edit', ['post' => $post->slug]) }}" >Edit Article</a>
        </div>
        @endrole
        @if($post->post_images()->first() != null)
        <div class="flex items-center w-full max-w-screen-md mb-4 mt-8 overflow-hidden h-96">
            <img class="lazy object-cover object-top h-full w-full" data-original="{{ url($post->post_images()->first()->post_image_path) }}" alt="">
        </div>
        @endif
        <h1 class="font-bold text-zinc-500 dark:text-white text-7xl text-ellipsis overflow-hidden" >{{ $post->title }}</h1>
        <section class="post-content markdown" >
            {!! $post->content !!}
        </section>
    </article>
    <div class="h-full w-auto hidden lg:flex mt-12" >
        @if(App\Models\User::where('id', '=', $post->user_id)->first() != null)

        <div class=" w-full sm:flex sm:flex-col sm:justify-around sm:p-2 sm:pt-4 sm:pb-4 sm:dark:bg-gray-800/75 bg-white sm:shadow-md sm:rounded-lg space-y-6 w-96" >
            <div class="flex flex-row justify-around">
                <h3 class="dark:text-zinc-300 font-bold text-lg p-2 text-gray-600" >{{ App\Models\User::where('id', '=', $post->user_id)->first()->name }}</h3>
                <div class="w-auto h-auto rounded-full border-2 dark:border-fuchsia-500">
                    <img class='lazy w-20 h-20 object-cover rounded-full shadow cursor-pointer' data-original='https://openduct.net/storage/app/assets/user.png'>
                </div>
            </div>
            <div class="flex w-full justify-center" >
                @if(auth()->check() && auth()->user()->id != App\Models\User::where('id', '=', $post->user_id)->first()->id)
                <button id="follow" type="button" class="text-gray-600 font-semibold bg-stone-300/75 hover:bg-stone-200 dark:text-white p-2 rounded-md transition-colors w-full text-center cursor-pointer {{ auth()->user()->isFollowing(App\Models\User::where('id', '=', $post->user_id)->first()) ? 'dark:bg-gray-700 dark:hover:bg-gray-600' : 'dark:bg-fuchsia-500 dark:hover:bg-fuchsia-400 ' }}" data-user="{{ auth()->check() ? $post->user_id : '' }}" data-unfollow="{{ auth()->user()->isFollowing(App\Models\User::where('id', '=', $post->user_id)->first()) ? 'unfollow' : '' }}">{{ auth()->check() && auth()->user()->isFollowing(App\Models\User::where('id', '=', $post->user_id)->first()) ? "Unfollow" : 'Follow' }}</button>
                @else
                <button type="button" class="text-gray-700 font-semibold bg-zinc-200/75 dark:text-white dark:bg-fuchsia-500 dark:hover:bg-fuchsia-400 p-2 rounded-md transition-colors w-full text-center dark:bg-fuchsia-400/50 pointer-events-none">Follow</button>
                @endif
            </div>
            <div class="flex flex-col items-start w-full" >
                <h6 class="dark:text-gray-300 font-semibold text-gray-600" >Joined</h6>
                <?php
                    $userJoinDate = $dt->setTimestamp(App\Models\User::where('id', '=', $post->user_id)->first()->created_at->getTimestamp()); 
                ?>
                <span class="dark:text-gray-400 text-gray-500" >{{ $userJoinDate->format('M jS Y') }}</span>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection

@section('scripts')
<script>
    let lazyload_config = {
        effect: "fadeIn",
        effectspeed: 500,
    }
    $(document).ready(function() {
        $('img.lazy').lazyload(lazyload_config).trigger("lazyload");
    })

    $(document).ajaxStop(function(){
        $("img.lazy").lazyload(lazyload_config).removeClass("lazy");
    });

    const follow = () => {
        if($('#follow').data('user') && Number($('#follow').data('user')) >= 0) {
            const formData = new FormData();
            formData.append('user_id', $('#follow').data('user'));
            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
            if($('#follow').data('unfollow') == 'unfollow') {
                formData.append('unfollow', true);
            }
            $.ajax({
                url: "https://" + window.location.hostname + "/follow/" + $('#follow').data('user'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if(data['success'] == 1) {
                        location.reload();
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    console.log("Status: " + textStatus); 
                    console.log("Error: " + errorThrown); 
                } 
            })
        }
    }
    $('#follow').on('click', follow);
</script>
@endsection
