{{-- filepath: d:\Dafa Code\Rplkel3\resources\views\components\user\product\detail.blade.php --}}

@extends('layouts.app')

@section('content')
<style>
    .star-rating { color: #FFC107; font-size: 1.2rem; }
    .product-detail-card { border-radius: 18px; }
    .product-img { max-width: 100%; border-radius: 12px; background: #f7f7f7; }
    .desc-card { border-radius: 18px; }
    .btn-black { background: #111; color: #fff; border-radius: 8px; }
    .btn-black:hover { background: #333; }
    .btn-outline { border: 1px solid #111; border-radius: 8px; }
    .btn-outline:hover { background: #f7f7f7; }
</style>
<div class="container py-5">
    <div class="row g-4">
        <div class="col-md-5">
            <div class="bg-white p-4 product-detail-card shadow-sm h-100 d-flex align-items-center justify-content-center">
                <img src="https://images.pexels.com/photos/276528/pexels-photo-276528.jpeg?auto=compress&w=600" alt="Yamaha NMAX 2023" class="product-img" style="max-height: 350px;">
            </div>
        </div>
        <div class="col-md-7">
            <div class="bg-white p-4 product-detail-card shadow-sm h-100">
                <h2 class="fw-bold mb-2">Yamaha NMAX 2023</h2>
                <div class="d-flex align-items-center mb-2">
                    <span>(4,8)</span>
                    <span class="star-rating ms-2">
                        ★★★★☆
                    </span>
                    <span class="mx-3 border-end" style="height: 18px;"></span>
                    <span>1.2K Reviews</span>
                    <span class="mx-3 border-end" style="height: 18px;"></span>
                    <span>800 Sold</span>
                </div>
                <h3 class="fw-bold text-dark mb-3">Rp 32.000.000</h3>
                <div class="d-flex align-items-center mb-3">
                    <button class="btn btn-outline btn-outline-secondary me-2" style="width: 38px;">-</button>
                    <span class="mx-2">1</span>
                    <button class="btn btn-outline btn-outline-secondary ms-2" style="width: 38px;">+</button>
                    <span class="ms-3 text-muted">12 in Stock</span>
                </div>
                <div class="d-flex mb-3">
                    <button class="btn btn-outline me-2">+ Favorite</button>
                    <button class="btn btn-black">Add to Cart</button>
                </div>
                <div class="mb-2">
                    <span class="text-muted"><i class="bi bi-shield-check"></i> 15-Day Free Return</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="bg-white p-4 desc-card shadow-sm">
                <h5 class="fw-bold mb-3">Description & Specification</h5>
                <p>
                    Yamaha NMAX 2023 hadir dengan desain modern, mesin 155cc Blue Core, fitur ABS, dan bagasi luas. Cocok untuk kebutuhan harian maupun touring.
                </p>
                <p class="mb-1 fw-bold">Product Highlights:</p>
                <ul>
                    <li>Mesin: 155cc Blue Core, hemat bahan bakar</li>
                    <li>Rem: ABS (Anti-lock Braking System)</li>
                    <li>Bagasi: 23 liter, muat helm full face</li>
                    <li>Panel: Digital, fitur lengkap</li>
                    <li>Warna: Hitam, Putih, Merah</li>
                    <li>Garansi: 3 tahun</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
