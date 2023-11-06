<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/app.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Blog</title>
</head>

<body class="flex flex-col min-h-screen">
<!-- Header -->
<header class="bg-blue-500 p-4 text-white ml-0">

    <nav class="flex justify-between items-center">
        <div>
            <a href="/" class="text-2xl font-bold">Your Blog</a>
        </div>
        <div class="flex">
            <ul class="flex space-x-10">
                <li class="text-l font-bold uppercase hover:text-gray-400 hover:text-xl transition-transform transform hover:scale-110">
                    <a href="/" class="{{ Request::is('/') ? 'text-blue-700' : '' }}">Home</a>
                </li>
                <li class="text-l font-bold uppercase hover:text-gray-400 hover:text-xl transition-transform transform hover:scale-110">
                    <a href="/posts" class="{{ Request::is('posts') ? 'text-blue-700' : '' }}">Posts</a>
                </li>
                <li class="text-l font-bold uppercase hover:text-gray-400 hover:text-xl transition-transform transform hover:scale-110">
                    <a href="/about" class="{{ Request::is('about') ? 'text-blue-700' : '' }}">About</a>
                </li>
            </ul>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @guest
                <a href="/login" class="text-l font-bold uppercase mr-10 hover:text-gray-400 hover:text-xl transition-transform transform hover:scale-110">Log in</a>
                <a href="/register" class="text-l font-bold uppercase mr-10 hover:text-gray-400 hover:text-xl transition-transform transform hover:scale-110">Register</a>
            @endguest

            @auth
                <span class="text-s font-bold uppercase mr-10">Welcome, {{ auth()->user()->name }}</span>
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="text-l font-bold uppercase mr-10 hover:text-gray-400 hover:text-xl transition-transform transform hover:scale-110">Log Out</button>
                </form>
            @endauth
        </div>
    </nav>

</header>

<main {{ $attributes(['class' => "px-6 py-8 flex-grow"]) }}>
    {{ $slot }}
</main>

<x-flash></x-flash>

<!-- Footer -->
<footer class="bg-gray-700 text-white p-4">

        <div class="container mx-auto flex justify-between">
            <div>
                &copy; 2023 Your Blog
            </div>
            <div>
                <form action="/contact" method="post">
                    <input type="email" name="email" placeholder="Your Email" class="rounded-l py-2 px-3 focus:outline-none" required>
                    <button type="submit" class="bg-blue-500 text-white rounded-r py-2 px-3 hover:bg-blue-600 focus:outline-none">Contact Me</button>
                </form>
            </div>
        </div>
    </footer>

</body>
</html>
