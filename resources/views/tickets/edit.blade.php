@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h2 class="text-center font-weight-bold">Edit Ticket</h2>



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
            <form method="POST" action="/tickets/{{ $ticket->id }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf()

                <div class="form-group">
                    <label for="content">Ticket Content</label>
                    <textarea disabled class="form-control" name="content" rows="9">{{ $ticket->content }} </textarea>
                </div>


                <div class="row">
                    <div class="col-md-3 col-5">
                        <span>Status: {{$ticket->status}}</span>
                    </div>
                    <div class="col-md-3 col-5">
                        <span>Employee: {{$ticket->employee_name}}</span>
                    </div>
                    <div class="col-md-6 col-12">
                        <span>Created: {{$ticket->created_at}}</span>
                    </div>
                </div>

                @if ($ticket->status === 'New')
                <div class="row justify-content-center form-group pt-2">
                    <input class="btn btn-lg btn-secondary" type="submit" value="Close Ticket">
                </div>
                @endif
            </form>
        </div>

        <div class="col-12">
            @if (count($comments) > 0)
            <h3 class="text-center font-weight-bold mb-2">Ticket Comments</h3>
            <ul class="list-group mb-2">
                @foreach ($comments as $comment)
                <li class="list-group-item mb-2 p-2">
                    {{ $comment->content}}
                    <div class="d-flex flex-row justify-content-around mt-2">
                        <span>Employee: {{$comment->employee_name}}</span>
                        <span>Created: {{$comment->created_at}}</span>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </div>


        @if ($ticket->status === 'New')
        <div class="col-12">
            <form method="POST" action="/ticket-comments" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="content">Leave Comment</label>
                    <textarea placeholder="Leave Comment" class="form-control" name="content" id=" content"
                        rows="3"></textarea>
                </div>

                <input hidden type="text" name="ticketId" class="form-control" id="ticketId" value="{{ $ticket->id }}">



                <div class="row justify-content-center form-group pt-2">
                    <input class="btn btn-lg btn-secondary" type="submit" value="Submit">
                </div>
            </form>
        </div>
        @endif


        @if ($errors->any())
        <div class="col-12 d-flex flex-row justify-content-center alert alert-danger my-2 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div>
</div>

@endsection