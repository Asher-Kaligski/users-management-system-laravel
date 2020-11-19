@extends('layouts.dashboard')

@section('content')
<div class="container">


    <div class="row justify-content-center mt-md-2">

        <div class="col-md-5 mb-2">
            <a href="{{ url('customers/create') }}" class="btn btn-block btn-secondary">Add Customer</a>
        </div>
        <div class="col-md-5 mb-2 search-box">
            <form id="form">
                <div class="form-group input-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search customer..."
                        aria-label="Search" aria-describedby="basic-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-secondary" name="submit" value="submit" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

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

        <div class="col-md-5 mb-3">
            <a href="{{ url('customers/') }}" class="btn btn-block btn-secondary mt-2">View All
                Customers</a>
        </div>


    </div>
    @endsection

    @push('scripts')
    <script src="{{ asset('js/dashboard/home.js') }}"></script>
    @endpush