<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aspikmas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased bg-white">

    <!-- Navbar -->
<x-navbar />

    <main class="pt-16"> <!-- padding top buat jarak navbar fixed -->
        <!-- Slider -->
        <x-slider />

        <!-- Features Section -->
        <section id="features" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-2xl font-extrabold tracking-tight text-black sm:text-3xl">
                        Aspikmas
                    </h2>
                    <p class="mt-4 max-w-2xl text-xl text-gray-700 mx-auto">
                        Asosiasi Pengusaha Mikro Kecil Menengah (ASPIKMAS) adalah untuk mengembangkan dan memajukan para pelaku UMKM di Kabupaten Banyumas. 
                    </p>
                    <div class="mt-8 max-w-4xl mx-auto text-left">
                        <p class="text-lg text-black mb-4">
                            Melalui situs web dan aktivitasnya, Aspikmas Kembaran berupaya untuk:
                        </p>
                        <ol class="list-decimal list-inside space-y-3 text-gray-800">
                            <li class="text-base leading-relaxed">
                                <span class="font-medium text-black">Memberikan wadah bagi para pelaku UMKM.</span> 
                                Aspikmas berfungsi sebagai organisasi yang mengumpulkan para pengusaha mikro, kecil, dan menengah untuk berkolaborasi dan berkembang bersama.
                            </li>
                            <li class="text-base leading-relaxed">
                                <span class="font-medium text-black">Meningkatkan kinerja UMKM.</span> 
                                Hal ini dilakukan dengan mengadakan berbagai kegiatan, seperti bazar dan pelatihan digital marketing, untuk membantu para anggota mengembangkan usahanya.
                            </li>
                            <li class="text-base leading-relaxed">
                                <span class="font-medium text-black">Menjadi jembatan informasi.</span> 
                                Aspikmas berperan dalam menyampaikan informasi dari tingkat kabupaten ke tingkat kecamatan dan sebaliknya, memastikan para anggotanya selalu mendapatkan informasi terbaru.
                            </li>
                            <li class="text-base leading-relaxed">
                                <span class="font-medium text-black">Menginspirasi UMKM untuk naik kelas.</span> 
                                Melalui slogan seperti "UMKM Naik Kelas" dan "ASPIKMAS Menginspirasi Indonesia", asosiasi ini mendorong para anggotanya untuk terus meningkatkan kualitas dan skala usaha.
                            </li>
                        </ol>
                    </div>
                </div>
               
        </section>

        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-extrabold tracking-tight text-black sm:text-3xl">
                        Lokasi Kami
                    </h2>
                    <p class="mt-4 text-xl text-gray-700">
                        Galeri UKM Banyumas Raya
                    </p>
                </div>
                <div class="w-full h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.0785766849842!2d109.23779670927488!3d-7.421131711023076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f5c88b415e1%3A0x12dc7703a7249995!2sGaleri%20UKM%20Banyumas%20Raya!5e0!3m2!1sid!2sid!4v1733732000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <x-footer />

</body>
</html>
