<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>
    @include('layouts.candidate.style')
    <!-- /END GA -->
</head>

<body class="layout-3">
<div id="app">
    <div class="main-wrapper container">
        <div class="navbar-bg" style="height: 70px;"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            <div class="nav-collapse">
                <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content p-5">
            <section class="section">
                <div class="section-body">
                    <section class="section">
                        @yield('content')
                    </section>
                </div>
            </section>
        </div>
    </div>
</div>
@include('layouts.candidate.script')
@stack('scripts')
</body>
</html>
