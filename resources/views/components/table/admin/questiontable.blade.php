<div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl p-8 w-[95%] mx-auto">
    <h3 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
        <i class="fas fa-question-circle text-blue-500"></i>
        Daftar Pertanyaan
    </h3>

    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gradient-to-r from-blue-100 to-yellow-50 text-gray-700">
                    <th class="py-4 px-4 text-left font-semibold">NO</th>
                    <th class="py-4 px-4 text-left font-semibold">USER</th>
                    <th class="py-4 px-4 text-left font-semibold">PERTANYAAN</th>
                    <th class="py-4 px-4 text-left font-semibold">WAKTU</th>
                    <th class="py-4 px-4 text-left font-semibold">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $i => $question)
                    <tr class="border-b hover:bg-blue-50 transition-colors">
                        <td class="py-3 px-4">{{ $i + 1 }}</td>
                        <td class="py-3 px-4">
                            <span class="font-semibold">{{ $question->user->name ?? '-' }}</span>
                            <div class="text-xs text-gray-500">{{ $question->user->email ?? '' }}</div>
                        </td>
                        <td class="py-3 px-4 text-gray-700">{{ $question->message }}</td>
                        <td class="py-3 px-4 text-sm text-gray-600">
                            {{ $question->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="py-3 px-4">
                            <!-- Tombol Jawab -->
                            <button
                                class="bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold px-4 py-2 rounded-lg shadow transition-all hover:scale-105"
                                data-modal="answer-modal-{{ $question->id }}"
                            >
                                Jawab
                            </button>
                            <!-- Include modal form jawaban -->
                            @include('components.form.admin.questionanswer', ['question' => $question])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-8 text-gray-400 text-lg font-semibold">
                            <i class="fas fa-inbox text-2xl mb-2 block"></i>
                            Question Not Found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    document.querySelectorAll('button[data-modal]').forEach(btn => {
        btn.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) modal.showModal();
        });
    });
</script>
