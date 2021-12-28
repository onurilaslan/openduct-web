@extends('layouts.app-master')

@section('content')
@auth
<h1>Welcome, {{ auth()->user()->name }}</h1>
@endauth
@endsection
