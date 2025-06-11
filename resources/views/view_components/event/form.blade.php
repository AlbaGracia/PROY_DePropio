@extends('layouts.master')
@section('title', 'Editar Evento')

@section('content')
    <main class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2">

                @if (isset($event) && $event->exists)
                    {{ Breadcrumbs::render('admin.event.edit', $event) }}
                @else
                    {{ Breadcrumbs::render('admin.event.create') }}
                @endif

                <h2 class="mb-5">{{ __('labels.event-info') }}</h2>

                {{-- Formulario de creación / edición --}}
                <form action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}" method="POST"
                    enctype="multipart/form-data" id="form-edit-create">
                    @csrf
                    @if (isset($event))
                        @method('PUT')
                    @endif

                    <div class="row">
                        {{-- Columna izquierda --}}
                        <div class="col-lg-6 d-flex flex-column gap-3">

                            {{-- Nombre --}}
                            <input type="text" class="form-control rounded-pill" name="name"
                                placeholder="{{ __('labels.event-name') }}" value="{{ $event->name ?? '' }}" required>

                            {{-- Espacio --}}
                            <select class="form-select rounded-pill" name="space_id" required>
                                <option value="" {{ isset($event) ? '' : 'selected' }} disabled>
                                    {{ __('labels.space-select') }}
                                </option>
                                @foreach ($spaces as $space)
                                    <option value="{{ $space->id }}"
                                        {{ isset($event) && $space->id == $event->space_id ? 'selected' : '' }}>
                                        {{ $space->name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Categoría --}}
                            <select class="form-select rounded-pill" name="category_id" required>
                                <option value="" {{ isset($event) ? '' : 'selected' }} disabled>
                                    {{ __('labels.category-select') }}
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($event) && $category->id == $event->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Fechas --}}
                            <input type="date" name="start_date" id="start_date" class="form-control rounded-pill"
                                value="{{ $event->start_date ?? '' }}" required>

                            <input type="date" name="end_date" id="end_date" class="form-control rounded-pill"
                                value="{{ $event->end_date ?? '' }}">

                            {{-- Precio --}}
                            <input type="number" name="price" class="form-control rounded-pill" step="0.01"
                                placeholder="{{ __('labels.price') }}" value="{{ $event->price ?? '' }}">

                            {{-- Enlace --}}
                            <input type="text" name="web_url" class="form-control rounded-pill"
                                placeholder="{{ __('labels.web-url') }}" value="{{ $event->web_url ?? '' }}">

                        </div>

                        {{-- Columna derecha - Imagen --}}
                        <div class="col-lg-6">
                            <img src="{{ asset($event->image_path ?? 'images/no-image.jpeg') }}" alt="Imagen del evento"
                                style="height: 380px" class="object-fit-cover w-100 mb-3" id="preview-img-event">

                            <input type="file" name="image" class="form-control" id="input-file-event">
                        </div>
                    </div>

                    {{-- Descripción --}}
                    <div class="row mt-3">
                        <div class="col-12">
                            <textarea name="description" rows="3" class="form-control" placeholder="{{ __('labels.description') }}" required>{{ $event->description ?? '' }}</textarea>
                        </div>
                    </div>

                    {{-- Botón de enviar --}}
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-deep-purple-out w-100">
                                {{ isset($event) ? __('labels.edit-event') : __('labels.create-event') }}
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Botón de eliminar --}}
                @if (isset($event))
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-outline-danger w-100">{{ __('labels.delete') }}</button>
                            </form>
                        </div>
                    </div>
                @endif
                {{-- Volver al listado --}}
                <div class="row mt-4">
                    <div class="col-12">
                        <a href="{{ route('event.list') }}" class="btn btn-outline-dark col-12">
                            <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="module">
        import {
            showImage
        } from '{{ asset('js/imagePreview.js') }}';
        showImage('#preview-img-event', '#input-file-event');


        const start_date = document.querySelector('#start_date');
        const end_date = document.querySelector('#end_date');
        const form = document.querySelector('#form-edit-create');

        form.addEventListener('submit', (e) => {
            const start = start_date.value;
            const end = end_date.value;

            if (end && end < start) {
                e.preventDefault();
                end_date.classList.add('is-invalid');
            } else {
                end_date.classList.remove('is-invalid');
            }
        })
    </script>
@endsection
