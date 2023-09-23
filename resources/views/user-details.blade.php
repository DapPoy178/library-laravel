@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

    <div class="m-5">
        <div class="d-flex align-items-center">
            <h3>User Detail</h3>

        </div>
        <hr>
        <div class="mb-2 w-25">
            <label for="book_code" class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Book Code" aria-label="Book Code" name="book_code"
                id="book_code" value="{{ $user->username }}" readonly>
        </div>
        <div class="mb-2 w-25">
            <label for="title" class="form-label">Status</label>
            <input type="text" class="form-control" placeholder="Book Name" aria-label="Book Name" name="title"
                id="title" value="{{ $user->status }}" readonly>
        </div>
        <div class="mb-2 w-25">
            <label for="book_code" class="form-label">Phone</label>
            <input type="text" class="form-control" placeholder="Book Code" aria-label="Book Code" name="book_code"
                id="book_code" value="{{ $user->phone }}" readonly>
        </div>
        <div class="mb-2 w-25">
            <label for="title" class="form-label">Address</label>
            <textarea type="text" class="form-control" placeholder="Book Name" aria-label="Book Name" name="title"
                id="title" readonly>{{ $user->address }}</textarea>
        </div>
        <hr>
        <h3>Rent Logs</h3>
        <hr>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection
