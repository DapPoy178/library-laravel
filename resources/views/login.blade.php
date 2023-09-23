<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    
    <div class="main d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 500px;">
            <div class="card-body m-4">
                <h5 class="text-center" style="margin-bottom: 40px">Login</h5>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="username" class="form-label">Email address</label>
                      <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary form-control mb-2">Login</button>
                    <div class="d-flex">
                        <p class="m-0 pe-2" style="font-size: 14px">Don't have account yet?</p>
                        <a href="{{ url('register') }}" style="text-decoration: none; font-size: 14px;">Sign Up</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
