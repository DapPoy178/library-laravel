@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

    <div class="m-5">
        @if (session('status'))
            <div class="alert alert-success w-50">
                {{ session('status') }}
            </div>
        @endif
        <div class="d-flex align-items-center">
            <h3>User list</h3>
            <button class="btn btn-secondary ms-auto me-2" type="button"><a href="{{ url('users') }}"
                    class="text-white text-decoration-none" href="">Back</a></button>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ url('user-details-approve/'. $item->slug) }}" class="fs-5">
                                <i class="bi bi-check-square-fill text-success"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
