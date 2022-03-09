<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon-->

    @include('admin.inc.style')

    <title>{{ config('app.name', 'Evergrow - Forex and Crypto Asset Management') }}</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.inc.sidebar')
        <!--end sidebar wrapper -->

        <!--start header -->
        @include('admin.inc.header')
        <!--end header -->

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                    @yield('content')

            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.inc.footer')
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    @include('admin.inc.theme')
    <!--end switcher-->
    <!-- Bootstrap JS -->
    @include('admin.inc.script')
</body>

</html>
