<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/app.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="flex flex-col min-h-screen">
<!-- Header -->
<header class="bg-blue-500 p-4 text-white">
    <nav class="flex justify-between items-center">
        <div>
            <a href="/" class="text-2xl font-bold">Your Blog</a>
        </div>
        <div class="mt-8 md:mt-0 flex items-center">
            @guest
                <a href="/login" class="text-xs font-bold uppercase mr-10">Log in</a>
                <a href="/register" class="text-xs font-bold uppercase mr-10">Register</a>
            @endguest

            @auth
                <span class="text-s font-bold uppercase mr-10">Welcome, {{ auth()->user()->name }}</span>
                <form method="post" action="/logout">
                    @csrf
                    <button type="submit" class="text-s font-bold font-semibold text-blue-700 mr-10">Log Out</button>
                </form>
            @endauth
        </div>

    </nav>
</header>

<div class="px-6 py-8 flex-grow">
    {{ $slot }}
</div>

<x-flash></x-flash>

<!-- Footer -->
<footer class="bg-gray-700 text-white p-4">
    <!-- Your footer content -->
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
