@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="m-5">
        @if (session('status'))
            <div class="alert alert-success w-50">
                {{ session('status') }}
            </div>
        @endif
        <div class="d-flex align-items-center">
            <h3>Book list</h3>
            <button type="button" class="btn btn-primary me-2 ms-auto"><a href="{{ url('books-add') }}" class="text-white" href="">Add</a></button>
            <button class="btn btn-dark" type="button"><a href="{{ url('books-deleted') }}" class="text-white" href=""><i class="bi bi-bootstrap-reboot"></i></a></button>
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
                @foreach ($books as $item)
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
                            <a href="{{ url('books-edit/' . $item->slug) }}" class="fs-5 pe-2"><i
                                    class="bi bi-pencil-square text-warning"></i></a>
                            <a href="{{ url('books-destroy/' . $item->slug) }}"
                                onclick="return confirm('r u sure u wnat to deltet this item?')" class="fs-5"><i
                                    class="bi bi-trash-fill text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#selectadd").select2({
                dropdownParent: $("#addModal")
            });
        });
    </script>
@endsection
