<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>

<nav>
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('plants.index') }}">Plants</a>
    <a href="{{ route('plants.create') }}">Create Plant</a>
</nav>

<hr>

@yield('content')

</body>
</html>