@extends('layouts.app')

@section('content')
    
        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 4"></button>
            </div> --}}
            {{-- <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/1.png') }}" style="" class="d-block w-100" alt="...">
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>stest</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section id="tournaments">
        <div class="container mt-5">
            <h1 class="text-center text-light">Tournaments</h1>
            <hr>
            <div class="row">
        @foreach($tournaments as $tournament)
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                        <div class="card tournament p-3" style="width: 22rem;">
                            <img src="{{ asset('img/seedimg.png') }}" height="150" class="card-img-top rounded shadow-lg"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$tournament->name}}</h5>
                                <p class="card-text"> {{ $tournament->venue->name }}</p>
                                <div class="ctas mx-auto">
                                    <a href="{{route('tournament.show',['id'=>$tournament->id])}}">detail</a>
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

        <div class="container my-5">
            <h1 class="text-center text-light">FAQ</h1>
            <hr>
            <div class="accordion accordion-flush" data-bs-theme="dark" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate
                            the
                            <code>.accordion-flush</code> class. This is the first item's accordion body.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate
                            the
                            <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine
                            this
                            being filled with some actual content.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to
                            demonstrate
                            the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more
                            exciting happening here in terms of content, but just filling up the space to make it look, at
                            least
                            at first glance, a bit more representative of how this would look in a real-world application.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" py-5 py-xl-6">
        <div class="container mb-5 mb-md-6">
            <div class="row text-light justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                    <h2 class="mb-4 display-5 fw-bold">Our Sponsors</h2>
                    <p class=" mb-4 mb-md-5">Orci varius natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus. Pellentesque et neque id ligula mattis commodo.</p>
                    <hr class="w-50 mx-auto mb-0 text-secondary">
                </div>
            </div>
        </div>
        <div class="container overflow-hidden">
            <div class="row gy-5 gy-md-6">
                <div class="col-6 col-md-3 align-self-center text-center">
                    <img src="{{ asset('img/Shopee.svg') }}" width="250" height="100" alt="" srcset="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center">
                    <img src="{{ asset('img/ROG.png') }}" width="250" height="100" alt="" srcset="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center">
                    <img src="{{ asset('img/Garena.png') }}" width="250" height="200" alt="" srcset="">
                </div>
                <div class="col-6 col-md-3 align-self-center text-center">
                    <img src="{{ asset('img/Telkomsel.png') }}" width="250" height="100" alt="" srcset="">
                </div>
                <div class="container d-flex justify-content-center mt-3">
                    <a class="fs-5 fw-bold text-light" href="">View More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
