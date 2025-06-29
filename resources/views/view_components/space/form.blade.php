@extends('layouts.master')
@section('title', 'Editar Espacio')


@section('content')
    <main class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-10">
                @if (isset($space) && $space->exists)
                    {{ Breadcrumbs::render('admin.space.edit', $space) }}
                @else
                    {{ Breadcrumbs::render('admin.space.create') }}
                @endif

                <h2 class="mb-5">{{ __('labels.space-info') }}</h2>
                {{-- Formulario de creación / edición --}}
                <form action="{{ isset($space) ? route('space.update', $space->id) : route('space.store') }}" method="POST"
                    enctype="multipart/form-data" id='formulario'>
                    @csrf
                    @if (isset($space))
                        @method('PUT')
                    @endif

                    <div class="row">
                        {{-- Columna izquierda --}}
                        <div class="col-lg-6 d-flex flex-column justify-content-around gap-3">

                            {{-- Nombre --}}
                            <input type="text" class="form-control rounded-pill" name="name"
                                placeholder="{{ __('labels.space-name') }}" value="{{ $space->name ?? '' }}" required>

                            {{-- Tipo de espacio --}}
                            <select class="form-select rounded-pill" name="type_id" required>
                                <option value="" {{ isset($space) ? '' : 'selected' }} disabled>
                                    {{ __('labels.space-type') }}</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ isset($space) && $type->id == $space->type_id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Enlace a la web --}}
                            <input type="text" class="form-control rounded-pill" name="web_url" id="web_url"
                                placeholder="{{ __('labels.web-url') }}" value="{{ $space->web_url ?? '' }}">

                            {{-- Dirección (Google Maps) --}}
                            <input type="text" class="form-control rounded-pill" name="address" id="address"
                                placeholder="{{ __('labels.address') }}" value="{{ $space->address ?? '' }}" required>


                            {{-- Admins de los espacios --}}
                            @if (auth()->user()->hasRole('admin'))
                                <select class="form-select rounded-pill" name="user_id">
                                    <option value="" disabled
                                        {{ isset($space) && !$space->user_id ? 'selected' : '' }}>
                                        {{ __('labels.select-space-manager') }}</option>
                                    @foreach ($adminUsers as $user)
                                        <option value="{{ $user->id }}"
                                            {{ isset($space) && $space->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        {{-- Columna derecha - Imagen --}}
                        <div class="col-lg-6">
                            <img src="{{ asset($space->image_path ?? 'images/no-image.jpeg') }}" alt="Imagen del espacio"
                                class="object-fit-cover h-60 w-100 mb-3" id="preview-img-space" style="height: 280px">
                            {{-- Imagen --}}
                            <input type="file" name="image" class="form-control" id="input-file-space">
                        </div>
                    </div>

                    {{-- Descripción --}}
                    <div class="row mt-3">
                        <div class="col-12">
                            <textarea name="description" rows="3" class="form-control" placeholder="{{ __('labels.description') }}" required>{{ $space->description ?? '' }}</textarea>
                        </div>
                    </div>

                    {{-- Botón de enviar --}}
                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-deep-purple-out w-100">
                                {{ isset($space) ? __('labels.edit-space') : __('labels.create-space') }}
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Botón de eliminar --}}
                @if (isset($space))
                    <div class="row mt-4">
                        <div class="col-12">
                            <form action="{{ route('space.destroy', $space->id) }}" method="POST">
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
                        <a href="{{ route('space.list') }}" class="btn btn-outline-dark col-12">
                            <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-list') }}
                        </a>
                        <div>
                        </div>
                    </div>
                </div>
    </main>
    <script type="module">
        import {
            showImage
        } from '{{ asset('js/imagePreview.js') }}';
        showImage('#preview-img-space', '#input-file-space');
        document.addEventListener('DOMContentLoaded', () => {

            const form = document.getElementById('formulario');
            form.addEventListener('submit', (e) => {
                const inputWeb = document.getElementById('web_url');
                const inputAddress = document.getElementById('address');
                const webUrl = inputWeb.value.trim();
                const addressUrl = inputAddress.value.trim();

                const urlRegx = /^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/\S*)?$/;
                const addressRegex =
                    /^(https:\/\/maps\.app\.goo\.gl\/[\w\d]+|https?:\/\/[\w\-\.]+\.\w{2,}(\/\S*)?)$/;

                let isValid = true;
                if (webUrl && !urlRegx.test(webUrl)) {
                    isValid = false;
                    inputWeb.classList.add('is-invalid');
                } else {
                    inputWeb.classList.remove('is-invalid');
                }

                if (addressUrl && !addressRegex.test(addressUrl)) {
                    isValid = false;
                    inputAddress.classList.add('is-invalid');
                } else {
                    inputAddress.classList.remove('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();
                }
            })
        })
    </script>
@endsection
