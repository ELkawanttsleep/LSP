@section ('be.layout.sidebar')
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" 
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('atmin/images/logo.png') }}" alt="Logo">
            </a>
            <a class="navbar-brand hidden" href="{{ route('dashboard') }}">
                <img src="{{ asset('atmin/images/logo2.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Bagian Ini Yang Diperbaiki -->
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(auth()->user()->jabatan === 'admin')
                    @include('be.layout.partials.admin-sidebar')
                @elseif(auth()->user()->jabatan === 'apoteker')
                    @include('be.layout.partials.apoteker-sidebar')
                @elseif(auth()->user()->jabatan === 'karyawan')
                    @include('be.layout.partials.karyawan-sidebar')
                @elseif(auth()->user()->jabatan === 'kasir')
                    @include('be.layout.partials.kasir-sidebar')
                @elseif(auth()->user()->jabatan === 'pemilik')
                    @include('be.layout.partials.pemilik-sidebar')
                @else
                    <div class="alert alert-danger m-3">
                        Role tidak valid! Silakan hubungi administrator
                    </div>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
    <!-- Left Panel -->
@endsection