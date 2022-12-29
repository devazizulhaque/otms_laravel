<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTMS - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/') }}front/css/bootstrap.css" />
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="container">
            <a href="" class="navbar-brand">Logo</a>
            <ul class="navbar-nav ms-auto">
                <li><a href="{{ route('front.home') }}" class="nav-link">Home</a></li>
                <li class="dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Course Category</a>
                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                            <li><a href="{{ route('front.course-category', ['id' => $category->id]) }}" class="dropdown-item">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ route('front.about') }}" class="nav-link">About</a></li>
                <li><a href="{{ route('front.contact') }}" class="nav-link">Contact</a></li>
                @if(auth()->check())
                    <li><a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">Logout</a></li>
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                    </form>
                @else
                    <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('body')

    <section class="py-2 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center">OtmsBatch14 &copy;{{ date('Y') }} copyright | All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>

<script src="{{ asset('/') }}front/js/bootstrap.bundle.js"></script>
</body>
</html>
