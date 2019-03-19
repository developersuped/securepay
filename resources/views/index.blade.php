<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgroWeb</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body>
    <div id="app">
        {{--<notifications group="noty">
        </notifications>--}}

        <encabezado :nav="menu" ref="header" :avatar="avatar" :user="user" :rol="rol"></encabezado>
    </div>
    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>