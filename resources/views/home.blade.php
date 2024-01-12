@extends('layouts.template')

@section('content')
    <div class="jumbotron py-4 px-5">
        @if (session('AlreadyAccessed'))
            <div class="alert alert-danger">{{ session('AlreadyAccessed') }}</div>
        @endif
        <h1 class="display-4">
            Welcome!
        </h1>
        <hr class="my-4">
    </div>

@endsection
