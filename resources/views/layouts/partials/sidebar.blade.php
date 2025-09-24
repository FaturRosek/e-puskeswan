<nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Sidebar</span>
        </li>

        @php
            $role_id = Auth::user()->role_id;
        @endphp

        @if ($role_id == 1)
            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-database"></i>
                    </span>
                    <span class="hide-menu">Data Master</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="/barang" class="sidebar-link">
                            <span><i class="ti ti-box fs-6"></i></span>
                            <span class="hide-menu">Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/jenis" class="sidebar-link">
                            <span><i class="ti ti-report-medical fs-6"></i></span>
                            <span class="hide-menu">Jenis Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/satuan" class="sidebar-link">
                            <span><i class="ti ti-package fs-6"></i></span>
                            <span class="hide-menu">Satuan Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/pengadaan" class="sidebar-link">
                            <span><i class="ti ti-briefcase fs-6"></i></span>
                            <span class="hide-menu">Pengadaan</span>
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a href="/gudang" class="sidebar-link">
                            <span><i class="ti ti-clipboard-text fs-6"></i></span>
                            <span class="hide-menu">Gudang</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a href="/puskeswans" class="sidebar-link">
                            <span><i class="ti ti-building-hospital fs-6"></i></span>
                            <span class="hide-menu">Puskeswan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-clipboard-text"></i>
                    </span>
                    <span class="hide-menu">Pencatatan</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="/serahterima" class="sidebar-link">
                            <span><i class="ti ti-transform fs-6"></i></span>
                            <span class="hide-menu">Serah Terima Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/stokBarang" class="sidebar-link">
                            <span><i class="ti ti-building-store fs-6"></i></span>
                            <span class="hide-menu">Stok Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/pencatatan" class="sidebar-link">
                            <span><i class="ti ti-clipboard-text fs-6"></i></span>
                            <span class="hide-menu">Pencatatan Barang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-article"></i>
                    </span>
                    <span class="hide-menu">CMS</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="/berita" class="sidebar-link">
                            <span><i class="ti ti-news fs-6"></i></span>
                            <span class="hide-menu">Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/announcement" class="sidebar-link">
                            <span><i class="ti ti-speakerphone fs-6"></i></span>
                            <span class="hide-menu">Pengumuman</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-settings"></i>
                    </span>
                    <span class="hide-menu">Settings</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="/beranda" class="sidebar-link">
                            <span><i class="ti ti-settings fs-6"></i></span>
                            <span class="hide-menu">Beranda</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/profile" class="sidebar-link">
                            <span><i class="ti ti-user-circle fs-6"></i></span>
                            <span class="hide-menu">Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/contact" class="sidebar-link">
                            <span><i class="ti ti-settings fs-6"></i></span>
                            <span class="hide-menu">Kontak</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/statistik" class="sidebar-link">
                            <span><i class="ti ti-settings fs-6"></i></span>
                            <span class="hide-menu">Statistik</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Users</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="/user-list" class="sidebar-link">
                            <span><i class="ti ti-user fs-6"></i></span>
                            <span class="hide-menu">User List</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/role" class="sidebar-link">
                            <span><i class="ti ti-tournament fs-6"></i></span>
                            <span class="hide-menu">Role</span>
                        </a>
                    </li>
                </ul>
            </li>
        @else
            <li class="sidebar-item">
                <a class="sidebar-link" href="/dashboard-puskeswan" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/profil-puskeswan" aria-expanded="false">
                    <span>
                        <i class="ti ti-user-circle fs-6"></i>
                    </span>
                    <span class="hide-menu">Profil</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-clipboard-text"></i>
                    </span>
                    <span class="hide-menu">Pencatatan</span>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                        <a href="/serahterima" class="sidebar-link">
                            <span><i class="ti ti-transform fs-6"></i></span>
                            <span class="hide-menu">Serah Terima Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/stokBarang" class="sidebar-link">
                            <span><i class="ti ti-building-store fs-6"></i></span>
                            <span class="hide-menu">Stok Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/pencatatan" class="sidebar-link">
                            <span><i class="ti ti-clipboard-text fs-6"></i></span>
                            <span class="hide-menu">Pencatatan Barang</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
