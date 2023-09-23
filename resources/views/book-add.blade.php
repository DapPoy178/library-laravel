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
        <form action="{{ url('books-add') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="input-group mb-3 me-2">
                    <input type="text" class="form-control" placeholder="Book Code" aria-label="Book Code"
                        name="book_code" id="book_code" value="{{ old('book_code') }}" required>
                </div>
                <div class="input-group mb-3 me-2">
                    <input type="text" class="form-control" placeholder="Book Name" aria-label="Book Name"
                        name="title" id="title" value="{{ old('title') }}" required>
                </div>
                <div class="input-group mb-3 me-2">
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="input-group mb-3 me-2">
                    <select class="form-control" style="width: 100%" name="categories[]" id="selectedit" multiple="multiple">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#selectedit").select2();
        });
    </script>
@endsection
