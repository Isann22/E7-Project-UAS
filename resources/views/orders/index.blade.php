@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="POST">
            @csrf
            <div class="card order my-4">
                <div class="card-header shadow-lg">
                    <h3>Ticket Information</h3>
                </div>
                <div class="card-body d-flex justify-content-around align-items-center">
                    <div class="form-group my-3" id="tournament">
                        <input type="hidden" name="ticket_id" value="" class="form-control">
                        <label for="tournament">Tournament</label>
                        <input type="text" readonly value="" class="form-control"
                            required>
                        <label for="price" class="mt-3">Price</label>
                        <input type="text" id="price" value="" readonly class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty" required>
                        <label for="amount" required class="mt-3">Amount</label>
                        <input type="number" readonly readonly class="form-control" id='amount' name="amount" required>
                    </div>
                </div>
            </div>

            <div class="card order">
                <div class="card-header  shadow-lg">
                    <h3>Biiling Information</h3>
                </div>
                <div class="card-body mx-auto" style="width: 70%">
                    <input type="number" name="user_id" style="color: black" hidden class="form-control" id="user_id"
                        value="{{ Auth::user()->id }}" name="user_id" required>
                    <div class="form-group my-3">
                        <label for="user_id">Name</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group my-3">
                        <label for="user_id">Email</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                    <button type="submit" class="primary-button mt-5 float-end">Order Now</button>
                </div>
            </div>
        </form>
    </div>



    
@endsection