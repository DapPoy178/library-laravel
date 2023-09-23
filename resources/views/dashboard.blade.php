@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
    <div class="m-5">
        <h2>Welcome, {{ Auth::user()->username }}</h2>
        <hr>
        <div class="d-flex flex-row justify-content-between">
            <div class="card" style="width: 20rem;">
                <div class="card-body d-flex flex-row">
                    <div class="col-2 d-flex align-items-center me-2">
                        <i class="bi bi-journal-album" style="font-size: 4rem;"></i>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <div class="d-flex flex-column align-items-end">
                            <h5 class="card-text">Books</h5>
                            <p class="card-text">{{$book_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <div class="card-body d-flex flex-row">
                    <div class="col-2 d-flex align-items-center me-2">
                        <i class="bi bi-people-fill" style="font-size: 4rem;"></i>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <div class="d-flex flex-column align-items-end">
                            <h5 class="card-text">Users</h5>
                            <p class="card-text">{{$user_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <div class="card-body d-flex flex-row">
                    <div class="col-2 d-flex align-items-center me-2">
                        <i class="bi bi-grid-fill" style="font-size: 4rem;"></i>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <div class="d-flex flex-column align-items-end">
                            <h5 class="card-text">Categories</h5>
                            <p class="card-text">{{$category_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h3>Rent Logs</h3>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
