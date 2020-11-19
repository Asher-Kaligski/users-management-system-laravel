@extends('layouts.dashboard')

@section('content')
<div class="container">

    <h2 class="text-center font-weight-bold mt-2">Customers Table</h2>

    <div class="row justify-content-center mt-md-2">


        <div class="col-md-4 my-2">
            <a href="{{ url('customers/create') }}" class="btn btn-block btn-secondary">Add
                Customer</a>
        </div>
        @if(count($customers) > 0)
        <div class="col-12 mt-3 d-flex justify-content-center align-items-center">
            <table class='table table-striped table-responsive w-100 d-block d-md-table'>
                <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Full Name</th>
                        <th scope='col'>Phone</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>ID</th>
                        <th scope='col'>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer['full_name']}}</td>
                        <td>{{$customer['phone']}}</td>
                        <td>{{$customer['email']}}</td>
                        <td>{{$customer['identity_card']}}</td>

                        <td>
                            <a href="{{ url('customers/' . $customer->id) }}"><i class="fa fa-eye mx-1"
                                    aria-hidden="true"></i>
                            </a>
                            <a href="{{ url('customers/' . $customer->id . '/edit') }}"><i class="fa fa-edit mx-1"
                                    aria-hidden="true"></i>
                            </a>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection