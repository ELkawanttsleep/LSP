        <h3 class="menu-title">{{ $title }}</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
            <a href="{{ route('adduser.index') }}" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Tambah User</a>
            
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="{{ route('payment_methods.index') }}" class="dropdown-toggle"> <i class="menu-icon fa fa-money"></i>Jenis Pembayaran</a>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="{{ route('jenis_pengirimans.index') }}" class="dropdown-toggle"> <i class="ti ti-mail-fast"></i><span style="margin-left: 38px;">Jenis Pengiriman</span></a>
        </li>
        <li class="menu-item-has-children dropdown">
            <a href="{{ route('distributors.index') }}" class="dropdown-toggle" > <i class="menu-icon fa fa-users"></i>Distributor</a>
        </li>
    </ul>