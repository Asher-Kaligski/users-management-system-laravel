<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // $users = User::orderBy('id', 'desc')->get();

        $customers = Customer::all();

        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'fullName'     => 'required|max:50|min:2',
            'email'        => 'required|email',
            'phone'        => 'required|max:25|min:5',
            'identityCard' => 'required|max:10|min:4',
        ]);

        $customer = new Customer();
        $customer->full_name = $request->fullName;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->identity_card = $request->identityCard;
        $customer->employee_name = Auth::user()->name;
        $customer->save();

        return redirect('/customers');
    }

    public function search($search) {

        $searchedCustomer = DB::table('customers')
            ->where(function ($query) use ($search) {
                $query->where('full_name', 'LIKE', '%' . $search . '%')
                    ->OrWhere('email', 'LIKE', '%' . $search . '%')
                    ->OrWhere('phone', 'LIKE', '%' . $search . '%')
                    ->OrWhere('identity_card', 'LIKE', '%' . $search . '%')
                ;
            })
            ->first();

        return json_encode($searchedCustomer);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $customer = Customer::find($id);

        $tickets = Ticket::where('customer_id', '=', $id)->get();

        return view('customers.show', ['customer' => $customer, 'tickets' => $tickets]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $customer = Customer::find($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'fullName'     => 'required|max:50|min:2',
            'email'        => 'required|email',
            'phone'        => 'required|max:25|min:5',
            'identityCard' => 'required|max:10|min:4',
        ]);

        $customer = Customer::find($id);

        $customer->full_name = $request->fullName;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->identity_card = $request->identityCard;

        $customer->save();

        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer) {
        //
    }
}