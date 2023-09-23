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
                id="book_code" value="{{ $user->username }}">
        </div>
        <div class="mb-2 w-25">
            <label for="title" class="form-label">Status</label>
            <input type="text" class="form-control" placeholder="Book Name" aria-label="Book Name" name="title"
                id="title" value="{{ $user->status }}">
        </div>
        <div class="mb-2 w-25">
            <label for="book_code" class="form-label">Phone</label>
            <input type="text" class="form-control" placeholder="Book Code" aria-label="Book Code" name="book_code"
                id="book_code" value="{{ $user->phone }}">
        </div>
        <div class="mb-2 w-25">
            <label for="title" class="form-label">Address</label>
            <textarea type="text" class="form-control" placeholder="Book Name" aria-label="Book Name" name="title"
                id="title">{{ $user->address }}</textarea>
        </div>
        <button class="btn btn-success">
            <a href="{{ url('user-approve/' . $user->slug) }}" class="fs-5 text-decoration-none text-white">
                <span>Approve</span>
            </a>
        </button>
    </div>
@endsection
