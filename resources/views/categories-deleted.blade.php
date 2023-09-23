@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <div class="m-5">
        <div class="d-flex align-items-center">
            <h3>Deleted Categories</h3>
            <button class="ms-auto btn btn-primary" type="button"><a href="{{ url('categories') }}" class="text-white text-decoration-none" href="">Back</a></button>
        </div>
        @if (session('status'))
            <div class="alert alert-success w-50">
                {{ session('status') }}
            </div>
        @endif
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category }}</td>
                        <td>
                            <a href="{{ url('categories-restore/'.$item->category) }}" onclick="return confirm('r u sure u wnat to restore this item?')" class="fs-5"><i class="bi bi-bootstrap-reboot text-black"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
