<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['client', 'user'])
            ->latest()
            ->get();

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $clients = Client::all();
        $admins = User::role('Admin')->get();

        return view('tickets.create', compact('clients', 'admins'));
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'user_id'     => 'nullable|exists:users,id',
            'subject'     => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|in:Low,Medium,High',
            'status'      => 'required|in:Open,In Progress,Closed',
        ]);
// public function store(Request $request)
// {
//     dd([
//         'subject' => $request->subject,
//         'description' => $request->description,
//         'all' => $request->all()
//     ]);

        // ✅ Create Ticket
        Ticket::create([
            'client_id'   => $request->client_id,
            'user_id'     => $request->user_id,
            'subject'     => $request->subject,
            'description' => $request->description,
            'priority'    => $request->priority,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket created successfully');
    }

    public function edit(Ticket $ticket)
    {
        $clients = Client::all();
        $admins = User::role('Admin')->get();

        return view('tickets.edit', compact('ticket', 'clients', 'admins'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'user_id'     => 'nullable|exists:users,id',
            'subject'     => 'required|string|max:255',
            'description' => 'required|string',
            'priority'    => 'required|in:Low,Medium,High',
            'status'      => 'required|in:Open,In Progress,Closed',
        ]);

        $ticket->update([
            'client_id'   => $request->client_id,
            'user_id'     => $request->user_id,
            'subject'     => $request->subject,
            'description' => $request->description,
            'priority'    => $request->priority,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Ticket deleted successfully');
    }
}