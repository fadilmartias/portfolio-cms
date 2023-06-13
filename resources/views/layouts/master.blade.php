<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-layout-mode="dark" data-body-image="img-1" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title') | Portfolio Fadil CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Portfolio Fadil CMS" name="description" />
    <meta content="M. Fadil Martias" name="author" />

    @include('partials.styles')

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('partials.topbar')

        @include('partials.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @include('partials.breadcrumb')

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>

            @include('partials.footer')

        </div>
    </div>

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-primary btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    @include('partials.scripts')

</body>

</html>
