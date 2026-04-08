@extends('be.layout.master')
@section('sidebar')
    @include('be.layout.sidebar')
@endsection
@section('navbar')
    @include('be.layout.navbar')
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Daftar Jenis Pengiriman</h4>
            <a href="{{ route('jenis_pengirimans.create') }}" class="btn btn-primary float-right">
                <i class="ti-plus"></i> Tambah Jenis
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Kirim</th>
                        <th>Nama Ekspedisi</th>
                        <th>Biaya</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenis_pengiriman as $jp)
                    <tr>
                        <td>{{ ($jenis_pengiriman->currentPage() - 1) * $jenis_pengiriman->perPage() + $loop->iteration }}</td>
                        <td>{{ ucfirst($jp->jenis_kirim) }}</td>
                        <td>{{ $jp->nama_ekspedisi }}</td>
                        <td>{{ 'Rp '.number_format($jp->biaya, 0, ',', '.') }}</td>
                        <td>
                            @if($jp->logo_ekspedisi)
                            <img src="{{ asset('storage/'.$jp->logo_ekspedisi) }}" width="50">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('jenis_pengirimans.edit', $jp->id) }}" class="btn btn-sm btn-warning">
                                <i class="ti-pencil"></i>
                            </a>
                            <form action="{{ route('jenis_pengirimans.destroy', $jp->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                    <i class="ti-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $jenis_pengiriman->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection