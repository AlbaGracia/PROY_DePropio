@extends('layouts.master')

@section('title', isset($category) ? 'Editar Categoría' : 'Crear Nueva Categoría')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">
            {{ isset($category) ? __('labels.edit-category') : __('labels.create-category') }}
        </h1>

        <div class="col-6">
            @if (isset($category) && $category->exists)
                {{ Breadcrumbs::render('admin.category.edit', $category) }}
            @else
                {{ Breadcrumbs::render('admin.category.create') }}
            @endif
            <div class="container mb-4">
                <!-- Formulario para crear o editar -->
                <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($category))
                        @method('PUT') <!-- Si estamos editando, usamos PUT para el método HTTP -->
                    @endif

                    <div class="mb-3">
                        <label for="categoryName" class="form-label">{{ __('labels.category-name') }}</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required
                            placeholder="{{ __('labels.enter-category-name') }}"
                            value="{{ isset($category) ? $category->name : old('name') }}">
                    </div>

                    <button type="submit" class="btn btn-dark">
                        <i class="fa-solid fa-plus me-1"></i>
                        {{ isset($category) ? __('labels.update-category') : __('labels.create-category') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
