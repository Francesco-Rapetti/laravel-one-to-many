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

    <div class="container">
        <div class="row justify-content-center">
            <div class="card w-100 m-2 glass" style="width: 18rem;">
                <div class="card-img-top-container dash d-flex align-items-center justify-content-center">
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center">Projects
                    </h1>
                    <p class="card-text text-center">There are {{ count($projects) }} projects</p>
                </div>
                <div class="d-flex align-items-center mb-3 ps-3 justify-self-end justify-content-center">
                    <a class="btn btn-primary me-3 add-cart-btn w-100 d-flex justify-content-center align-items-center"
                        href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-list-ul fs-2"></i>
                    </a>
                    <a class="btn btn-primary me-3 add-cart-btn w-100 d-flex justify-content-center align-items-center"
                        href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus fs-2"></i>
                    </a>
                </div>
            </div>

            <div class="card w-100 m-2 glass" style="width: 18rem;">
                <div class="card-img-top-container dash d-flex align-items-center justify-content-center">
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center">Types
                    </h1>
                    <p class="card-text text-center">There are {{ count($types) }} project types</p>
                </div>
                <div class="d-flex align-items-center mb-3 ps-3 justify-self-end justify-content-center">
                    <a class="btn btn-primary me-3 add-cart-btn w-100 d-flex justify-content-center align-items-center"
                        href="{{ route('admin.types.index') }}"><i class="fa-solid fa-list-ul fs-2"></i>
                    </a>
                    <a class="btn btn-primary me-3 add-cart-btn w-100 d-flex justify-content-center align-items-center"
                        href="{{ route('admin.types.create') }}"><i class="fa-solid fa-plus fs-2"></i>
                    </a>
                </div>
            </div>


        </div>
    </div>
@endsection
