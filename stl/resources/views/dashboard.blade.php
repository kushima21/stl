@extends('layout.default')

@section('content')
    <h2>Hello, {{ session('username') }}</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
