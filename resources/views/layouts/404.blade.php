<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this my neffy  blod">
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">

    <title>neffy-404</title>

    <script src="{{asset('admin/js/jquery.js')}}"></script>
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">



</head>

  <body>
   <div class="page-404">
    <p class="text-404">404</p>
        <p>@if (count($errors) > 0)
           <h2>{!! implode('<br>', $errors->all()) !!}</h2>
        @endif
        <br>
        <a href="javascript:void(0)" >(waiting <span>3</span>s)  Return Home</a></p>
  </div>
  
  </body>
</html>
<script>
    var time = $('span').html();
    setInterval(function(){
        if(time>=0){
            $('span').html(time--);
        }else{
            window.history.go(-1);
        }
    }, 1000);
</script>
