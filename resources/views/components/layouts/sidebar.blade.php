<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/adminlte3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a wire:navigate href="{{ route('dashboard') }}" class="nav-link @yield('menuDashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (auth()->user()->role == 'Admin')
                    <li class="nav-header">ADMIN MENU</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('menuStorage')">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Storage
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a wire:navigate href="{{ route('admin.storage.index') }}"
                                    class="nav-link @yield('menuStorageItem')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Bahan Baku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index2.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../../index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Supplier</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('admin.storage.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Storage
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('admin.user.index') }}" class="nav-link @yield('menuAdminUser')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'Ahli Gizi')
                    <li class="nav-header">Ahli Gizi Menu</li>
                    <li class="nav-item">
                        <a wire:navigate href="{{ route('ahli-gizi.menu.index') }}" class="nav-link @yield('menuAhliGiziUser')">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Menu Makanan
                            </p>
                        </a>
                    </li>
                @endif
                {{-- <li class="nav-header">ADMIN</li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
