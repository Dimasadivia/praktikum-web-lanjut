<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <link href=" 
    https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.m
     in.css" rel="stylesheet" integrity="sha384
    QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous"> 
</head>
<body>
    @yield('content')



    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstr
     ap.bundle.min.js" integrity="sha384
    YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script> 
</body>
</html>