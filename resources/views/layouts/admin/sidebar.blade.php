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
            <li class="menu-header">Master</li>
            <li class="nav-item @if (request()->routeIs('admins.registrations.*')) active @endif"><a href="{{ route('admins.registrations.index') }}" class="nav-link"><i class="fas fa-hand-paper"></i>Registrasi</a></li>
            <li class="menu-header">Menu</li>
            <li class="nav-item @if (request()->routeIs('admins.registration-procedures.*')) active @endif"><a href="{{ route('admins.registration-procedures.index') }}" class="nav-link"><i class="fa fa-toilet-paper"></i>Tata Cara Pendaftaran</a></li>
            <li class="nav-item @if (request()->routeIs('admins.clothing-instructions.*')) active @endif"><a href="{{ route('admins.clothing-instructions.index') }}" class="nav-link"><i class="fa fa-tshirt"></i>Petunjuk Pakaian</a></li>
            <li class="menu-header">Additional</li>
            <li class="nav-item @if (request()->routeIs('admins.master.files.*')) active @endif"><a href="{{ route('admins.master.files.index') }}" class="nav-link"><i class="fas fa-paperclip"></i> <span>Berkas</span></a></li>
        </ul>
    </aside>
</div>
