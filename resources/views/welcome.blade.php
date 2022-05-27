<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="url" content="{{url('')}}">

        <!-- Fonts -->


        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div id="app">
                @yield('content')
            </div>
        </div>
    </div>

        <script src="{{asset('js/app.js')}}"> </script>
    </body>
</html>
