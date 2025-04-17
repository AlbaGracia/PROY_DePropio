@extends('layouts.master')
@section('title', 'Editar Evento')

@section('content')
    <main class="container">
        <div class="row mt-5">
            <div class="col-lg-8 offset-lg-2 ">
                <h2 class="mb-5">Información del evento</h2>
                <form action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}" method="POST">
                    @csrf
                    @if (isset($event))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column gap-3">
                            <input type="text" class="form-control rounded-pill" name="name"
                                placeholder="Nombre del evento" value="{{ $event->name ?? '' }}">

                            <select class="form-select rounded-pill" name="space_id">
                                @foreach ($spaces as $space)
                                    <option value="{{ $space->id ?? '' }}"
                                        {{ isset($event) && $space->id == $event->space_id ? 'selected' : '' }}>
                                        {{ $space->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>

                            <select class="form-select rounded-pill" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id ?? '' }}"
                                        {{ isset($event) && $category->id == $event->category_id ? 'selected' : '' }}>
                                        {{ $category->name ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="date" name="start_date" class="form-control rounded-pill"
                                value="{{ $event->start_date ?? '' }}">
                            <input type="date" name="end_date" class="form-control rounded-pill"
                                value="{{ $event->end_date ?? '' }}">
                            <input type="number" class="form-control rounded-pill" name="price" step="0.01"
                                placeholder="Precio" value="{{ $event->price ?? '' }}">
                            <input type="text" class="form-control rounded-pill" name="web_url"
                                placeholder="Enlace a web" value="{{ $event->web_url ?? '' }}">
                        </div>

                        <!-- Columna derecha - imagen -->
                        <div class="col-lg-6">
                            <img src="{{ asset($event->image_path ?? 'images/no-image.jpeg') }}" alt=""
                                style="height: 380px" class="object-fit-cover">
                        </div>
                    </div>
                    <div class="row">
                        <textarea name="description" rows="3" class="form-control mt-3" placeholder="Description">{{ $event->description ?? '' }}</textarea>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-deep-purple-out">Editar evento</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
