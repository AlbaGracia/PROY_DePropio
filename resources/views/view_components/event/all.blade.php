@section('title', __('labels.events'))
@section('subtitle', __('labels.events-sub'))


@extends('layouts.master')
@section('content')
    @include('components.title-section')

    <div class="container">
        <div class="row px-lg-5 mt-4 px-0 d-flex justify-content-center">

            <!-- Filtros -->
            {{-- <aside class="col-md-3 mb-4">
                <div class="p-3 border rounded shadow-sm bg-light">
                    <h5 class="mb-3 fw-bold">Filtros</h5>
                </div>
            </aside> --}}

            <!-- Tarjetas -->
            <section class="col-lg-11">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                    @foreach ($events as $event)
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href="{{ route('event.show', $event->id) }}" class="card-event-link">
                                    <img src="{{ asset($event->image_path ?? 'images/no-image.jpeg') }}"
                                        class="card-img-top h-40 object-fit-cover" alt="...">
                                    <div class="overlay position-absolute top-0 start-0 w-100 h-40"></div>
                                    <div class="card-body">
                                        <h3 class="fs-5 fw-bold">{{ $event->name }}</h3>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{ $event->category->name }}</li>
                                        <li class="list-group-item">{{ $event->space->name }}</li>
                                        <li class="list-group-item">
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/y') }}
                                            {{ $event->end_date != null ? ' - ' . Carbon\Carbon::parse($event->finish)->format('d/m/y') : '' }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ $event->price == 0 ? 'Gratuito' : $event->price . '€' }}</li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- Paginación -->
            <div class="mt-3 col-5">
                {{ $events->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
