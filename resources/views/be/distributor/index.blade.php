@extends('be.layout.master')

@section('sidebar')

@include('be.layout.sidebar')

@endsection

@section('navbar')

@include('be.layout.navbar')

@endsection

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Daftar Distributor</h4>
                            <a href="{{ route('distributors.create') }}" class="btn btn-primary">
                                <i class="mdi mdi-plus"></i> Tambah Baru
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Distributor</th>
                                        <th>Kontak</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($distributors as $distributor)
                                    <tr>
                                        <td>{{ $loop->iteration + ($distributors->perPage() * ($distributors->currentPage() - 1)) }}</td>
                                        <td>{{ $distributor->nama_distributor }}</td>
                                        <td>
                                            <i class="mdi mdi-phone"></i> {{ $distributor->telepon }}<br>
                                        </td>
                                        <td>{{ Str::limit($distributor->alamat, 30) }}</td>
                                        <td>{{ $distributor->email ?? '-' }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('distributors.edit', $distributor->id) }}" 
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <form action="{{ route('distributors.destroy', $distributor->id) }}" 
                                                      method="POST">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            onclick="return confirm('Hapus distributor ini?')"
                                                            title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 pagination">
                            {{ $distributors->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection