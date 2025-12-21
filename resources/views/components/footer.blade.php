{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\footer.blade.php --}}
<footer class="bg-[#21408E] text-white py-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between px-6">
        <span class="text-base">&copy; {{ date('Y') }} Andalas Wheels. All Rights Reserved.</span>

        <!-- Quick Links (ikon saja, di tengah) -->
        <div class="flex-1 flex justify-center my-4 md:my-0">
            <div class="flex gap-6">
                <a href="{{ url('/dashboard') }}" class="quick-scroll-link" aria-label="Home">
                    <i class="fa-solid fa-house text-xl hover:text-yellow-400 transition-all hover:scale-110"></i>
                </a>
                <a href="{{ url('/about') }}" class="quick-scroll-link" aria-label="About">
                    <i class="fa-solid fa-circle-info text-xl hover:text-yellow-400 transition-all hover:scale-110"></i>
                </a>
                <a href="{{ url('/motorcycle') }}" class="quick-scroll-link" aria-label="Motorcycle">
                    <i class="fa-solid fa-motorcycle text-xl hover:text-yellow-400 transition-all hover:scale-110"></i>
                </a>
                <a href="{{ url('/faq') }}" class="quick-scroll-link" aria-label="FAQ">
                    <i class="fa-solid fa-circle-question text-xl hover:text-yellow-400 transition-all hover:scale-110"></i>
                </a>
                <a href="{{ url('/contact') }}" class="quick-scroll-link" aria-label="Contact">
                    <i class="fa-solid fa-phone text-xl hover:text-yellow-400 transition-all hover:scale-110"></i>
                </a>
                <a href="{{ url('/howtopayment') }}" class="quick-scroll-link" aria-label="Payment">
                    <i class="fa-solid fa-credit-card text-xl hover:text-yellow-400 transition-all hover:scale-110"></i>
                </a>
            </div>
        </div>

        <div class="flex gap-4 mt-4 md:mt-0">
            <a href="https://instagram.com/andalaswheels" target="_blank" aria-label="Instagram">
                <i class="fa-brands fa-instagram text-xl hover:text-yellow-400 transition-all hover:scale-105"></i>
            </a>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=andalaswheels21@gmail.com" target="_blank" aria-label="Email">
                <i class="fa-solid fa-envelope text-xl hover:text-yellow-400 transition-all hover:scale-105"></i>
            </a>
            <a href="https://wa.me/62816303595" target="_blank" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp text-xl hover:text-yellow-400 transition-all hover:scale-105"></i>
            </a>
        </div>
    </div>
</footer>
