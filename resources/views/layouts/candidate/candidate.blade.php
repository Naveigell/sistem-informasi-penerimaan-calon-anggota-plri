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
            <a href="{{ route('candidates.dashboards.index') }}" class="navbar-brand sidebar-gone-hide">Stisla</a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            <div class="nav-collapse">
                <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <ul class="navbar-nav">
                    @if(auth('candidate')->check())
                        <li class="nav-item active"><a href="{{ route('candidates.dashboards.index') }}" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="{{ route('candidates.biodatas.index') }}" class="nav-link">Biodata</a></li>
                        <li class="nav-item"><a href="{{ route('candidates.files.index') }}" class="nav-link">Berkas</a></li>
                        <li class="nav-item"><a href="{{ route('candidates.selection-results.index') }}" class="nav-link">Nilai</a></li>
                        <li class="nav-item"><a href="{{ route('candidates.auth.logout') }}" class="nav-link">Logout</a></li>
                    @else
                        <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" aria-expanded="true">
                                <div class="d-sm-none d-lg-inline-block m-0">Jadwal Seleksi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @foreach($schedules as $schedule)
                                    <a href="{{ $schedule->filename_url }}" class="dropdown-item has-icon">{{ $schedule->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{ $procedure->filename_url }}" class="nav-link">Tata Cara Pendaftaran</a></li>
                        <li class="nav-item"><a href="{{ $clothing->filename_url }}" class="nav-link">Petunjuk Pakaian</a></li>
                    @endif
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
