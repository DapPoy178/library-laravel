@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="m-5">
        <h3>Book Return</h3>
        <hr>
        @if (session('message'))
            <div class="alert {{session('alert-class')}}">
                {{session('message')}}
            </div>
        @endif
        <form action="{{ url('book-return') }}" method="post">
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
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">User</label>
                    <select class="form-select" aria-label="Default select example" name="user_id" id="user_id">
                        <option value="">Select User</option>
                        @foreach ($user as $item)
                        <option value="{{$item->id}}">{{$item->username}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Books</label>
                    <select class="form-select" name="book_id" id="selectedit" multiple="multiple">
                        <option value="">Select Book</option>
                        @foreach ($books as $item)
                        <option value="{{$item->id}}">{{$item->book_code}} | {{$item->title}}</option>
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
