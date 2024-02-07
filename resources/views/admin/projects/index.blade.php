@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center">My projects</h1>
    </div>

    <div class="my-5">
        @include('partials.library')
    </div>

    <a id="add-project" class="glass border-0 text-black btn btn-primary d-flex align-items-center justify-content-center"
        href="{{ route('admin.projects.create') }}">
        <i class="fa-solid fa-plus fs-3"></i>
    </a>
@endsection
