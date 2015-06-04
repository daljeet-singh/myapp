<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DJ-Laravel</title>
        <link href="/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="/vendors/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="/vendors/socicon/socicon.min.css" rel="stylesheet">

        <link href="/css/app.min.1.css" rel="stylesheet">
        <link href="/css/app.min.2.css" rel="stylesheet">
    </head>
    <body>
        <header id="header">
        @include('Elements.header')
        </header>
        <section id="main">
            <aside id="sidebar">
            @include('Elements.menu')
            </aside>
            <section id="content">
                <div class="container">
                @include('flash::message')
                @yield('content')
                </div>
            </section>
        </section>
    </body>
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    <script src="/vendors/flot/jquery.flot.min.js"></script>
    <script src="/vendors/flot/jquery.flot.resize.min.js"></script>
    <script src="/vendors/flot/plugins/curvedLines.js"></script>
    <script src="/vendors/sparklines/jquery.sparkline.min.js"></script>
    <script src="/vendors/easypiechart/jquery.easypiechart.min.js"></script>
    
    <script src="/vendors/fullcalendar/lib/moment.min.js"></script>
    <script src="/vendors/fullcalendar/fullcalendar.min.js"></script>
    <script src="/vendors/simpleWeather/jquery.simpleWeather.min.js"></script>
    <script src="/vendors/auto-size/jquery.autosize.min.js"></script>
    <script src="/vendors/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/vendors/waves/waves.min.js"></script>
    <script src="/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
    <script src="/vendors/sweet-alert/sweet-alert.min.js"></script>
    <script src="/vendors/validator/jquery.validate.js"></script>
    
    <script src="/js/charts.js"></script>
    <script src="/js/functions.js"></script>
    <script src="/js/custom.js"></script>
    <!--<script src="js/demo.js"></script>!-->
    @yield('footer');
</html>