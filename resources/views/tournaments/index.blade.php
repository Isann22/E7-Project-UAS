@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <form class="d-flex" action="{{ route('tournament.search') }}" method="POST" role="search"> @csrf
            <input class="form-control me-2" name="search" type="search" placeholder="Search" value="{{ request('search') }}"
                aria-label="Search">
            <button class="primary-button" type="submit">Search</button>
        </form>
        <div class="row">
            @foreach ($tournaments as $tournament)
                <div class="col-12 my-3">
                    <div class="card tournament p-3">
                        <img src="{{ asset('img/seedimg.png') }}" height="150" class="card-img-top rounded shadow-lg"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tournament->name }}</h5>
                            <p class="card-text"> {{ $tournament->venue->name }}</p>
                            <p class='card-text'>{{ Str::limit($tournament->description, 50) }}</p>
                            @foreach ($tournament->tickets as $ticket)
                                @if ($ticket->stock > 0)
                                    <div class="ctas mx-auto">
                                        <a href="{{ route('tournament.show', ['id' => $tournament->id]) }}">Cek
                                            Disini</a>
                                    </div>
                                @else
                                    <div class="ctas mx-auto sould-out-overlay" style="">
                                        <p> SOLD OUT</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $tournaments->links() }}
    </div>
@endsection
