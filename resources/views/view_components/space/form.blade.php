@extends('layouts.master')
@section('title', 'Editar Espacio')


@section('content')
    <main class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-5">Información del espacio</h2>
                <form action="{{ isset($space) ? route('space.update', $space->id) : route('space.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($space))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column gap-3">
                            <input type="text" class="form-control rounded-pill" name="name"
                                placeholder="Nombre del evento" value="{{ $space->name ?? '' }}" required>

                            <select class="form-select rounded-pill" name="type_id">
                                <option value="" {{ isset($space) ? '' : 'selected' }} disabled>Seleccionar tipo de espacio
                                </option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id ?? '' }}"
                                        {{ isset($space) && $type->id == $space->type_id ? 'selected' : '' }}>
                                        {{ $type->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control rounded-pill" name="web_url" id="web_url"
                                placeholder="Enlace a web" value="{{ $space->web_url ?? '' }}"
                                pattern="^(https?:\/\/)?www\.[\w\-]+\.[a-zA-Z]{2,}$"
                                title="Introduce una URL válida, por ejemplo, 'https://www.ejemplo.com'">

                            <input type="text" class="form-control rounded-pill" name="adress" id="adress"
                                placeholder="Dirección" value="{{ $space->adress ?? '' }}" required
                                pattern="^https:\/\/www\.google\.com\/maps.*"
                                title="La dirección debe ser un enlace de google maps">
                        </div>

                        <div class="col-lg-6">
                            <img src="{{ asset($space->image_path ?? 'images/no-image.jpeg') }}" alt=""
                                class="object-fit-cover h-60 w-100" id="preview-img-space">
                            <input type="file" name="image" class="form-control" id="input-file-space">
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="description" rows="3" class="form-control mt-3" placeholder="Description" required>{{ $space->description ?? '' }}</textarea>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-deep-purple-out mb-4">Editar espacio</button>
                        @if (isset($space))
                            <form action="{{ route('space.destroy', $space->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            </form>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script type="module">
        import {
            showImage
        } from '{{ asset('js/imagePreview.js') }}';
        showImage('#preview-img-space', '#input-file-space');
    </script>
@endsection
