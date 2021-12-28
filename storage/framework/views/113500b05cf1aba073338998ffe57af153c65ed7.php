<div id="hamburger" class="h-full w-screen fixed hidden" style="z-index: 9999999999">
    <div class="h-full relative">

        <div class="h-full flex flex-col sm:flex-row sm:justify-around absolute">
            <div class="h-full bg-white dark:bg-gray-800 w-screen">
                <div class="hamburger flex lg:hidden mt-10 mr-10 p-4 justify-end cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 fill-red-500"
                        fill="rgb(107, 114, 128)"
                        viewBox="0 0 24 24"
                        >
                        <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                        </path>
                    </svg>
                </div>
                <nav class="mt-10 px-6 ">
                    <button class="switchTheme">darkmode</button>
                    <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-200  text-gray-600 dark:text-gray-400 rounded-lg <?php echo e(Request::path() == $homeRoute ? 'bg-gray-100 dark:bg-gray-600' : ''); ?>" href="<?php echo e($homeRouteUrl); ?>">
                        <span class="mx-4 text-lg font-normal">
                            Home
                        </span>
                        <span class="flex-grow text-right">
                        </span>
                    </a>
                    <a class="hover:text-gray-800 hover:bg-gray-100 flex items-center p-2 my-6 transition-colors dark:hover:text-white dark:hover:bg-gray-600 duration-200  text-gray-800 dark:text-gray-100 rounded-lg <?php echo e(Request::path() == $postsRoute ? 'bg-gray-100 dark:bg-gray-600' : ''); ?>" href="<?php echo e($postsRouteUrl); ?>">
                        <span class="mx-4 text-lg font-normal">
                            Posts
                        </span>
                        <span class="flex-grow text-right">
                        </span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/openduct/public_html/resources/views/layouts/partials/hamburger.blade.php ENDPATH**/ ?>