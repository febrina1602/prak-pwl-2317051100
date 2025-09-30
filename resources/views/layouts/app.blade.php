<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5aRU9GFErPok6YctnYmDr5pNLyT2BrJxh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
</head>
<body>
    @yield('content')

    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY31HB6ONNmXC5s9fDVZLESAAA5NDz0xhy9GkcIds1K1eN7NjIeHZ" 
        crossorigin="anonymous">
    </script>
</body>
</html>