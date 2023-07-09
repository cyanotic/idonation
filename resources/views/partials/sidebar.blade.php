<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">IDonation</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">ID</a>
        </div>
        @can('admin')
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                            class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-header">Data</li>
                <li class="{{ request()->is('dashboard/user*') ? 'active' : '' }}"><a class="nav-link"
                        href="/dashboard/user"><i class="fas fa-users"></i> <span>Data User</span></a></li>
                <li class="{{ request()->is('dashboard/kategori*') ? 'active' : '' }}"><a class="nav-link"
                        href="/dashboard/kategori"><i class="fas fa-clipboard-list"></i><span>Data Kategori
                            Donasi</span></a></li>
                <li class="{{ request()->is('dashboard/daftar-donasi*') ? 'active' : '' }}"><a class="nav-link"
                        href="/dashboard/daftar-donasi"><i class="fas fa-bookmark"></i><span>Daftar
                            Donasi</span></a></li>
                <li class="{{ request()->is('dashboard/riwayat-donasi*') ? 'active' : '' }}"><a class="nav-link"
                        href="/dashboard/riwayat-donasi"><i class="fas fa-hand-holding-usd"></i><span>Riwayat
                            Donasi</span></a></li>
            </ul>
        @endcan
        @can('pengguna')
        <ul class="sidebar-menu">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                        class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->is('user-donasi*') ? 'active' : '' }}"><a class="nav-link"
                    href="/user-donasi"><i class="fas fa-hand-holding-usd"></i><span>Donasi</span></a></li>
            <li class="{{ request()->is('riwayat*') ? 'active' : '' }}"><a class="nav-link"
                    href="/riwayat/invoice"><i class="fas fa-book"></i><span>Riwayat
                        Donasi</span></a></li>
        </ul>
    @endcan
    </aside>
</div>
