@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <div class="m-5">
        <h3>Categories List</h3>
        @if (session('status'))
            <div class="alert alert-success w-50">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger w-50">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('categories-add') }}" method="post">
            <div class="d-flex align-items-center">
                @csrf
                <div class="input-group w-25 me-2">
                    <input type="text" class="form-control" placeholder="category name" aria-label="category name"
                        name="category" id="category" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Add</button>
                <button class="btn btn-dark" type="button"><a href="{{ url('categories-deleted') }}" class="text-white" href=""><i class="bi bi-bootstrap-reboot"></i></a></button>
            </div>
        </form>
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
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->category }}</td>
                        <td>
                            <a href="{{ url('categories-edit/'.$item->slug) }}" class="fs-5 pe-2"><i class="bi bi-pencil-square text-warning"></i></a>
                            <a href="{{ url('categories-delete/'.$item->slug) }}" onclick="return confirm('r u sure u wnat to deltet this item?')" class="fs-5"><i class="bi bi-trash-fill text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
