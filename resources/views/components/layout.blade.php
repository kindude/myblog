<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/public/uploads/icon.png') }}" type="image/png" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon"></script>
    <title>My Blog</title>
</head>
<body class="flex flex-col min-h-screen font-sans bg-gray-100">
<!-- Header -->
{{-- <header class="bg-indigo-600 py-4 text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        @if(auth()->user() and auth()->user()->is_admin)
            <a href="/admin">Admin Panel</a>
        @endif
        <a href="/" class="text-3xl font-bold">Yehor Dudnik</a>
        <nav class="space-x-6">
            <a href="/home" class="text-lg hover:text-gray-400">Home</a>
            <a href="/portfolio" class="text-lg hover:text-gray-400">Portfolio</a>
            <a href="/posts" class="text-lg hover:text-gray-400">Blog</a> <!-- Added "Blog" button -->
            <a href="/about" class="text-lg hover:text-gray-400">About</a>
            <a href="/contact" class="text-lg hover:text-gray-400">Contact</a>

        </nav>
        <div class="flex space-x-6">
            @guest
                <a href="/login" class="text-lg hover:text-gray-400">Login</a>
                <a href="/register" class="text-lg hover:text-gray-400">Register</a>
            @endguest

            @auth
                    <span class="text-lg">Welcome, <a href="/profile" class="hover:text-gray-400">{{ auth()->user()->name }}</a></span>
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="text-lg hover:text-gray-400">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header> --}}

<header class="bg-indigo-600 py-4 text-white shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        @if(auth()->user() and auth()->user()->is_admin)
            <a href="/admin">Admin Panel</a>
        @endif
        <a href="/" class="text-3xl font-bold">Yehor Dudnik</a>

        <button id="navbar-toggle" class="block lg:hidden">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <nav id="navbar" class="hidden sm:hidden lg:flex lg:space-x-6">            
            <a href="/home" class="text-lg hover:text-gray-400">Home</a>
            <a href="/portfolio" class="text-lg hover:text-gray-400">Portfolio</a>
            <a href="/posts" class="text-lg hover:text-gray-400">Blog</a>
            <a href="/about" class="text-lg hover:text-gray-400">About</a>
            <a href="/contact" class="text-lg hover:text-gray-400">Contact</a>
            <div class="flex space-x-6 pl-16">
                @guest
                    <a href="/login" class="text-lg hover:text-gray-400">Login</a>
                    <a href="/register" class="text-lg hover:text-gray-400">Register</a>
                @endguest
    
                @auth
                        <span class="text-lg">Welcome, <a href="/profile" class="hover:text-gray-400">{{ auth()->user()->name }}</a></span>
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="text-lg hover:text-gray-400">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>
    </div>

    <div id="dropdown-menu" class="lg:hidden hidden">
        <a href="/home" class="block py-2 text-lg hover:text-gray-400">Home</a>
        <a href="/portfolio" class="block py-2 text-lg hover:text-gray-400">Portfolio</a>
        <a href="/posts" class="block py-2 text-lg hover:text-gray-400">Blog</a>
        <a href="/about" class="block py-2 text-lg hover:text-gray-400">About</a>
        <a href="/contact" class="block py-2 text-lg hover:text-gray-400">Contact</a>
        <div class="flex space-x-6">
            @guest
                <a href="/login" class="text-lg hover:text-gray-400">Login</a>
                <a href="/register" class="text-lg hover:text-gray-400">Register</a>
            @endguest

            @auth
                    <span class="text-lg">Welcome, <a href="/profile" class="hover:text-gray-400">{{ auth()->user()->name }}</a></span>
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="text-lg hover:text-gray-400">Logout</button>
                </form>
            @endauth
        </div>
    </div>
    <x-flash>
    </x-flash>
</header>

<script>
        document.getElementById('navbar-toggle').addEventListener('click', function () {
        document.getElementById('dropdown-menu').classList.toggle('hidden');
    });
</script>


<!-- Main Content -->
<main class="container mx-auto py-10 flex-grow">

    {{ $slot }}
</main>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            &copy; 2023 Yehor Dudnik
        </div>
        <form action="/contact-form" method="get" class="flex space-x-2">
            <button type="submit" class="bg-indigo-600 text-white rounded-full py-2 px-6 hover:bg-indigo-700 focus:outline-none">Contact Me</button>
        </form>
    </div>
</footer>
</body>
</html>
