@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="m-5">
        <form action="" method="get">
            <div class="d-flex align-items-center">
                <h3 class="me-auto">Book List</h3>
                <select class="form-control w-25" aria-label="Default select example" name="category" id="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                    @endforeach
                </select>
                <input class="form-control w-25 me-2 ms-5" type="text" placeholder="Search" aria-label="Search"
                    name="title">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
        </form>
        <hr>
        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-2 g-4">
            @foreach ($books as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('images/not-found.png') }}"
                            draggable="false" class="img-thumbnail img-fluid ms-auto me-auto" alt="..."
                            style="max-height: 200px; max-width: 200px;">
                        <div class="card-body">
                            <h5 class="card-title text-bold"><strong>{{ $item->title }}</strong></h5>
                            <div class="d-flex flex-row align-items-center my-3">
                                <span><small>{{ $item->book_code }}</small></span>
                                <span
                                    class="badge ms-auto {{ $item->status == 'In Stock' ? 'text-bg-success' : 'text-bg-danger' }} ">{{ $item->status }}</span>
                            </div>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#category").select2();
        });
    </script>
@endsection
