@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>CRM Dashboard</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $totalClients }}</h3>

                <p>Total Clients</p>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $totalTickets }}</h3>

                <p>Total Tickets</p>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $openTickets }}</h3>

                <p>Open Tickets</p>

            </div>

        </div>

    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $closedTickets }}</h3>

                <p>Closed Tickets</p>

            </div>

        </div>

    </div>

</div>

@stop