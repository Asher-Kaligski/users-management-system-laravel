<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Http\Request;

class TicketsController extends Controller {

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        $customer = Customer::find($id);

        return view('tickets.create', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'content' => 'required|max:1024|min:2',
        ]);

        $ticket = new Ticket();
        $ticket->customer_id = $request->customerId;
        $ticket->employee_name = $request->employee;
        $ticket->content = $request->content;
        $ticket->status = 'New';
        $ticket->save();

        return redirect("/customers/$request->customerId");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $ticket = Ticket::find($id);
        $customer = Customer::find($ticket->customer_id);

        $ticketComments = TicketComment::where('ticket_id', '=', $ticket->id)->get();

        return view('tickets.edit', ['customer' => $customer, 'ticket' => $ticket,
            'comments' => $ticketComments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $ticket = Ticket::find($id);

        $ticket->status = 'Closed';

        $ticket->save();

        return redirect("/customers/$ticket->customer_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket) {
        //
    }
}