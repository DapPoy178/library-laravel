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
            <h3>Deleted Books list</h3>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Book Code</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col" width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->category }},
                            @endforeach
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ url('books-restore/' . $item->slug) }}"
                                onclick="return confirm('r u sure u wnat to restore this item?')" class="fs-5"><i
                                    class="bi bi-bootstrap-reboot text-black"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
