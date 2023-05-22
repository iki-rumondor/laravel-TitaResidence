<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset('./assets/images/logo.png') }}" width="120px" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                @role('customer')
                    <li class='sidebar-title'>Pelanggan</li>
                    <li class="sidebar-item {{ Request::is('customer/offering') ? 'active' : '' }}">
                        <a href="/customer/offering" class='sidebar-link'>
                            <i data-feather="send" width="20"></i>
                            <span>Penawaran Saya</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('customer/house') ? 'active' : '' }}">
                        <a href="/customer/house" class='sidebar-link'>
                            <i data-feather="slack" width="20"></i>
                            <span>Rumah Saya</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('customer/warranty') ? 'active' : '' }}">
                        <a href="/#property" class='sidebar-link'>
                            <i data-feather="send" width="20"></i>
                            <span>Lihat Rumah Lain</span>
                        </a>
                    </li>
                @else
                    <li class='sidebar-title'>Admin</li>
                    <li class="sidebar-item {{ Request::is('admin', 'admin/customers*') ? 'active' : '' }}">
                        <a href="/admin/customers" class='sidebar-link'>
                            <i data-feather="users" width="20"></i>
                            <span>Pelanggan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/houses*') ? 'active' : '' }}">
                        <a href="/admin/houses" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Rumah</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/offers*') ? 'active' : '' }}">
                        <a href="/admin/offers" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Penawaran</span>
                        </a>
                    </li>
                @endrole

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
