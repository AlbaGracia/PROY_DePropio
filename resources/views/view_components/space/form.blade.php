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
                                placeholder="Nombre del evento" value="{{ $space->name ?? '' }}">

                            <select class="form-select rounded-pill" name="type_id">
                                @foreach ($types as $type)
                                    <option value="{{ $type->id ?? '' }}"
                                        {{ isset($space) && $type->id == $space->type_id ? 'selected' : '' }}>
                                        {{ $type->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control rounded-pill" name="web_url"
                                placeholder="Enlace a web" value="{{ $space->web_url ?? '' }}">

                            <input type="text" class="form-control rounded-pill" name="adress"
                                placeholder="Enlace a web" value="{{ $space->adress ?? '' }}">
                        </div>

                        <!-- Columna derecha - imagen -->
                        <div class="col-lg-6">
                            <img src="{{ asset($space->image_path ?? 'images/no-image.jpeg') }}" alt=""
                                class="object-fit-cover h-60 w-100">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="description" rows="3" class="form-control mt-3" placeholder="Description">{{ $space->description ?? '' }}</textarea>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-deep-purple-out">Editar evento</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
