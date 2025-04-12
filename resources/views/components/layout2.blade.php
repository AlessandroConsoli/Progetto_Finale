<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="aboutUs-bg">
    <x-navbar/>

    <div class="Custom-layout2-height">
        {{$slot}}
    </div>

    <x-footer/>
    
    <script src="https://kit.fontawesome.com/f883a187e0.js" crossorigin="anonymous"></script>
</body>
</html>