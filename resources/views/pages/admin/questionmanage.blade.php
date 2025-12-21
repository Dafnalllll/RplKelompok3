@section('title', 'Andalaswheel || Question Management')
@push('head')
    <title>Andalaswheel || Question Management</title>
    <link rel="icon" type="image/png" href="{{ asset('img/andalaswheels.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

<x-app-layout>
     <div class="flex min-h-screen bg-gradient-to-br from-blue-100 via-yellow-50 to-blue-200">
        {{-- Sidebar --}}
        @include('components.admin.sidebar')


        {{-- Main Content --}}
        <div class="flex-1 h-screen overflow-y-auto">
            {{-- Header with Glassdrop --}}
            <header class="sticky top-0 z-20 mb-8">
                <div class="backdrop-blur-md bg-white/40 border border-white/30 shadow-lg rounded-2xl px-8 py-6 flex items-center justify-between">
                    <h1 class="text-3xl font-bold text-blue-800 drop-shadow-lg">Question Management</h1>
                </div>
            </header>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Question Table --}}
                @include('components.table.admin.questiontable', ['questions' => $questions])

        </div>
    </div>

    @if (session('status'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    text: '{{ session('status') }}',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2200,
                    timerProgressBar: true,
                    toast: true,
                    position: 'top',
                    background: '#f0f6ff',
                    color: '#21408E',
                    customClass: {
                        popup: 'shadow-2xl rounded-xl animate__animated animate__fadeInDown',
                        title: 'font-bold text-lg',
                        htmlContainer: 'text-base',
                    },
                    iconHtml: `
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#21408E" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" fill="#21408E"/>
                            <path d="M9 12l2 2l4 -4" stroke="#fff" stroke-width="2.5" fill="none"/>
                        </svg>
                    `,
                });
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>
