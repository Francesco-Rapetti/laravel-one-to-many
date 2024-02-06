@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5">
        @include('partials.library')
    </div>

    <a id="add-project" class="glass border-0 text-black btn btn-primary d-flex align-items-center justify-content-center"
        href="{{ route('admin.projects.create') }}">
        <i class="fa-solid fa-plus fs-3"></i>
    </a>
@endsection
