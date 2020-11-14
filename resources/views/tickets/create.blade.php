@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h2 class="text-center font-weight-bold">Create New Ticket</h2>



    <div class="row">

        <div class="col-md-6">
            <div>
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input disabled type="text" name="fullName" class="form-control" id="fullName"
                        placeholder="Full Name" value="{{ $customer->full_name }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input disabled type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                        value="{{ $customer->phone }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input disabled type="email" name="email" class="form-control" id="email" placeholder="Email"
                        value="{{ $customer->email }}">
                </div>
                <div class="form-group">
                    <label for="identityCard">Identity Card</label>
                    <input disabled type="text" name="identityCard" class="form-control" id="identityCard"
                        placeholder="Identity Card" value="{{ $customer->identity_card }}">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form method="POST" action="/tickets" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="content">Ticket Content</label>
                    <textarea class="form-control" name="content" id="content" rows="9" required></textarea>
                </div>

                <input hidden type="text" name="employee" class="form-control" id="employee"
                    value="{{ $customer->employee_name }}">

                <input hidden type="text" name="customerId" class="form-control" id="customerId"
                    value="{{ $customer->id }}">



                <div class="row justify-content-center form-group pt-2">
                    <input class="btn btn-lg btn-secondary" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger my-2">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


</div>

@endsection