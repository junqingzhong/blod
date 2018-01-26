<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

    <title>@yield('title')</title>
    @yield('style')
    <!-- Bootstrap CSS -->    
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />    
    
    <!-- full calendar css-->
    <!-- <link href="{{asset('admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" /> -->
    <!-- <link href="{{asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" /> -->
     <!-- easy pie chart -->
    <!-- <link href="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/> -->
    <!-- owl carousel -->
    <!-- <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.css')}}" type="text/css"> -->
    <!-- <link href="{{asset('admin/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"> -->
    <!-- Custom styles -->
    <!-- <link rel="stylesheet" href="{{asset('admin/css/fullcalendar.css')}}"> -->
    <!-- <link href="{{asset('admin/css/widgets.css')}}" rel="stylesheet"> -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

    <!-- <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" /> -->
    <!-- <link href="{{asset('admin/css/xcharts.min.css')}}" rel=" stylesheet">    -->
    <!-- <link href="{{asset('admin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet"> -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <script src="{{asset('admin/js/jquery.js')}}"></script>
    <script src="{{asset('admin/js/alert.js')}}"></script>


</head>
<body>
    @include('layouts.admin_topMenu')

    @include('layouts.admin_menu')
            
    @yield('content')

      <!-- javascripts -->

    <script src="{{asset('admin/js/jquery-ui-1.10.4.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery-1.8.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <!-- nice scroll -->
    <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <!-- charts scripts -->
<!--     <script src="{{asset('admin/assets/jquery-knob/js/jquery.knob.js')}}"></script>
    <script src="{{asset('admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin/js/owl.carousel.js')}}" ></script> -->
    <!-- jQuery full calendar -->
    <!-- <script src="{{asset('admin/js/fullcalendar.min.js')}}"></script> <!-- Full Google Calendar - Calendar --> -->
    <!-- <script src="{{asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script> -->
    <!--script for this page only-->
    <!-- <script src="{{asset('admin/js/calendar-custom.js')}}"></script> -->
    <!-- <script src="{{asset('admin/js/jquery.rateit.min.js')}}"></script> -->
    <!-- custom select -->
    <!-- <script src="{{asset('admin/js/jquery.customSelect.min.js')}}" ></script> -->
    <!-- <script src="{{asset('admin/assets/chart-master/Chart.js')}}"></script> -->
   
    <!--custome script for all page-->
    <!-- custom script for this page-->
    <!-- <script src="{{asset('admin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('admin/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/js/xcharts.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('admin/js/gdp-data.js')}}"></script>    
    <script src="{{asset('admin/js/morris.min.js')}}"></script>
    <script src="{{asset('admin/js/sparklines.js')}}"></script>  
    <script src="{{asset('admin/js/charts.js')}}"></script>
    <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script> -->
    @yield('script')

    @if (count($errors) > 0)
    <script type="text/javascript" charset="utf-8" >
           top_alert('1',"{!! implode('<br>', $errors->all()) !!}");
    </script>
    @endif
    <script type="text/javascript" charset="utf-8" >
    var url = window.location.pathname;
    var str = url.split('/');
    var a_url,msg_url,menu_url;
    $('.sidebar-menu a').each(function(inx,val){
        a_url = $(val).attr('href').split('/');
        msg_url = str['1']+'/'+str['2'];
        menu_url = a_url['3']+'/'+a_url['4'];
        if(msg_url==menu_url)
        {   
            $(val).parents('.sub-menu').siblings('li').removeClass('active');
            $(val).parents('ul').css({'display':'block','overflow':'hidden'});
            $(val).css('background-color','#2e3b46');
        }
    })
    </script>
</body>
</html>
