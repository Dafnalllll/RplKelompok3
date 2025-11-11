{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\form\productdetail.blade.php --}}
@if(isset($product))
<div style="min-width:320px; max-width:480px; padding:2rem; border-radius:1.5rem; background:#fff; box-shadow:0 8px 32px rgba(0,0,0,0.15); position:relative;">
    <button type="button" onclick="this.closest('[id^=product-modal-]').style.display='none'"
        style="position:absolute; top:1rem; right:1rem; background:none; border:none; font-size:2rem; color:#aaa; cursor:pointer;">&times;</button>
    <div style="display:flex; flex-direction:column; align-items:center; gap:1.5rem;">
        <img src="{{ asset($product['image'] ?? 'img/placeholder.png') }}" alt="{{ $product['name'] ?? 'Produk' }}"
            style="width:160px; height:110px; object-fit:contain; border-radius:1rem; background:#f9fafb; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <div style="text-align:center;">
            <h2 style="font-size:1.5rem; font-weight:700; color:#21408E; margin-bottom:0.5rem;">
                {{ $product['name'] ?? 'Nama Produk' }}
            </h2>
            <div style="margin-bottom:0.5rem;">
                <span style="background:#e0e7ff; color:#3730a3; padding:0.25rem 0.75rem; border-radius:999px; font-size:0.9rem; font-weight:600;">
                    {{ $product['type'] ?? '-' }}
                </span>
                <span style="background:#fef9c3; color:#b45309; padding:0.25rem 0.75rem; border-radius:999px; font-size:0.9rem; font-weight:600;">
                    {{ $product['year'] ?? '-' }}
                </span>
            </div>
            <div style="color:#eab308; font-size:1.25rem; font-weight:700; margin-bottom:0.5rem;">
                Rp {{ number_format($product['price'] ?? 0, 0, ',', '.') }} <span style="font-weight:400; font-size:1rem;">/ hari</span>
            </div>
            <p style="color:#374151; margin-bottom:0.75rem;">{{ $product['desc'] ?? '-' }}</p>
            <div style="margin-bottom:0.75rem;">
                <span style="background:#bbf7d0; color:#166534; padding:0.25rem 0.75rem; border-radius:999px; font-size:0.8rem; font-weight:600;">
                    Stok: {{ $product['stok'] ?? '-' }}
                </span>
                @if(!empty($product['warna']))
                    <span style="background:#f3f4f6; color:#374151; padding:0.25rem 0.75rem; border-radius:999px; font-size:0.8rem; font-weight:600;">
                        Warna: {{ implode(', ', $product['warna']) }}
                    </span>
                @endif
            </div>
        </div>
        <form method="POST" action="#">
            @csrf
            <div style="display:flex; flex-direction:column; gap:1rem;">
                <label>
                    Tanggal Sewa:
                    <input type="date" name="tanggal_sewa" required style="border:1px solid #d1d5db; border-radius:0.5rem; padding:0.5rem; width:100%;">
                </label>
                <label>
                    Lama Sewa (hari):
                    <input type="number" name="lama_sewa" min="1" max="30" value="1" required style="border:1px solid #d1d5db; border-radius:0.5rem; padding:0.5rem; width:100%;">
                </label>
                <button type="submit"
                    style="background:#fde047; color:#21408E; font-weight:700; padding:0.75rem 2rem; border-radius:999px; border:none; font-size:1rem; box-shadow:0 2px 8px rgba(0,0,0,0.07); cursor:pointer;">
                    <i class="fa-solid fa-cart-plus" style="margin-right:0.5rem;"></i> Pesan Sekarang
                </button>
            </div>
        </form>
    </div>
</div>
@endif
