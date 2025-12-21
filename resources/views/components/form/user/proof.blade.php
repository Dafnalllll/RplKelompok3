<!-- Modal Upload Bukti Pembayaran -->
<div id="uploadProofModal-{{ $order->id }}" class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-40 hidden">
  <div class="bg-white rounded-xl shadow-lg w-full max-w-md mx-auto flex flex-col">
    <form method="POST" action="{{ route('order.upload-proof.submit', $order->id) }}" enctype="multipart/form-data" class="p-6">
      @csrf
      <h3 class="text-lg font-semibold text-green-600 mb-4">Kirim Bukti Pembayaran</h3>
      <input type="file" name="proof" required class="mb-4">
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal('{{ $order->id }}')" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 bg-white hover:bg-gray-100">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700">Upload</button>
      </div>
    </form>
  </div>
</div>


