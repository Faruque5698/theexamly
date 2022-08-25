<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title') theExamly - Evaluate Yourself</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
        {{-- <link
           rel="apple-touch-icon"
           sizes="180x180"
           href="public/frontend/images/favicon/apple-touch-icon.png"
         />
         <link
           rel="icon"
           type="image/png"
           sizes="32x32"
           href="public/frontend/images/favicon/favicon-32x32.png"
         />
         <link
           rel="icon"
           type="image/png"
           sizes="16x16"
           href="public/frontend/images/favicon/favicon-16x16.png"
         />
         <link rel="manifest" href="./images/favicon/site.webmanifest" /> --}}

        <!-- plugin css -->
        {!! Html::style('public/assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
        {!! Html::style('public/assets/plugins/ti-icons/css/themify-icons.css') !!}
        {!! Html::style('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
        <!-- end plugin css -->

        @stack('plugin-styles')

        <!-- common css -->
        {!! Html::style('public/css/app.css') !!}
        {!! Html::style('public/css/custom.css') !!}
        {!! Html::style('public/css/custom-css.css') !!}
        <!-- end common css -->

        @stack('style')




    </head>

    <body class="sidebar-dark" data-base-url="{{url('/')}}">

        <div class="container-scroller" id="app">
            @include('backend.layout.header')
            <div class="container-fluid page-body-wrapper">
                @include('backend.layout.settings-panel')
                @include('backend.layout.sidebar')
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    @include('backend.layout.footer')
                </div>
            </div>
        </div>

        <!-- base js -->
        {!! Html::script('public/js/app.js') !!}
        {!! Html::script('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
        <!-- end base js -->

        <!-- plugin js -->
        @stack('plugin-scripts')
        <!-- end plugin js -->

        <!-- common js -->
        {!! Html::script('public/assets/js/off-canvas.js') !!}
        {!! Html::script('public/assets/js/hoverable-collapse.js') !!}
        {!! Html::script('public/assets/js/misc.js') !!}
        {!! Html::script('public/assets/js/settings.js') !!}
        {!! Html::script('public/assets/js/todolist.js') !!}
        <!-- end common js -->

        @stack('custom-scripts')
    </body>

</html>