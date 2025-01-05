@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/2.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/3.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/4.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    @if (session('error'))
        <div class="container">
            <div class="alert alert-danger mt-5 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <section id="tournaments">
        <div class="container mt-5 ">
            <h1 class="text-center text-light">Tournaments</h1>
            <hr>
            <div class="row">
                @foreach ($tournaments as $tournament)
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3" data-aos="fade-right">
                        <div class="card tournament p-3" style="width: 22rem;">
                            <img src="{{ asset('img/seedimg.png') }}" height="150" class="card-img-top rounded shadow-lg"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tournament->name }}</h5>
                                <p class="card-text"> {{ $tournament->venue->name }}</p>
                                @foreach ($tournament->tickets as $ticket)
                                    @if ($ticket->stock > 0)
                                        <div class="ctas mx-auto">
                                            <a href="{{ route('tournament.show', ['id' => $tournament->id]) }}">Cek
                                                Disini</a>
                                        </div>
                                    @else
                                        <div class="ctas mx-auto sould-out-overlay">
                                            <p> SOLD OUT</p>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="container d-flex justify-content-center mt-3">
                <a class="fs-5 fw-bold text-light" href="">View More</a>
            </div>

        </div>

        <div class="container my-5" data-aos="fade-up">
            <h1 class="text-center text-light">FAQ</h1>
            <hr>
            <div class="accordion accordion-flush" data-bs-theme="dark"
                id="accordionFlushExample"style="background-color: #ffff;color: black;">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Bagaimana cara membeli tiket untuk acara eSports?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample"style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Untuk membeli tiket, cari acara yang Anda inginkan melalui fitur
                            pencarian atau kategori di website. Setelah menemukan acara yang diinginkan, klik untuk melihat
                            detailnya, pilih jenis tiket (reguler, VIP, dll.), dan jumlah tiket yang akan dibeli. Lanjutkan
                            dengan menekan tombol "Beli Sekarang" dan selesaikan pembayaran. E-ticket akan dikirimkan
                            melalui email atau bisa diunduh dari akun Anda di website.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Apa saja metode pembayaran yang tersedia?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample"style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Kami menyediakan berbagai metode pembayaran, termasuk kartu kredit atau
                            debit (Visa, Mastercard), transfer bank, dompet digital seperti OVO, GoPay, ShoopePay dan Dana,
                            serta virtual account. Pilih metode pembayaran yang paling sesuai dan pastikan saldo mencukupi
                            sebelum melanjutkan transaksi.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Bagaimana saya bisa memastikan pembayaran saya berhasil?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample"style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Setelah pembayaran berhasil, Anda akan menerima konfirmasi melalui
                            email yang berisi detail pembelian dan e-ticket. Anda juga dapat memeriksa status pembayaran di
                            halaman akun Anda di website. Jika tidak menerima konfirmasi, silakan hubungi layanan pelanggan
                            untuk bantuan lebih lanjut.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false"
                            aria-controls="flush-collapseFour">
                            Apakah saya bisa memesan tiket untuk acara yang belum diumumkan?
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse "
                        data-bs-parent="#accordionFlushExample" style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Beberapa acara mungkin menawarkan sistem pre-order atau daftar tunggu
                            sebelum tiket resmi tersedia. Anda bisa mendaftar untuk mendapatkan pemberitahuan saat tiket
                            mulai dijual.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 py-xl-6 bg-white">
        <div class="container">
            <!-- Kategori 1 -->
            <div class="text-center mb-5">
                <h5 class="fw-bold text-uppercase">Presented By</h5>
                <div class="row justify-content-center g-3">
                    <div class="col-auto">
                        <img src="{{ asset('img/ROG.png') }}" class="img-fluid" alt="ROG Logo"
                            style="max-height: 60px;">
                        <img src="{{ asset('img/Infinik.png') }}" class="img-fluid" alt="REDBULL Logo"
                            style="max-height: 60px;">

                    </div>
                </div>
            </div>
            <!-- Kategori 2 -->
            <div class="text-center mb-5">
                <h5 class="fw-bold text-uppercase">Supported By</h5>
                <div class="row justify-content-center g-3">
                    <div class="col-auto">
                        <img src="{{ asset('img/Robot.png') }}" class="img-fluid" alt="PBESI Logo"
                            style="max-height: 50px;">
                    </div>
                    <div class="col-auto">
                        <img src="{{ asset('img/Shopee.png') }}" class="img-fluid" alt="Good Day Logo"
                            style="max-height: 50px;">
                    </div>
                </div>
            </div>

            <!-- Kategori 3 -->
            <div class="text-center mb-5">
                <h5 class="fw-bold text-uppercase">Official Partners</h5>
                <div class="row justify-content-center g-3">
                    <div class="col-auto">
                        <img src="{{ asset('img/Gopay.png') }}" class="img-fluid" alt="Gopay Logo"
                            style="max-height: 50px;">
                    </div>
                    <div class="col-auto">
                        <img src="{{ asset('img/MNCTV.png') }}" class="img-fluid" alt="Qodiyya Logo"
                            style="max-height: 50px;">
                    </div>
                    <div class="col-auto">
                        <img src="{{ asset('img/Telkomsel.png') }}" class="img-fluid" alt="Ardan Logo"
                            style="max-height: 40px;">
                    </div>
                </div>
            </div>

            <!-- Kategori 4 -->
            <div class="text-center mb-2 ">
                <h5 class="fw-bold text-uppercase">Suppliers</h5>
                <div class="row justify-content-center g-3">
                    <div class="col-auto">
                        <img src="{{ asset('img/kapalapi.png') }}" class="img-fluid" alt="Indihome Logo"
                            style="max-height: 50px;">
                    </div>
                    <div class="col-auto">
                        <img src="{{ asset('img/REDBULL.jpg') }}" class="img-fluid" alt="REDBULL Logo"
                            style="max-height: 50px;">

                    </div>
                    <div class="col-auto">
                        <img src="{{ asset('img/Indomie.png') }}" class="img-fluid" alt="RSV Logo"
                            style="max-height: 40px;">
                    </div>
                    <div class="col-auto">
                        <img src="{{ asset('img/Logo_Dua_Kelinci.png') }}" class="img-fluid" alt="UBS Gold Logo"
                            style="max-height: 50px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
