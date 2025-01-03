@extends('layouts.app')

@section('content')
    <div class="container detail">
        <div class="row align-items-center  gap-5">
            <img src="{{ asset('img/seedimg.png') }}" height="350" alt="">
            <div class="col-lg-6 col-sm-12 p-5 tour " style="">
                <h1>{{ $tournament->name }}</h1>
                <p>{{ $tournament->venue->name }}</p>
                <p>{{ $tournament->venue->address }}</p>
                <h3>{{ $tournament->description }}</h3>
            </div>
            <div class="col-lg-6 p-5 col-sm-12 mx-auto ticket  ">
                <div class="card text-sm-center">
                    @foreach ($tournament->tickets as $ticket)
                        <div class="card-header" style="border-bottom: 2px solid orange">
                            <a href="{{ route('orders.index', ['ticket_id' => $ticket->id])}}"
                                class="primary-button mx-auto">Buy
                                Ticket</a>
                        </div>
                        <div class="card-body ">

                            <p class="">Ticket Price : Rp. {{ $ticket->price }}</p>
                            <p class="">Stock : {{ $ticket->stock }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection