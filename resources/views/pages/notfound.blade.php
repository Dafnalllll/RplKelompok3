<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <title>Andalas Wheels || Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
     <!-- Tailwind CSS (CDN for demo) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
</head>
<body class="bg-gradient-to-tr from-white via-blue-100 to-blue-300 min-h-screen flex items-center justify-center">
    <div class=" p-10 flex flex-col items-center max-w-md"
    data-aos="zoom-in"
    data-aos-duration="1000">
        <img src="{{ asset('img/andalaswheels.png') }}" alt="Logo" class="w-24 h-24 mb-6">
        <h1 class="text-5xl font-bold text-[#21408E] mb-4" style="font-family: 'Montserrat', sans-serif;">404</h1>
        <h2 class="text-2xl font-semibold font-[Carena] text-gray-700 mb-2">Halaman Tidak Ditemukan</h2>
        <p class="text-gray-500 mb-6 font-[Sans] text-center">Maaf, halaman yang kamu cari tidak tersedia.<br>Kembali ke beranda untuk melanjutkan perjalananmu!</p>
        <!-- AOS Wrapper untuk tombol -->
        <div data-aos="fade-up"
             data-aos-duration="1200"
             data-aos-delay="400">
            <!-- Button dengan hover effect -->
            <a href="{{ url('/') }}"
               class="inline-block px-6 py-2 rounded-full bg-[#21408E] text-white font-semibold hover:bg-blue-700 hover:scale-105 transition-all duration-300">
                Kembali ke Beranda
            </a>
        </div>
    </div>
     <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init();
    });
    </script>
</body>
</html>
