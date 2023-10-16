<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warning Blog - {{ $title ?? 'Admin' }}</title>
    {{ $scripts ?? null }}
</head>
<body>
<header>
    <nav>
        <a href="{{ route("admin-page") }}">Admin</a>
        <a href="{{ route("admin-posts-page") }}">Posts</a>
    </nav>
</header>
<hr>
<main>
    {{ $slot }}
</main>
</body>
</html>
