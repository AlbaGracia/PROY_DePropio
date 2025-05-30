@extends('layouts.master')

@section('title', 'Listado de Eventos')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.events') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="card shadow-sm rounded-4 bg-light border-0 col-lg-8 col-12 m-auto p-4">
                    <form action="{{ route('event.list') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <input type="text" class="form-control rounded-1"
                                placeholder="{{ __('labels.event-search') }}" name="search" value="{{ request('search') }}"
                                onchange="this.form.submit()">
                        </div>

                        <div class="col-md-4">
                            <select name="status" id="status" class="form-select rounded-1"
                                onchange="this.form.submit()">
                                <option value="" {{ request('status') === null ? 'selected' : '' }}>
                                    {{ __('labels.all-events') }}
                                </option>
                                <option value="current" {{ request('status') === 'current' ? 'selected' : '' }}>
                                    {{ __('labels.current-events') }}
                                </option>
                                <option value="past" {{ request('status') === 'past' ? 'selected' : '' }}>
                                    {{ __('labels.past-events') }}
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4 d-grid">
                            <a href="{{ route('event.list') }}" class="btn btn-deep-purple-out">
                                {{ __('labels.clear-filters') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-center align-items-center gap-2 my-4">
                <a href="{{ route('event.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i> {{ __('labels.create-event') }}
                </a>
                <a href="{{ route('admin.panel') }}" class="btn btn-outline-dark">
                    <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-panel') }}
                </a>
                <a href="{{ route('event.deletePast') }}" class="btn btn-outline-danger">
                    <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.clear-past-events') }}
                </a>
            </div>

        </div>



        <div class="table-responsive">
            <table class="table align-middle px-5 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('labels.image') }}</th>
                        <th>{{ __('labels.event-name') }}</th>
                        <th>{{ __('labels.description') }}</th>
                        <th>{{ __('labels.start-date') }}</th>
                        <th>{{ __('labels.end-date') }}</th>
                        <th>{{ __('labels.price') }}</th>
                        <th>{{ __('labels.web-url') }}</th>
                        <th>{{ __('labels.space') }}</th>
                        <th>{{ __('labels.category') }}</th>
                        <th class="text-center">{{ __('labels.edit') }}</th>
                        <th class="text-center">{{ __('labels.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($events as $event)
                        <tr>
                            <td>
                                @if ($event->image_path)
                                    <img src="{{ asset($event->image_path) }}" alt="Imagen" width="100">
                                @else
                                    {{ __('labels.no-image') }}
                                @endif
                            </td>
                            <td>{{ $event->name }}</td>
                            <td>{{ Str::limit($event->description, 50) }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d/m/y') }}</td>
                            <td>{{ $event->price }}€</td>
                            <td><a href="{{ $event->web_url }}"
                                    class="btn btn-link text-dark">{{ __('labels.web-url') }}</a>
                            </td>
                            <td>{{ $event->space->name }}</td>
                            <td>{{ $event->category->name }}</td>

                            <!-- Columna Editar -->
                            <td class="text-center">
                                <a href="{{ route('event.edit', $event->id) }}"
                                    class="text-primary text-decoration-none">{{ __('labels.edit') }}</a>
                            </td>

                            <!-- Columna Eliminar -->
                            <td class="text-center">
                                <button type="button" class="btn btn-link text-danger p-0 m-0" x-data
                                    x-on:click.prevent="$dispatch('open-modal', 'delete-event-{{ $event->id }}')">
                                    {{ __('labels.delete') }}
                                </button>

                                <!-- Modal de confirmación -->
                                <x-confirm-delete :action="route('event.destroy', $event->id)" id="delete-event-{{ $event->id }}"
                                    title="{{ __('labels.delete-event') }}"
                                    message="{!! __('labels.delete-event-sub', ['name' => $event->name]) !!} {{ __('labels.no-option') }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <x-pagination :paginator="$events" />

    </div>
@endsection
