@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <div class="m-5">
        <h3>Rent Logs</h3>
        <hr>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
    