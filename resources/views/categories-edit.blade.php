@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <div class="m-5">
        <h3>Categories Edit</h3>
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
        <form action="{{ url('categories-edit/'.$category->slug) }}" method="post">
            <div class="d-flex align-items-center">
                @csrf
                @method('PUT')
                <div class="input-group w-25 me-2">
                    <input type="text" class="form-control" placeholder="category name" aria-label="category name"
                        name="category" id="category" value="{{$category->category}}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
