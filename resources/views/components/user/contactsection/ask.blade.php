<div class="bg-white rounded-2xl shadow-xl p-8 w-full mx-auto"
     data-aos="fade-up"
     data-aos-duration="1200"
     data-aos-delay="300">
    <h2 class="text-2xl font-bold text-[#21408E] mb-4 flex items-center gap-2">
        <i class="fa-solid fa-envelope-circle-check text-yellow-400 text-2xl"></i>
        Ask Us Anything!
    </h2>
    <p class="text-gray-600 mb-6">
        Kirimkan pertanyaanmu ke tim Andalas Wheels, kami siap membantu kamu!
    </p>
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="message">Pertanyaan</label>
            <textarea id="message" name="message" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#21408E]"
                placeholder="Tulis pertanyaanmu di sini" required>
            </textarea>
        </div>
        <button type="submit"
            class="bg-yellow-400 hover:bg-yellow-500 text-[#21408E] font-bold py-3 px-8 rounded-lg transition-all duration-300 shadow-lg w-full">
            Kirim Pertanyaan
        </button>
    </form>
</div>
