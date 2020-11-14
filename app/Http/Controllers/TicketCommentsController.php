<?php

namespace App\Http\Controllers;

use App\Models\TicketComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketCommentsController extends Controller {

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
    public function create() {
        //
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

        $user = Auth::user();

        $comment = new TicketComment();
        $comment->ticket_id = $request->ticketId;
        $comment->employee_name = $user->name;
        $comment->content = $request->content;

        $comment->save();

        return redirect("/tickets/$request->ticketId/edit");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketComment $ticketComment
     * @return \Illuminate\Http\Response
     */
    public function show(TicketComment $ticketComment) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketComment $ticketComment
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketComment $ticketComments) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketComment  $ticketComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketComment $ticketComments) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketComment  $ticketComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketComment $ticketComment) {
        //
    }
}