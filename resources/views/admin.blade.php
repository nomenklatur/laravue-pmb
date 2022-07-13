<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PMB IAKN Tarutung</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
  </head>

    <body>
        
        <div id="app">
            @if(Auth::check())
                <main-app :user="{{Auth::user()}}"></main-app>
            @else
                <main-app :user="false"></main-app>
            @endif
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>