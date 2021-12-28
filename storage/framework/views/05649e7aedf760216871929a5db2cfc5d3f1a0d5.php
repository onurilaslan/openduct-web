<?php
    $dt = new DateTime();
    $dt->setTimeZone(new DateTimeZone('Europe/Istanbul'));
?>


<?php $__env->startSection('content'); ?>
<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
<div class="flex justify-end max-w-xl mx-auto mt-9" >
    <a class="dark:bg-fuchsia-700 dark:hover:bg-fuchsia-600 font-bold rounded-md p-3 dark:text-white shadow-md transition-colors" href="<?php echo e(route('posts.create')); ?>">New Post</a>
</div>
<?php endif; ?>
<div id="post-data">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class='post-card flex max-w-xl my-10 bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden mx-auto'>
        <div class='flex items-center w-full z-0 relative'>
            <?php if($post->post_images()->first() != null): ?>
            <div class="h-full w-full absolute opacity-20" style="z-index: -1">
                <img class="lazy object-cover object-top h-full w-full" data-original='<?php echo e(url($post->post_images()->first()->post_image_path)); ?>'>
            </div>
            <?php endif; ?>
            <div class='w-full'>
                <div class="flex flex-row justify-between mt-2 px-2 py-3 mx-3">
                    <div class="flex flex-row" >
                        <div class="w-auto h-auto rounded-full border-2 border-fuchsia-500">
                            <img class='lazy w-12 h-12 object-cover rounded-full shadow cursor-pointer' data-original='https://openduct.net/storage/app/assets/user.png'>
                        </div>
                        <div class="flex flex-col mb-2 ml-4 mt-1">
                            <div class='text-gray-600 dark:text-gray-100 text-sm font-semibold'><?php echo e(App\Models\User::where('id', '=', $post->user_id)->first()->name); ?></div>
                            <div class='flex w-full mt-1 flex-col'>
                                <div class='text-gray-400 dark:text-gray-300 font-thin text-xs'>
                                    <?php
                                        $postCreatedAt = $dt->setTimestamp($post->created_at->getTimestamp()); //date('l \a\t\ g:i:a - j/n/Y', $post->created_at->getTimeStamp())
                                    ?>
                                    • <?php echo e($postCreatedAt->format('D \a\t\ g:i:a - j/n/Y')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="" >
                    <a href="<?php echo e(route('posts.single', $post->slug)); ?>">
                        <h3 class='text-gray-600 dark:text-gray-100 font-semibold text-lg mb-2 mt-6 mx-3 px-2'>
                            <?php echo e($post->title); ?>

                        </h3>
                    </a>
                    <p class='post-content text-gray-500 dark:text-gray-200 font-thin text-sm mb-6 mx-3 px-2'>
                    </p>
                </section>
                <div class='text-gray-400 font-thin text-sm mb-6 mx-3 px-2'>
                    <?php
                        $postUpdatedAt = $dt->setTimestamp($post->updated_at->getTimeStamp()); // date('l \a\t\ g:i:a - j/n/Y', $post->updated_at->getTimeStamp())
                    ?>
                    last update • <?php echo e($postUpdatedAt->format('D \a\t\ g:i:a - j/n/Y')); ?>

                </div>
                <div class="flex mt-2 px-2 py-3 mx-2">
                    <a class="dark:bg-fuchsia-500 dark:text-white pl-12 pr-12 text-center rounded-md p-1 pr-2 pl-2 mb-2 font-bold shadow-md dark:shadow-gray-500/40 dark:hover:bg-fuchsia-400 transition-colors" href="<?php echo e(route('posts.single', $post->slug)); ?>" >Read</a>
                </div>
            </div>
        </div>
    </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="flex justify-center items-center max-w-xl mx-auto">
    <?php echo e($posts->links('pagination::tailwind')); ?>

</div>

<div class="ajax-load flex justify-center items-center" style="display:none">
   <img src="https://cdn2.scratch.mit.edu/get_image/gallery/1832260_170x100.png" alt="">
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script>

    let lazyload_config = {
        effect: "fadeIn",
        effectspeed: 500,
    }

    $('#post-data').html(make_skeleton(Number("<?=count($posts) ? count($posts) : 1 ?>")));

    $(document).ready(function() {
        $('img.lazy').lazyload(lazyload_config).trigger("lazyload");
        load_content(Number($(".pagination").find('.active').text()))
    })

    $(document).ajaxStop(function(){
        $("img.lazy").lazyload(lazyload_config).removeClass("lazy");
        window.scrollTo(0, 0);
    });


    function make_skeleton(c) {
      var output = '';
      for(var count = 0; count < c; count++) {
        output += "<div class='flex max-w-xl my-10 bg-white dark:bg-gray-600 shadow-md rounded-lg overflow-hidden mx-auto'>";
        output += "<div class='flex items-center w-full z-0 relative'>";
        output += "<div class='w-full'>";
        output += "<div class='flex flex-col justify-between mt-2 px-2 py-3 mx-3'>";
        output += "<div class='skeleton skeleton-img'>"
        output += '</div>';
        output += '<div class="skeleton skeleton-text">';
        output += '</div>';
        output += '<div class="skeleton skeleton-text">';
        output += '</div>';
        output += '<div class="skeleton skeleton-text">';
        output += '</div>';
        output += '<div class="skeleton skeleton-text">';
        output += '</div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';
      }
      return output;
    }
    function load_content(page) {
        $.ajax({
            url: '?page=' + page,
            type: "get",
        }).done(function(data) {
            var doc = new DOMParser().parseFromString(data, "text/html");
            const c = doc.getElementById('post-data').innerHTML;
            if(c.trim() == "") {
                return;
            }
            
            $('#post-data').html(c)
            window.history.pushState({},"", "?page=" + page);
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
        });
    }

    $('.page-link').on('click', (e) => {
        e.preventDefault();
        const page = e.target.firstChild.textContent.trim();
        if(page != "") {
            load_content(Number(page));
            $(".pagination").find('.active').toggleClass('active dark:bg-fuchsia-600')
            e.target.classList.toggle('dark:bg-fuchsia-600')
            e.target.classList.toggle('active')
        }
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/openduct/public_html/resources/views/posts/index.blade.php ENDPATH**/ ?>