@extends('layouts.master')

@section('title', __('labels.admin-panel'))

@section('content')
    <div class="container mt-5 p-5">
        <h1 class="mb-5 text-center text-royal-purple">{{ __('labels.admin-panel') }}</h1>

        <div class="row g-4 justify-content-center">
            <!-- Botón Espacios -->
            <div class="col-lg-4">
                <a href="{{ route('space.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
                        <i class="fa-solid fa-building-columns fa-3x mb-3 text-lime-yellow"></i>
                        <h5 class="text-dark">{{ __('labels.spaces') }}</h5>
                    </div>
                </a>
            </div>

            <!-- Botón Eventos -->
            <div class="col-lg-4">
                <a href="{{ route('event.list') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
                        <i class="fa-solid fa-calendar-days fa-3x mb-3 text-lime-yellow"></i>
                        <h5 class="text-dark">{{ __('labels.events') }}</h5>
                    </div>
                </a>
            </div>

            <!-- Botón Comentarios -->
            <div class="col-lg-4">
                <a href="{{ route('comment.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
                        <i class="fa-solid fa-comments fa-3x mb-3 text-lime-yellow"></i>
                        <h5 class="text-dark">{{ __('labels.comments') }}</h5>
                    </div>
                </a>
            </div>
            @role('admin')
                <!-- Botón Usuarios -->
                <div class="col-lg-4">
                    <a href="{{ route('user.index') }}" class="text-decoration-none">
                        <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
                            <i class="fa-solid fa-users fa-3x mb-3 text-lime-yellow"></i>
                            <h5 class="text-dark">{{ __('labels.users') }}</h5>
                        </div>
                    </a>
                </div>

                <!-- Botón Categorías -->
                <div class="col-lg-4">
                    <a href="{{ route('category.index') }}" class="text-decoration-none">
                        <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
                            <i class="fa-solid fa-tags fa-3x mb-3 text-lime-yellow"></i>
                            <h5 class="text-dark">{{ __('labels.categories') }}</h5>
                        </div>
                    </a>
                </div>

                <!-- Botón Tipos -->
                <div class="col-lg-4">
                    <a href="{{ route('type.index') }}" class="text-decoration-none">
                        <div class="card shadow-sm text-center p-4 h-100 hover-shadow">
                            <i class="fa-solid fa-layer-group fa-3x mb-3 text-lime-yellow"></i>
                            <h5 class="text-dark">{{ __('labels.types') }}</h5>
                        </div>
                    </a>
                </div>
            @endrole
        </div>
    </div>
@endsection
