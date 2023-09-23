<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                        class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list">
                    @if (Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="{{ url('dashboard') }}"
                                @if (request()->route()->uri == 'dashboard') class=" nav_link active" 
                            @else class="nav_link " @endif>
                                <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                            <a href="{{ url('books') }}"
                                @if (request()->route()->uri == 'books') class=" nav_link active"
                            @else class="nav_link " @endif>
                                <i class='bx bx-book-add nav_icon'></i> <span class="nav_name">Books</span> </a>
                            <a href="{{ url('/') }}"
                                @if (request()->route()->uri == '/') class=" nav_link active"
                            @else class="nav_link " @endif>
                                <i class='bx bx-book-content nav_icon'></i> <span class="nav_name">Book List</span> </a>
                            <a href="{{ url('book-rent') }}"
                                @if (request()->route()->uri == 'book-rent') class=" nav_link active"
                            @else class="nav_link " @endif>
                                <i class='bx bx-book nav_icon'></i> <span class="nav_name">Book Rent</span> </a>
                            <a href="{{ url('book-return') }}"
                                @if (request()->route()->uri == 'book-return') class=" nav_link active"
                            @else class="nav_link " @endif>
                                <i class='bx bx-book-alt nav_icon'></i> <span class="nav_name">Book Return</span> </a>
                            <a href="{{ url('categories') }}"
                                @if (request()->route()->uri == 'categories' || request()->route()->uri == 'categories-deleted') class=" nav_link active"
                            @else class="nav_link" @endif>
                                <i class='bx bx-category nav_icon'></i> <span class="nav_name">Categories</span> </a>
                            <a href="{{ url('users') }}"
                                @if (request()->route()->uri == 'users' || request()->route()->uri == 'registered-users') class=" nav_link active"
                            @else class="nav_link" @endif>
                                <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
                            <a href="{{ url('rentlog') }}"
                                @if (request()->route()->uri == 'rentlog') class=" nav_link active"
                            @else class="nav_link" @endif>
                                <i class='bx bx-notepad nav_icon'></i> <span class="nav_name">RentLogs</span> </a>
                </div>
            </div> <a href="{{ url('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">SignOut</span> </a>
        @else
            <a href="{{ url('/') }}"
                @if (request()->route()->uri == '/') class=" nav_link active"
                            @else class="nav_link " @endif>
                <i class='bx bx-book nav_icon'></i> <span class="nav_name">Book List</span> </a>
            <a href="{{ url('profile') }}"
                @if (request()->route()->uri == 'users' || request()->route()->uri == 'registered-users') class=" nav_link active"
                                            @else class="nav_link" @endif>
                <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a>
            <a href="{{ url('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">Sign Out</span> </a>
            @endif
        @else
            <a href="{{ url('login') }}" class="nav_link"> <i class='bx bx-log-in nav_icon'></i> <span
                    class="nav_name">Login</span> </a>
            @endif
        </nav>
    </div>
    <!--Container Main start-->
    <div class="pt-2">
        @yield('content')
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
