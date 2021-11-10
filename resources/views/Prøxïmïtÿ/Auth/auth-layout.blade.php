<!doctype html>
    <html class="dark"  lang="en">
<head>
    <script src="{{asset('js/dark-mode.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    <title>@yield('page_title')</title>
</head>
<body>

<section class="flex bg-gray-100 dark:bg-gray-900 flex-col md:flex-row h-screen items-center">

    <a href="" class="text-gray-300 p-5 z-10 absolute right-0 top-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark:text-gray-300 dark:hover:text-purple-700 duration-300 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
    </a>

    <div class="bg-gray-100 dark:bg-gray-9090 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover">
    </div>

    @yield('content')

</section>

@livewireScripts
</body>
</html>
