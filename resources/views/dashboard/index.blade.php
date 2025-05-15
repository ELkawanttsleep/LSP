@extends('be.layout.master')

@section('sidebar')
    <!-- Sidebar berdasarkan role -->
    @if(auth()->user()->role === 'admin')
        @include('partials.admin-sidebar')
    @elseif(auth()->user()->role === 'apoteker')
        @include('partials.apoteker-sidebar')
    @elseif(auth()->user()->role === 'karyawan')
        @include('partials.karyawan-sidebar')
    @elseif(auth()->user()->role === 'kasir')
        @include('partials.kasir-sidebar')
    @elseif(auth()->user()->role === 'pemilik')
        @include('partials.pemilik-sidebar')
    @endif
@endsection


@section('navbar') 
    @include('be.layout.navbar')
@endsection

@section('content')
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Your email: {{ $user->email }}</p>
    <!-- Tambahkan konten dashboard lainnya di sini -->
@endsection