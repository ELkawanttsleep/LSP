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
                        <i class="ti-user text-muted"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-heading">Total User</div>
                            <div class="stat-text">Total: {{ $totalUsers }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary ms-3" href="{{ route('adduser.create') }}" role="button" style="min-width:120px; height:45px; display:flex; align-items:center; justify-content:center;">
        Add User
    </a>
</div>


<div class="mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    
                    <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->jabatan) }}</td>
                    <td>
                        <a href="{{ route('adduser.edit', $user->id) }}" class="btn btn-sm btn-warning">
                            <i class="ti-pencil"></i>
                        </a>
                        <form action="{{ route('adduser.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus user ini?')">
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
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection