<?php 

function getRoute($route) {
    $a = explode('/', route($route));
    $route = $a[count(explode('/', route($route))) - 1];

    return $route == 'openduct.net' ? '/' : $route;
}

$homeIndex = 'home.index';
$postsIndex = 'posts.index';


$homeRouteUrl = route($homeIndex);
$homeRoute = getRoute($homeIndex);

$postsRouteUrl = route($postsIndex);
$postsRoute = getRoute($postsIndex);

?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://openduct.net/storage/app/assets/brand.svg" type="image/x-icon">
    <title>OpenDuct.net - Start developing your ideas with others</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            screens: {
              'small': '576px',
            },
          },
        },
      }
    </script>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/github.min.css" integrity="sha512-0aPQyyeZrWj9sCA46UlmWgKOP0mUipLQ6OZXu8l4IcAmD2u31EPEy9VcIMvl7SoAaKe8bLXZhYoMaE/in+gcgA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  </head>
<body class="bg-zinc-100 dark:bg-gray-700">
    
    @include('layouts.partials.hamburger')
    @include('layouts.partials.navbar')

    <main class="container mx-auto">
        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <script>
      $('.hamburger').on('click', () => {
        const sidebar = document.getElementById('hamburger');
        if (!sidebar) return;
        if(sidebar.classList.contains('hidden')) sidebar.classList.remove('hidden');
        else sidebar.classList.add('hidden');
      })
    </script>

    <script>

      var darkHighlight = '<link highlight="dark" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/github-dark.min.css" integrity="sha512-rO+olRTkcf304DQBxSWxln8JXCzTHlKnIdnMUwYvQa9/Jd4cQaNkItIUj6Z4nvW1dqK0SKXLbn9h4KwZTNtAyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />'

      $('.switchTheme').on('click', () => {
        let htmlClasses = document.querySelector('html').classList;
          if(localStorage.theme == 'dark') {
              htmlClasses.remove('dark');
              localStorage.removeItem('theme')
              $("link[highlight=dark]").remove();
              $('.rocket-border').attr('stroke', '#2F0935')
          } else {
              $('.rocket-border').attr('stroke', '');
              htmlClasses.add('dark');
              $('head').append(darkHighlight)
              localStorage.theme = 'dark';
        }
      })

    </script>

    <script>

      if (localStorage.theme === 'dark' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.querySelector('html').classList.add('dark')
          $('head').append(darkHighlight)
          $('.rocket-border').attr('stroke', '');
      } else if (localStorage.theme === 'dark') {
          document.querySelector('html').classList.add('dark')
          $('head').append(darkHighlight)
          $('.rocket-border').attr('stroke', '');
      }

    </script>


    @section("scripts")

    @show
  </body>
</html>