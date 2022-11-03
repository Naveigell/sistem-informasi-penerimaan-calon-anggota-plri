<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a>Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a>Ad</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Home</li>
            <li><a class="nav-link"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Data</li>
            <li class="nav-item @if (request()->routeIs('admins.candidates.*')) active @endif"><a href="{{ route('admins.candidates.index') }}" class="nav-link"><i class="fas fa-users"></i> <span>Peserta</span></a></li>
            <li class="nav-item @if (request()->routeIs('admins.schedules.*')) active @endif"><a href="{{ route('admins.schedules.index') }}" class="nav-link"><i class="fas fa-calendar-alt"></i> <span>Jadwal</span></a></li>
        </ul>
    </aside>
</div>
