@section ('be.layout.sidebar')
<!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('atmin/images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('atmin/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('admin.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
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
                  
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
@endsection