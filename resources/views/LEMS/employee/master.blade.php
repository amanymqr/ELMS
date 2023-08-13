<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', env('APP_NAME'))</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        h3,
        h4 {
            font-weight: 700;
        }

        .navbar {
            box-shadow: 0px 2px 6px rgb(245, 224, 231);
        }

        .logo-1 a {
            font-size: 20px;
            font-weight: 500;
            color: #53455c;
        }

        .links a {
            color: #53455c;

        }

        @yield('style')
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg  bg-light">
        <div class="container">
            {{--  <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="/path/to/your/logo.png" alt="Logo" height="30">
            </a>  --}}

            <!-- Toggle button for collapsed navigation on small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item logo-1">
                        <a class="nav-link " href="{{ route('leave-requests.create') }}"> ElMS </a>
                    </li>
                </ul>

                <!-- Right-aligned links -->
                <ul class="navbar-nav">
                    <li class="nav-item links">
                        <a class="nav-link" href="{{ route('leave-requests.create') }}">Submit Request</a>
                    </li>
                    <li class="nav-item links">
                        <a class="nav-link" href="{{ route('leave-requests.index') }}">My Requests</a>
                    </li>

                    <li class="nav-item links">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>
