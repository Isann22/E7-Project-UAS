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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>stest</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                <div class="ctas mx-auto">
                                    <a href="{{ route('tournament.show', ['id' => $tournament->id]) }}">detail</a>
                                </div>
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
            <div class="accordion accordion-flush" data-bs-theme="dark" id="accordionFlushExample"style="background-color: #ffff;color: black;">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Bagaimana cara membeli tiket untuk acara eSports?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample"style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Untuk membeli tiket, cari acara yang Anda inginkan melalui fitur pencarian atau kategori di website. Setelah menemukan acara yang diinginkan, klik untuk melihat detailnya, pilih jenis tiket (reguler, VIP, dll.), dan jumlah tiket yang akan dibeli. Lanjutkan dengan menekan tombol "Beli Sekarang" dan selesaikan pembayaran. E-ticket akan dikirimkan melalui email atau bisa diunduh dari akun Anda di website.
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
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample"style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Kami menyediakan berbagai metode pembayaran, termasuk kartu kredit atau debit (Visa, Mastercard), transfer bank, dompet digital seperti OVO, GoPay, ShoopePay dan Dana, serta virtual account. Pilih metode pembayaran yang paling sesuai dan pastikan saldo mencukupi sebelum melanjutkan transaksi.
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
                        <div class="accordion-body">Setelah pembayaran berhasil, Anda akan menerima konfirmasi melalui email yang berisi detail pembelian dan e-ticket. Anda juga dapat memeriksa status pembayaran di halaman akun Anda di website. Jika tidak menerima konfirmasi, silakan hubungi layanan pelanggan untuk bantuan lebih lanjut.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Apakah saya bisa memesan tiket untuk acara yang belum diumumkan?
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse "
                        data-bs-parent="#accordionFlushExample" style="background-color: #ffff;color: black;">
                        <div class="accordion-body">Beberapa acara mungkin menawarkan sistem pre-order atau daftar tunggu sebelum tiket resmi tersedia. Anda bisa mendaftar untuk mendapatkan pemberitahuan saat tiket mulai dijual.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" py-5 py-xl-6">
        <div class="container mt-5 mb-5 mb-md-6" data-aos="fade-left">
            <div class="row text-light justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                    <h2 class="mb-4 display-5 fw-bold">Our Sponsors</h2>
                    <p class=" mb-4 mb-md-5">Orci varius natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Pellentesque et neque id ligula mattis commodo.</p>
                    <hr class="w-50 mx-auto mb-0 text-secondary">
                </div>
            </div>
        </div>
        <div class="container-fluid overflow-hidden mt-5 " style="background-color: ;">
            <div class="row gy-5 gy-md-6">
                <!-- First 4 images as cards -->
                <div class="col-6 col-md-3 align-self-center text-center">
                    <div class="card border-0 bg-transparent">
                        <a href="https://www.instagram.com/ajos_43/"><img src="{{ asset('img/Shopee.svg') }}"
                                class="card-img-top" width="250" height="100" alt=""></a>

                    </div>
                </div>
                <div class="col-6 col-md-3 align-self-center text-center">
                    <div class="card border-0 bg-transparent">
                        <img src="{{ asset('img/ROG.png') }}" class="card-img-top" width="250" height="100"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-md-3 align-self-center text-center">
                    <div class="card border-0 bg-transparent">
                        <img src="{{ asset('img/Garena.png') }}" class="card-img-top" width="250" height="200"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-md-3 align-self-center text-center">
                    <div class="card border-0 bg-transparent">
                        <img src="{{ asset('img/Telkomsel.png') }}" class="card-img-top" width="250" height="100"
                            alt="">
                    </div>
                </div>
            </div>
            {{-- break --}}
            <div class="row justify-content-center mt-4">
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Logo_Dua_Kelinci.png') }}" class="card-img-top" width="120"
                            height="65" alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Gopay.png') }}" class="card-img-top" width="100" height="60"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Infinik.png') }}" class="card-img-top" width="80" height="60"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/KapalApi.png') }}" class="card-img-top" width="70" height="50"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Mills.png') }}" class="card-img-top" width="70" height="50"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/MNCTV.png') }}" class="card-img-top" width="70" height="50"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/REDBULL.jpg') }}" class="card-img-top" width="60" height="60"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Robot.png') }}" class="card-img-top" width="70" height="50"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Secretlab.png') }}" class="card-img-top" width="80" height="50"
                            alt="">
                    </div>
                </div>
                <div class="col-6 col-lg-1 text-center">
                    <div class="card border-0 bg-transparent small-card">
                        <img src="{{ asset('img/Unipin.png') }}" class="card-img-top" width="100" height="43"
                            alt="">
                    </div>
                </div>
            </div>

        </div>



    </section>
@endsection
