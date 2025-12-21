{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\table\user\faqtable.blade.php --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 justify-center px-2 sm:px-4">
    @forelse($questions as $i => $question)
    <div
        data-aos="fade-up"
        data-aos-duration="800"
        data-aos-delay="{{ $i * 100 }}"
        data-aos-once="false"
        class="w-full flex"
    >
        <div x-data="{ open: false }" class="w-full max-w-[600px] mx-auto">
            <button
                @click="open = !open"
                class="w-full bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 cursor-pointer flex items-center justify-between px-4 py-3 text-left hover:bg-blue-50 focus:outline-none"
            >
                <div>
                    <span class="text-blue-900 font-bold text-base">{{ $question['question'] }}</span>
                    <span class="ml-2 text-xs text-gray-500 font-semibold">
                        oleh {{ $question['user']['name'] ?? 'Anonim' }}
                    </span>
                </div>
                <svg :class="{'rotate-180': open}" class="w-5 h-5 text-blue-700 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div
                x-show="open"
                x-transition:enter="transition-all duration-400 ease-out"
                x-transition:enter-start="opacity-0 max-h-0"
                x-transition:enter-end="opacity-100 max-h-40"
                x-transition:leave="transition-all duration-300 ease-in"
                x-transition:leave-start="opacity-100 max-h-40"
                x-transition:leave-end="opacity-0 max-h-0"
                class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 pb-6 pt-4 text-gray-800 text-base rounded-b-xl shadow-inner border-l-4 border-blue-400 relative overflow-hidden"
                style="max-height: 10rem;"
            >
                <div class="flex items-start gap-3">
                    <span class="mt-1 text-blue-500">
                        <i class="fa fa-info-circle text-lg"></i>
                    </span>
                    <span>
                        {{ $question['answer'] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-2 flex flex-col items-center justify-center py-16">
        <i class="fa fa-inbox text-4xl text-blue-300 mb-4"></i>
        <div class="text-blue-700 text-lg font-semibold">Belum ada pertanyaan</div>
    </div>
    @endforelse
</div>
