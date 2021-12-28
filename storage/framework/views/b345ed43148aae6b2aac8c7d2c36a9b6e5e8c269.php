<?php if(auth()->guard()->check()): ?>


<?php $__env->startSection('content'); ?>
<?php if(session()->get('error')): ?>
    <span>Error: <?php echo e(session()->get('error')); ?></span>
<?php endif; ?>
<div class="w-full mx-auto">
    <form id="create_post" class="flex flex-col space-y-12" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="w-full flex flex-row space-x-12 justify-between items-center pl-4 pr-4" >
            <button class="dark:bg-fuchsia-500 dark:hover:bg-fuchsia-400 p-3 dark:text-zinc-300 rounded-lg transition-colors shadow-md mt-4 mb-4"type="submit">Publish</button>
            <a class="dark:bg-gray-800 dark:hover:bg-gray-900 p-3 dark:text-zinc-300 rounded-md transition-colors shadow-md whitespace-nowrap mt-4 mb-4" href="<?php echo e(route('posts.index')); ?>" >Back to articles</a>
        </div>
        <div class="w-full">
            <input class="w-2/4 p-3 dark:bg-inherit outline-none dark:text-zinc-300 text-3xl" type="text" name="title" placeholder="Title" />
        </div>
        <div class="w-full">
            <textarea class="w-full p-3 dark:bg-inherit outline-none dark:text-zinc-300 text-xl" name="content" cols="30" rows="10" placeholder="Spit your ideas here..."></textarea>
        </div>
        <div class="flex flex-col w-full space-y-6" >
            <label role="banner-container" class="flex overflow-hidden max-w-md z-0 shadow-md font-bold bg-white rounded-md tracking-wide uppercase cursor-pointer dark:bg-gray-900 dark:hover:bg-gray-800 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                <span class="text-base leading-normal z-10 p-3">Select Banner</span>
                <input type='file' name="image" class="hidden" />
            </label>
            <div role="preview-container" class="flex relative w-full h-full"></div>
        </div>
    </form>
</div>

<div id="preview" ></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>

    $('input[name=image]').change((e) => {;
        if(document.querySelector('input[name=image]').files.length > 0) {
        const content = '<div role="banner-preview" class="h-full w-full max-w-md mb-12 rounded-md shadow-md p-2 dark:bg-gray-800"><img class="lazy object-cover h-full w-full" src="'+ URL.createObjectURL(document.querySelector('input[name=image]').files[0]) +'" width="64" height="64"  ></div>';
        if($('div[role=banner-preview]').length == 0) 
            $('div[role=preview-container]').append(content);
        else
            $('div[role=banner-preview]').html(content);
            
        // $('label[role=banner-container]').addClass('dark:bg-gray-900 dark:hover:bg-gray-800')
        // $('label[role=banner-container]').text('Image uploaded');
        // $('label[role=banner-container]').append('<input type="file" name="image" class="hidden" />')
        }
    })

    $('#create_post').submit((e) => {
        e.preventDefault()
        const formData = new FormData();
        formData.append('_token', $('[name=_token]').val());
        formData.append('title', $('[name=title]').val());
        formData.append('content', $('[name=content]').val());
        formData.append('image', document.querySelector('[name=image]').files[0]);
        $.ajax({
            url: "<?= route('posts.create') ?>",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if(typeof data == "string" && data != "") {
                    window.location = "https://" + window.location.hostname + "/articles/" + data;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                // console.log("Status: " + textStatus); 
                // console.log("Error: " + errorThrown); 
            }     
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/openduct/public_html/resources/views/posts/create.blade.php ENDPATH**/ ?>