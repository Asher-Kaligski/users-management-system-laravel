@extends('layouts.dashboard')

@section('content')


<div class="container">
    <h2 class="text-center font-weight-bold">Edit Customer</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/customers/{{ $customer->id }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf()



        <div class=" form-group">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Full Name"
                value="{{ $customer->full_name }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                value="{{ $customer->phone }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                value="{{ $customer->email }}" required>
        </div>
        <div class="form-group">
            <label for="identityCard">Identity Card</label>
            <input type="number" name="identityCard" class="form-control" id="identityCard" placeholder="Identity Card"
                value="{{ $customer->identity_card }}" required>
        </div>


        <div class="row justify-content-center form-group pt-2">
            <input class="btn btn-lg btn-secondary" type="submit" value="Submit">
        </div>
    </form>
</div>

@endsection