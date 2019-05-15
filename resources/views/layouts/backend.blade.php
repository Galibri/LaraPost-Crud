<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownCats" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownCats">
                            <a class="dropdown-item" href="{{route('category.index')}}">View All</a>
                            <a class="dropdown-item" href="{{route('category.create')}}">Add New</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownPosts" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Post
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownPosts">
                            <a class="dropdown-item" href="{{route('post.index')}}">View All</a>
                            <a class="dropdown-item" href="{{route('post.create')}}">Add New</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-container">
        @include('backend.errors.error')
        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>