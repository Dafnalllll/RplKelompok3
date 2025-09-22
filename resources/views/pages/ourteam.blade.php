<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <title>Our Team | Andalas Wheels</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Inline Tailwind styles here if needed */
        </style>
    @endif
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen">
    {{-- Import Navbar --}}
    @include('components.navbar')
    
    <!-- Hero Section -->
    <div class="py-20 px-6">
        <div class="max-w-6xl mx-auto text-center" 
             data-aos="fade-up" 
             data-aos-duration="1000">
            <h1 class="text-5xl font-bold text-[#21408E] mb-6 font-[Montserrat]">Meet Our Team</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                We are a group of passionate individuals committed to delivering the best motorcycle rental service. 
                Our team combines expertise, creativity, and dedication to ensure your journey is smooth and memorable.
            </p>
        </div>
    </div>

    <!-- Team Cards Section -->
    <div class="py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                
                @php
                $teamMembers = [
                    [
                        'name' => 'Rizki Dafa Naldi',
                        'position' => 'Project Manager, Front-End Developer',
                        'description' => 'Visionary leader with 10+ years experience in automotive industry. Passionate about innovation and customer satisfaction.',
                        'image' => 'img/ourteam/dafa.png',
                        'instagram' => 'https://www.instagram.com/daf_nal/',
                        'linkedin' => 'https://www.linkedin.com/in/daffa-naldi-935b55341/',
                        'delay' => '100'
                    ],
                    [
                        'name' => 'Alpintan Safarah Putri',
                        'position' => 'Designer (UI/UX)',
                        'description' => 'Tech enthusiast driving digital transformation. Expert in mobile apps and system optimization for seamless user experience.',
                        'image' => 'img/ourteam/pintan.png',
                        'instagram' => 'https://www.instagram.com/pintansafarah_/',
                        'linkedin' => 'https://www.linkedin.com/in/alpintan-safarah-putri-b40888287/',
                        'delay' => '200'
                    ],
                    [
                        'name' => 'Riyan Saputra',
                        'position' => 'Architect',
                        'description' => 'Creative mind behind our beautiful interfaces. Passionate about user experience and creating designs that inspire and delight.',
                        'image' => 'img/ourteam/riyan.png',
                        'instagram' => 'https://www.instagram.com/riiyansaputraa_/',
                        'linkedin' => 'https://linkedin.com/in/riyansaputra',
                        'delay' => '300'
                    ],
                    [
                        'name' => 'Zaviandar Chalil',
                        'position' => 'Back-End Developer',
                        'description' => 'Creative mind behind our beautiful interfaces. Passionate about user experience and creating designs that inspire and delight.',
                        'image' => 'img/ourteam/zavi.png',
                        'instagram' => 'https://www.instagram.com/zavi_ac/',
                        'linkedin' => 'https://www.linkedin.com/in/zaviandra-chalil-0b2581287/',
                        'delay' => '400'
                    ],
                    [
                        'name' => 'Rahmi Rabbina Arrasyida',
                        'position' => 'Front-End Developer',
                        'description' => 'Tech enthusiast driving digital transformation. Expert in mobile apps and system optimization for seamless user experience.',
                        'image' => 'img/ourteam/rahmi.png',
                        'instagram' => 'https://www.instagram.com/rahmirabbinaa/',
                        'linkedin' => 'https://www.linkedin.com/in/rahmi-rabbina-arrasyida-488161288/',
                        'delay' => '500'
                    ],

                ];
                @endphp

                @foreach($teamMembers as $member)
                <!-- AOS Wrapper -->
                <div data-aos="fade-up" 
                     data-aos-duration="1000" 
                     data-aos-delay="{{ $member['delay'] }}">
                    <!-- Hover Card -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 cursor-pointer">
                        <div class="relative">
                            <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="w-full h-80 object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-2xl font-bold text-[#21408E] mb-2 font-[Montserrat]">{{ $member['name'] }}</h3>
                            <p class="text-lg text-gray-600 mb-4 font-medium">{{ $member['position'] }}</p>
                            <p class="text-gray-500 text-sm leading-relaxed">
                                {{ $member['description'] }}
                            </p>
                            <!-- Social Media Icons -->
                            <div class="flex justify-center gap-4 mt-6">
                                <!-- Instagram -->
                                <a href="{{ $member['instagram'] }}" target="_blank" class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white hover:from-purple-600 hover:to-pink-600 transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                    </svg>
                                </a>
                                <!-- LinkedIn -->
                                <a href="{{ $member['linkedin'] }}" target="_blank" class="w-10 h-10 bg-[#0077B5] rounded-full flex items-center justify-center text-white hover:bg-[#005582] transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="py-20 px-6 bg-[#21408E]">
        <div class="max-w-4xl mx-auto text-center text-white"
             data-aos="fade-up" 
             data-aos-duration="1000">
            <h2 class="text-4xl font-bold mb-6 font-[Montserrat]">Ready to Start Your Journey?</h2>
            <p class="text-xl mb-8 opacity-90">
                Join thousands of satisfied customers who trust Andalas Wheels for their transportation needs.
            </p>
            <a href="{{ route('login') }}" 
               class="inline-block px-8 py-4 bg-white text-[#21408E] rounded-full text-lg font-bold hover:bg-gray-100 transition-all duration-300 hover:scale-105">
                Get Started Today
            </a>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
        });
    </script>
</body>
</html>