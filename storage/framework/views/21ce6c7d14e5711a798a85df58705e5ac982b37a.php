<nav class="<?php echo e(Route::currentRouteName() == 'posts.single' ? '' : 'sticky'); ?> top-0 px-4 py-4 w-full bg-white/75 dark:bg-gray-800/75" style="z-index: 999999999">
  <div class="flex justify-center items-center max-w-screen-xl mx-auto w-full" >
    <div class="" >
      <a href="<?php echo e(route('home.index')); ?>">
        <h3 class="text-2xl font-medium text-fuchsia-500 dark:text-fuchsia-300">
        <svg width="48" height="48" viewBox="0 0 510 612" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="Rocket">
            <g id="RocketMain">
              <mask id="path-1-inside-1_2_49" fill="white">
                <path d="M101.731 354.138C96.5753 378.866 92.6608 400.146 92.6608 410.356C92.6608 505.051 216.416 587.696 230.539 596.807L253.843 611.876L277.179 596.811C291.31 587.701 415.212 505.063 415.212 410.361C415.212 400.151 411.945 378.869 406.79 354.138L509.193 281.845L509.193 20.5846L379.855 110.707L254.037 0.876142L128.766 110.707L0.193305 20.5846L0.193302 281.845L101.731 354.138ZM307.068 272.629C313.766 299.64 320.281 327.195 325.473 350.637L182.169 350.637C187.361 327.195 193.876 299.64 200.571 272.629L307.068 272.629ZM253.754 524.459C222.191 499.57 178.343 457.469 171.968 419.465L335.664 419.465C329.251 457.31 285.32 499.513 253.754 524.459ZM430.482 163.982L430.482 249.093L389.316 277.855C384.486 258.016 379.928 240.882 377.318 230.692L371.094 205.115L430.482 163.982ZM253.82 98.2164L306.761 144.514L253.82 188.589L200.876 144.514L253.82 98.2164ZM78.9047 163.982L137.529 205.115L130.757 230.688C128.146 240.879 124.137 258.013 119.307 277.855L78.9047 249.093L78.9047 163.982Z"/>
              </mask>
              <path class="rocket-border" d="M101.731 354.138C96.5753 378.866 92.6608 400.146 92.6608 410.356C92.6608 505.051 216.416 587.696 230.539 596.807L253.843 611.876L277.179 596.811C291.31 587.701 415.212 505.063 415.212 410.361C415.212 400.151 411.945 378.869 406.79 354.138L509.193 281.845L509.193 20.5846L379.855 110.707L254.037 0.876142L128.766 110.707L0.193305 20.5846L0.193302 281.845L101.731 354.138ZM307.068 272.629C313.766 299.64 320.281 327.195 325.473 350.637L182.169 350.637C187.361 327.195 193.876 299.64 200.571 272.629L307.068 272.629ZM253.754 524.459C222.191 499.57 178.343 457.469 171.968 419.465L335.664 419.465C329.251 457.31 285.32 499.513 253.754 524.459ZM430.482 163.982L430.482 249.093L389.316 277.855C384.486 258.016 379.928 240.882 377.318 230.692L371.094 205.115L430.482 163.982ZM253.82 98.2164L306.761 144.514L253.82 188.589L200.876 144.514L253.82 98.2164ZM78.9047 163.982L137.529 205.115L130.757 230.688C128.146 240.879 124.137 258.013 119.307 277.855L78.9047 249.093L78.9047 163.982Z" fill="#8F3D9C" stroke="#2F0935" stroke-width="20" mask="url(#path-1-inside-1_2_49)"/>
            </g>
          </g>
        </svg>
        </h3>
      </a>
    </div>
    
    <div class="hidden space-x-12 lg:flex flex-1 justify-center items-center">
      <a class="dark:text-gray-100 transition-colors p-0.5 pl-3 pr-3 font-bold rounded-full <?php echo e(Request::path() == $homeRoute ? 'hover:bg-fuchsia-400 bg-fuchsia-500 text-white' : 'hover:bg-fuchsia-400/25 text-gray-600'); ?>" href="<?php echo e($homeRouteUrl); ?>">Home</a>
      <a class="dark:text-gray-100 transition-colors p-0.5 pl-3 pr-3 font-bold rounded-full <?php echo e(Request::path() == $postsRoute ? 'hover:bg-fuchsia-400 bg-fuchsia-500 text-white' : 'hover:bg-fuchsia-400/25 text-gray-600'); ?>" href="<?php echo e($postsRouteUrl); ?>">Blog</a>
      <a class="dark:text-gray-100 transition-colors p-0.5 pl-3 pr-3 font-bold rounded-full hover:bg-fuchsia-400/25 text-gray-600" href="#">Premium</a>
      <a class="dark:text-gray-100 transition-colors p-0.5 pl-3 pr-3 font-bold rounded-full hover:bg-fuchsia-400/25 text-gray-600" href="#">Support</a>
    </div>
    <div class="hidden lg:flex space-x-8 items-center" >
      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
          width="24" height="24"
          viewBox="0 0 24 24"
          class="switchTheme fill-gray-600 dark:fill-gray-100">    
          <path d="M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z">        
          </path>
      </svg>
      <?php if(auth()->guard()->guest()): ?>
      <a class="dark:text-gray-100 transition p-1 pl-2 pr-2 text-gray-600 font-bold border-solid border-2 dark:border-gray-100 border-gray-600 rounded-full" href="<?php echo e(route('login')); ?>">Sign In</a>
      <?php endif; ?>
    </div>
  
    <div class="hamburger flex lg:hidden cursor-pointer text-gray-500 flex-1 justify-end">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="w-8 h-8"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16"
        />
      </svg>
    </div>
  </div>
</nav>

<?php /**PATH /home/openduct/public_html/resources/views/layouts/partials/navbar.blade.php ENDPATH**/ ?>