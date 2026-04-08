@extends('be.layout.master')

@section('sidebar')
    @include('be.layout.sidebar')
@endsection

@section('navbar')
    @include('be.layout.navbar')
@endsection

@section('content')
<div class="d-flex align-items-start mb-4">
    <div class="col-lg-3 col-md-6 p-0">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-four">
                    <div class="stat-icon dib">
                        <i class="ti-credit-card text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Total Metode</div>
                            <div class="stat-text">Total: {{ $totalPaymentMethods }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary ms-3" href="{{ route('payment_methods.create') }}" role="button" style="min-width:120px; height:45px; display:flex; align-items:center; justify-content:center;">
        Tambah Metode
    </a>
</div>

<div class="mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Metode</th>
                    <th>Tempat Bayar</th>
                    <th>No. Rekening</th>
                    <th>Logo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentMethods as $metode)
                <tr>
                    <td>{{ ($paymentMethods->currentPage() - 1) * $paymentMethods->perPage() + $loop->iteration }}</td>
                    <td>{{ $metode->metode_pembayaran }}</td>
                    <td>{{ $metode->tempat_bayar }}</td>
                    <td>{{ $metode->no_rekening }}</td>
                    <td>
                        @if($metode->url_logo)
                        <img src="{{ asset('storage/'.$metode->url_logo) }}" width="50" alt="Logo">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('payment_methods.edit', $metode->id) }}" class="btn btn-sm btn-warning">
                            <i class="ti-pencil"></i>
                        </a>
                        <form action="{{ route('payment_methods.destroy', $metode->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus metode ini?')">
                                <i class="ti-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        {{ $paymentMethods->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection