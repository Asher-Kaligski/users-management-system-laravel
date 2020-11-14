@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h2 class="text-center font-weight-bold">Create New Customer</h2>
    @if ($errors->any())
    <div class="alert alert-danger my-2">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="/customers" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Full Name"
                value="{{ old('fullName') }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                value="{{ old('phone') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="identityCard">Identity Card</label>
            <input type="number" name="identityCard" class="form-control" id="identityCard" placeholder="Identity Card"
                value="{{ old('identityCard') }}">
        </div>

        <div class="row justify-content-center form-group pt-2">
            <input class="btn btn-lg btn-secondary" type="submit" value="Submit">
        </div>
    </form>
</div>

@endsection