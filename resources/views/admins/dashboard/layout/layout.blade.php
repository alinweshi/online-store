<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
@include('admins.dashboard.layout.styles')
    </head>

<body>
       <!-- Sidebar Start -->
        @include('admins.dashboard.layout.sidebar')
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
        @include('admins.dashboard.layout.header')
            <!-- Navbar End -->
        @yield('content')`
            <!-- Footer Start -->
        @include('admins.dashboard.layout.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        <div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
        @include('admins.dashboard.layout.scripts')
</body>
</html>
