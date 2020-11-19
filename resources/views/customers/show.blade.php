@extends('layouts.dashboard')

@section('content')


<div class="container">
    <h2 class="text-center font-weight-bold">Customer</h2>


    <div>

        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input disabled type="text" name="fullName" class="form-control" id="fullName" placeholder="Full Name"
                value="{{ $customer->full_name }}" required>
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


        <div class="row justify-content-center form-group pt-2">
            <a href="{{ url('tickets/customer/' . $customer->id .'/create') }}"
                class="btn btn-lg btn-secondary mt-2">Open
                Ticket</a>
        </div>
    </div>



    @if (count($tickets) > 0)
    <h3 class="text-center font-weight-bold mb-2">Customer Tickets History</h3>
    <ul class="list-group mb-2">
        @foreach ($tickets as $ticket)
        <li class="list-group-item mb-2 p-2">
            {{ $ticket->content}}
            <div class="d-flex flex-row justify-content-around mt-2">
                <span>Status: {{$ticket->status}}</span>
                <a href="{{ url('tickets/' . $ticket->id . '/edit') }}"><i class="fa fa-2x fa-eye"
                        aria-hidden="true"></i>
                </a>
            </div>
        </li>
        @endforeach
    </ul>
    @endif

</div>

@endsection