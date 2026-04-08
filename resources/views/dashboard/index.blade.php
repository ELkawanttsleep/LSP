@extends('be.layout.master')

@section('navbar') 
    @include('be.layout.navbar')
@endsection

@section('sidebar')
    @include('be.layout.sidebar')
@endsection


@section('content')
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Your email: {{ $user->email }}</p>
    <!-- Tambahkan konten dashboard lainnya di sini -->
@endsection