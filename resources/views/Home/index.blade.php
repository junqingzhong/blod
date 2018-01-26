<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Larvuent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />  
    <link href="{{asset('home/css/Reset.css?v=22')}}" rel="stylesheet" />
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
    <div class="footer">
        <a href="{{route('index')}}">
        <img  src="https://i.typcdn.com/niki/9w/8UNO32aSBrmF7srPV1HA.png" style="width:32px;vertical-align: middle;"/>
        <span>neffy</span>
        </a>
        <div class="friend-link"><a href="#">friend-link</a></div>
      </div>
    <script src="{{ mix('js/app.js') }}"></script>
</html> 