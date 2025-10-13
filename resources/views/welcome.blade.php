<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                        <h1 class="text-4xl font-bold text-center">Laravel</h1>
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lorem Ipsum - Dolor Sit Amet Consectetur</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS via CDN only - no Vite -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
        <div class="min-h-screen">
            
            <x-navbar />

            
            <x-slider />
   
            <section>
            <!-- Features Section -->
            <div id="features" class="py-16 bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-3xl">
                            Lorem Ipsum Dolor
                        </h2>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                            Sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>

                    <!-- Feature cards content -->
                    <div class="mt-16">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                            <!-- Feature 1 -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 shadow-md">
                                <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Ut Enim Ad Minim</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                    Veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>

                            <!-- Feature 2 -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 shadow-md">
                                <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Duis Aute Irure</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                    Dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                            </div>

                            <!-- Feature 3 -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 shadow-md">
                                <div class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11" />
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Excepteur Sint</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">
                                    Occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- How It Works -->
            <div id="how-it-works" class="py-16 bg-gray-50 dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-3xl">
                            Sed Ut Perspiciatis
                        </h2>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-300 mx-auto">
                            Unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                        </p>
                    </div>

                    <div class="mt-12">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                            <!-- Step 1 -->
                            <div class="text-center">
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                    <span class="text-lg font-bold">1</span>
                                </div>
                                <h3 class="mt-3 text-lg font-medium text-gray-900 dark:text-white">Nemo Enim</h3>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Ipsam voluptatem quia voluptas sit
                                </p>
                            </div>

                            <!-- Step 2 -->
                            <div class="text-center">
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                    <span class="text-lg font-bold">2</span>
                                </div>
                                <h3 class="mt-3 text-lg font-medium text-gray-900 dark:text-white">Neque Porro</h3>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Quisquam est qui dolorem ipsum quia
                                </p>
                            </div>

                            <!-- Step 3 -->
                            <div class="text-center">
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                    <span class="text-lg font-bold">3</span>
                                </div>
                                <h3 class="mt-3 text-lg font-medium text-gray-900 dark:text-white">At Vero Eos</h3>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Et accusamus et iusto odio dignissimos
                                </p>
                            </div>

                            <!-- Step 4 -->
                            <div class="text-center">
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-500 text-white">
                                    <span class="text-lg font-bold">4</span>
                                </div>
                                <h3 class="mt-3 text-lg font-medium text-gray-900 dark:text-white">Nam Libero</h3>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    Tempore cum soluta nobis est eligendi
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            
            <x-footer />

            
        </div>
    </body>
</html>
    </body>
</html>
                           


</html>