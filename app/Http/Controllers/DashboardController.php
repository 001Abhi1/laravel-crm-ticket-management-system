<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClients = Client::count();

        $totalTickets = Ticket::count();

        $openTickets = Ticket::where(
            'status',
            'Open'
        )->count();

        $closedTickets = Ticket::where(
            'status',
            'Closed'
        )->count();

        return view(
            'dashboard',
            compact(
                'totalClients',
                'totalTickets',
                'openTickets',
                'closedTickets'
            )
        );
    }
}