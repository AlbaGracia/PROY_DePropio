@php

    if (isset($thisWeek)) {
        $subtitle = __('labels.thisWeek-sub') . ' ' . $mon->format('d/m') . ' | ' . $sun->format('d/m');
    } elseif (isset($eventsInSpace)) {
        $subtitle = __('labels.eventsInSpace-sub') . '' . $space->name;
    } else {
        $subtitle = __('labels.events-sub');
    }
@endphp

@section('title', __('labels.events'))
@section('subtitle', $subtitle)

@extends('layouts.master')
@section('content')
    @include('components.title-section')

    <div class="container" style="min-height: 60vh">
        <div class="row px-lg-5 mt-4 px-0 d-flex justify-content-center">
            <!-- Filtros laterales -->
            <aside class="col-lg-3 mb-4">
                <div class="border rounded-4 shadow-sm p-4 bg-white">
                    <form method="GET" action="{{ route('event.index') }}" class="d-flex gap-2 align-items-center flex-wrap">
                        @foreach (request()->except('sort') as $key => $value)
                            @if (is_array($value))
                                @foreach ($value as $v)
                                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                @endforeach
                            @else
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach

                        <label for="sort" class="fw-semibold mb-0 me-2">{{ __('labels.order_by') }}:</label>
                        <select name="sort" id="sort" class="form-select rounded-3" onchange="this.form.submit()">
                            <option value="date_asc" {{ request('sort') === 'date_asc' ? 'selected' : '' }}>
                                {{ __('labels.date_asc') }}
                            </option>
                            <option value="date_desc" {{ request('sort') === 'date_desc' ? 'selected' : '' }}>
                                {{ __('labels.date_desc') }}
                            </option>
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                                {{ __('labels.price_asc') }}
                            </option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                                {{ __('labels.price_desc') }}
                            </option>
                        </select>
                    </form>
                    <form method="GET" action="{{ route('event.index') }}">
                        <h5 class="fw-bold my-3">{{ __('labels.filters') }}</h5>

                        <!-- Keywords -->
                        <div class="mb-3">
                            <input type="text" name="keywords" class="form-control rounded-3"
                                placeholder="{{ __('labels.search-name') }}" value="{{ request('keywords') }}">
                        </div>

                        <!-- Categorías -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('labels.category') }}</label>
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]"
                                        value="{{ $category->id }}"
                                        {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Precio -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold">{{ __('labels.price_range') }} (€)</label>
                            <div class="d-flex gap-2">
                                <input type="number" class="form-control" name="price_min" placeholder="min"
                                    value="{{ request('price_min') }}">
                                <input type="number" class="form-control" name="price_max" placeholder="max"
                                    value="{{ request('price_max') }}">
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-dark rounded-3">{{ __('labels.filter') }}</button>
                        </div>
                    </form>
                    <form method="GET" action="{{ route('event.index') }}" class="mt-3">
                        <button type="submit" class="btn btn-deep-purple-out rounded-3 w-100">
                            {{ __('labels.clear-filters') }}
                        </button>
                    </form>
                </div>
            </aside>


            <!-- Tarjetas -->
            <section class="col-lg-9">
                @if (count($events) == 0)
                    <p class="text-center mt-5 pt-5">{{ __('labels.no_events') }}</p>
                @endif
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                    @foreach ($events as $event)
                        @php
                            $today = \Carbon\Carbon::today();
                            $eventEnded = $event->end_date
                                ? \Carbon\Carbon::parse($event->end_date)->lt($today)
                                : \Carbon\Carbon::parse($event->start_date)->lt($today);
                        @endphp
                        <div class="col">
                            <div
                                class="card shadow-sm h-100 d-flex flex-column {{ $eventEnded ? 'border border-danger' : '' }}">
                                <a href="{{ route('event.show', $event->id) }}"
                                    class="card-event-link d-flex flex-column h-100 text-decoration-none text-dark">
                                    <img src="{{ asset($event->image_path ?? 'images/no-image.jpeg') }}"
                                        class="card-img-top h-40 object-fit-cover" alt="{{ $event->name }}">
                                    <div class="overlay position-absolute top-0 start-0 w-100 h-40"></div>

                                    <div class="card-body d-flex align-items-center">
                                        <h3 class="fs-5 fw-bold text-clamp-2">{{ $event->name }}</h3>
                                    </div>

                                    <ul class="list-group list-group-flush mt-auto ">
                                        <li class="list-group-item">
                                            @if ($eventEnded)
                                                <p class="badge bg-danger text-white align-self-start">
                                                    {{ __('labels.past-event') }}</p>
                                            @endif
                                            <p class="badge bg-lime-yellow text-dark align-self-start">
                                                {{ $event->category->name }}</p>
                                        </li>
                                        <li class="list-group-item"><b>{{ $event->space->name }}</b></li>
                                        <li class="list-group-item">
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/y') }}
                                            {{ $event->end_date != null ? ' - ' . Carbon\Carbon::parse($event->end_date)->format('d/m/y') : '' }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ $event->price == 0 ? __('labels.free') : $event->price . '€' }}
                                        </li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
            <!-- Paginación -->
            <div class="mt-5 col-5">
                {{ $events->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
