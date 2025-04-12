@section('title', $event->name)


@extends('layouts.master')
@section('content')

    <main class="container ">
        <div class="row my-5">
            <div class="col-md-8 offset-md-2 ">
                <div class="card shadow">
                    <!-- Imagen del evento -->
                    <div class="like position-absolute top-0 end-0 m-4 text-royal-purple"><a href=""><i
                                class="fa-regular fa-heart fa-2xl"></i></a></div>
                    {{--  AÑADIR POP UP 'EVENTO GUARDADO, VER TUS EVENTOS GUARDADOS?' --}}
                    <img src="{{ asset('images/no-image.jpeg') }}" class="card-img-top h-60 object-fit-cover"
                        alt="{{ $event->name }}">

                    <div class="card-body mx-3">
                        <a href="{{ route('event.edit', $event->id) }}">
                            <h2 class="card-title text-center mb-4 text-royal-purple">{{ $event->name }}</h2>
                        </a>

                        <!-- Información del evento -->
                        <div class="row">
                            <div class="col-md-6 ">
                                <p class="fs-5"><b class="fs-5">Categoría:</b> {{ $event->category->name }}</p>
                                <p class="fs-5"><b class="fs-5">Espacio: </b><a href="" class="link-black fs-5">
                                        {{ $event->space->name }}</a></p>
                            </div>
                            <div class="col-md-6">
                                <p class="fs-5"><b class="fs-5">Fechas:</b>
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/y') }}
                                    @if ($event->end_date)
                                        - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/y') }}
                                    @endif
                                </p>
                                <p class="fs-5"><b class="fs-5">Precio:</b>
                                    {{ $event->price == 0 ? 'Gratuito' : $event->price . '€' }}
                                </p>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="my-4">
                            <p class="fw-bold fs-5">Descripción:</p>
                            <p class="fs-5">{{ $event->description }}</p>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('event.index') }}" class="btn btn-outline-dark">Volver a la lista</a>
                            <a href="{{ $event->web_url }}" target="blank" class="btn btn-lime-yellow">Más información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
