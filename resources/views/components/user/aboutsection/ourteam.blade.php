<section class="min-h-screen relative flex flex-col items-center  pb-16">
    {{-- Single Background Image --}}
    <div class="absolute inset-0 w-full h-full z-0">
    </div>
    {{-- Decorative Dot --}}
    <div class="absolute top-24 left-10 w-3 h-3 bg-yellow-400 rounded-full opacity-80 z-10"></div>
    {{-- Content: Title & Caption --}}
    <div class="relative z-20 w-full max-w-2xl px-8 py-16 md:py-32 mx-auto text-center"
         data-aos="fade-up"
         data-aos-duration="1200">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-8 mt-4 md:mt-0"
            data-aos="fade-up"
            data-aos-delay="200">
            Our Team
        </h1>
    </div>

    {{-- Team Members --}}
    <div id="ourteam-section" class="w-full relative z-20 mt-8 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @php
                $teamMembers = [
                    [
                        'name' => 'Rizki Dafa Naldi',
                        'position' => 'Project Manager',
                        'description' => 'The project manager is responsible for overseeing the entire project. They make sure the team knows what to do, when to do it, and how to achieve the goals. They also act as the bridge between the technical team and the client or stakeholders.',
                        'image' => 'img/ourteam/dafa.png',
                        'instagram' => 'https://www.instagram.com/daf_nal/',
                        'linkedin' => 'https://www.linkedin.com/in/daffa-naldi-935b55341/',
                        'github' => 'https://github.com/Dafnalllll',
                        'delay' => '100'
                    ],
                    [
                        'name' => 'Alpintan Safarah Putri',
                        'position' => 'Designer (UI/UX)',
                        'description' => 'The UI/UX designer creates the visual layout and plans the user experience. Their goal is not only to make the application look attractive but also to make it easy to understand, comfortable to use, and aligned with user needs.',
                        'image' => 'img/ourteam/pintan.png',
                        'instagram' => 'https://www.instagram.com/pintansafarah_/',
                        'linkedin' => 'https://www.linkedin.com/in/alpintan-safarah-putri-b40888287/',
                        'github' => 'https://github.com/Pintan09',
                        'delay' => '200'
                    ],
                    [
                        'name' => 'Riyan Saputra',
                        'position' => 'Architect',
                        'description' => 'The system architect designs the overall structure of the system or application. They decide how different components connect with each other, which technologies to use, and ensure the system is secure, efficient, and scalable for the future.',
                        'image' => 'img/ourteam/riyan.png',
                        'instagram' => 'https://www.instagram.com/riiyansaputraa_/',
                        'linkedin' => 'https://linkedin.com/in/riyansaputra',
                        'github' => 'https://github.com/RIYANSAPUTRA21',
                        'delay' => '300'
                    ],
                    [
                        'name' => 'Zaviandra Chalil',
                        'position' => 'Back-End Developer',
                        'description' => 'The back-end developer works behind the scenes. They build the system’s logic, manage the database, and develop APIs so data can connect with the front-end.',
                        'image' => 'img/ourteam/zavi.png',
                        'instagram' => 'https://www.instagram.com/zavi_ac/',
                        'linkedin' => 'https://www.linkedin.com/in/zaviandra-chalil-0b2581287/',
                        'github' => 'https://github.com/ZvC2300',
                        'delay' => '400'
                    ],
                    [
                        'name' => 'Rahmi Rabbina Arrasyida',
                        'position' => 'Front-End Developer',
                        'description' => 'Front-End Developer is responsible for developing the visual and interactive parts of an application. They make sure the design works in code and connects well with the back-end. ',
                        'image' => 'img/ourteam/rahmi.png',
                        'instagram' => 'https://www.instagram.com/rahmirabbinaa/',
                        'linkedin' => 'https://www.linkedin.com/in/rahmi-rabbina-arrasyida-488161288/',
                        'github' => 'https://github.com/Arrasyiid',
                        'delay' => '500'
                    ],
                ];
                @endphp

                @foreach($teamMembers as $member)
                <div data-aos="fade-up"
                     data-aos-duration="1000"
                     data-aos-delay="{{ $member['delay'] }}">
                    <div class="bg-white bg-opacity-90 rounded-3xl shadow-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 cursor-pointer">
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
                            <div class="flex justify-center gap-4 mt-6">
                                <a href="{{ $member['instagram'] }}" target="_blank" rel="noopener" aria-label="Instagram" class="hover:scale-110 transition">
                                    <img src="{{ asset('img/social/instagram.webp') }}" alt="Instagram" class="w-6 h-6 " />
                                </a>
                                <a href="{{ $member['linkedin'] }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="hover:scale-110 transition">
                                    <img src="{{ asset('img/social/linkedin.webp') }}" alt="LinkedIn" class="w-6 h-6 " />
                                </a>
                                <a href="{{ $member['github'] }}" target="_blank" rel="noopener" aria-label="GitHub" class="hover:scale-110 transition">
                                    <img src="{{ asset('img/social/github.webp') }}" alt="GitHub" class="w-6 h-6 " />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
