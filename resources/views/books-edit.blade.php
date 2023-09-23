@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="m-5">
        <h3>Books Edit</h3>
        <a href="{{ url('books') }}" class="btn btn-secondary px-2 py-2 mb-2">Back</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/books-edit/{{$books->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="me-2">
                <label for="book_code" class="form-label">Book Code</label>
                <input type="text" class="form-control" placeholder="Book Code" aria-label="Book Code" name="book_code"
                    id="book_code" value="{{ $books->book_code }}" required>
            </div>
            <div class="mb-2 me-2">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Book Name" aria-label="Book Name" name="title"
                    id="title" value="{{ $books->title }}" required>
            </div>
            <div class="input-group mb-3 me-2">
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="d-flex flex-column me-2">
                <label for="currentImage" class="form-label">Current Image</label>
                @if ($books->cover != '')
                    <img src="{{ asset('storage/cover/' . $books->cover) }}" alt="" width="100px">
                @else
                    <img src="{{ asset('image/not-found.png') }}" alt="" width="300px">
                @endif
            </div>
            <div class="mb-2 me-2">
                <label for="categories" class="form-label">Categories</label>
                <select class="form-control" style="width: 100%" name="categories[]" id="selectedit" multiple="multiple">
                    @foreach ($books->categories as $item)
                        <option value="{{ $item->id }}" selected>{{ $item->category }}</option>
                    @endforeach
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning float-end">Save</button>
        </form>
    </div>
    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
