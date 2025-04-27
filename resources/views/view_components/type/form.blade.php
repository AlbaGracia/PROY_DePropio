@extends('layouts.master')

@section('title', isset($type) ? 'Editar Tipo' : 'Crear nuevo tipo')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">
            {{ isset($type) ? __('labels.edit-type') : __('labels.create-type') }}
        </h1>

        <div class="col-6">
            @if (isset($type) && $type->exists)
                {{ Breadcrumbs::render('admin.type.edit', $type) }}
            @else
                {{ Breadcrumbs::render('admin.type.create') }}
            @endif
            <div class="container mb-4">
                <!-- Formulario para crear o editar -->
                <form action="{{ isset($type) ? route('type.update', $type->id) : route('type.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($type))
                        @method('PUT') <!-- Si estamos editando, usamos PUT para el método HTTP -->
                    @endif

                    <div class="mb-3">
                        <label for="typeName" class="form-label">{{ __('labels.type-name') }}</label>
                        <input type="text" class="form-control" id="typeName" name="name" required
                            placeholder="{{ __('labels.enter-type-name') }}"
                            value="{{ isset($type) ? $type->name : old('name') }}">
                    </div>

                    <button type="submit" class="btn btn-dark">
                        <i class="fa-solid fa-plus me-1"></i>
                        {{ isset($type) ? __('labels.update-type') : __('labels.create-type') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
