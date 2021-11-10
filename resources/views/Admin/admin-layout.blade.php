<!doctype html>
<html lang="en">
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
<header>
    <header class="shadow-sm">
        <div class="p-2 mx-auto max-w-screen-xl">
            <div class="flex items-center justify-between space-x-4 lg:space-x-10">
                <div class="flex lg:w-0 lg:flex-1">
                    <span class="text-2xl font-bold">ABC Evening Institute</span>
                </div>

                <nav class="hidden text-sm font-medium space-x-8 md:flex">

                    <a class="text-gray-500 @if(Route::is('admin.students')) font-bold text-blue-400 @endif" href="{{route('admin.students')}}">Students</a>
                    <a class="text-gray-500 @if(Route::is('admin.teachers')) font-bold text-blue-400 @endif" href="{{route('admin.teachers')}}">Teacher</a>
                    <a class="text-gray-500 @if(Route::is('admin.courses')) font-bold text-blue-400 @endif" href="{{route('admin.courses')}}">Courses</a>
                    <a class="text-gray-500 @if(Route::is('admin.teacher-assignment')) font-bold text-blue-400 @endif" href="{{route('admin.teacher-assignment')}}">Teacher Assignment</a>
                    <a class="text-gray-500 @if(Route::is('admin.student-assignment')) font-bold text-blue-400 @endif" href="{{route('admin.student-assignment')}}">Student Assignment</a>

                </nav>

                <div class="items-center justify-end flex-1 hidden space-x-4 sm:flex">
                    @auth
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="px-5 py-2 text-sm font-medium text-white bg-red-600 rounded-lg" href=""> Log out </button>
                        </form>
                    @else
                        <a class="px-5 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-lg" href="{{route('prox-login')}}"> Log in </a>
                        <a class="px-5 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg" href="{{route('prox-register')}}"> Sign up </a>

                    @endauth
                </div>

                <div class="lg:hidden">
                    <button class="p-2 text-gray-600 bg-gray-100 rounded-lg" type="button">
                        <span class="sr-only">Open menu</span>
                        <svg
                            aria-hidden="true"
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewbox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>
</header>
<body>
@yield('content')
@livewireScripts
</body>
</html>
