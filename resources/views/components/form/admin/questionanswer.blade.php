<dialog id="answer-modal-{{ $question->id }}" class="rounded-xl p-0 w-full max-w-md">
    <form method="POST" action="{{ route('questions.answer', $question->id) }}" class="p-6">
        @csrf
        <h4 class="text-lg font-bold mb-4 text-blue-800">Jawab Pertanyaan</h4>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Pertanyaan:</label>
            <div class="bg-blue-50 rounded px-3 py-2 text-gray-800">{{ $question->message }}</div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="answer-{{ $question->id }}">Jawaban</label>
            <textarea id="answer-{{ $question->id }}" name="answer" rows="3" required spellcheck="false"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $question->answer->answer ?? '' }}</textarea>
        </div>
        <div class="flex justify-end gap-2">
            <button type="button"
                onclick="document.getElementById('answer-modal-{{ $question->id }}').close()"
                class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold">
                Batal
            </button>
            <button type="submit"
                class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-semibold">
                Simpan Jawaban
            </button>
        </div>
    </form>
</dialog>
