@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

    <div class="m-5">
        <div class="d-flex align-items-center">
            <h3>User Detail</h3>

        </div>
        <hr>
        <hr>
        <h3>Rent Logs</h3>
        <hr>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
