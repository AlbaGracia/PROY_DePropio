@extends('layouts.master')

@section('title', 'Listado de Espacios')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.spaces') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="col-lg-7 col-12">
                    <form action="{{ route('space.list') }}" method="GET">
                        <div class="input-group">
                            <button class="btn btn-outline-dark" type="submit">{{ __('labels.search') }}</button>
                            <input type="text" class="form-control" placeholder="{{ __('labels.search-name') }}"
                                name="search" value="{{ request('search') }}" style="border-radius: 0 20px 20px 0">
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <a href="{{ route('space.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i> {{ __('labels.create-space') }}
                </a>
                <a href="{{ route('admin.panel') }}" class="btn btn-outline-dark">
                    <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-panel') }}
                </a>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table align-middle px-5 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('labels.image') }}</th>
                        <th>{{ __('labels.space-name') }}</th>
                        <th>{{ __('labels.description') }}</th>
                        <th>{{ __('labels.address') }}</th>
                        <th>{{ __('labels.web-url') }}</th>
                        <th>{{ __('labels.type') }}</th>
                        <th class="text-center">{{ __('labels.edit') }}</th>
                        <th class="text-center">{{ __('labels.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($spaces as $space)
                        <tr>
                            <td>
                                @if ($space->image_path)
                                    <img src="{{ asset($space->image_path) }}" alt="Imagen" width="100">
                                @else
                                    {{ __('labels.no-image') }}
                                @endif
                            </td>
                            <td>{{ $space->name }}</td>
                            <td>{{ Str::limit($space->description, 50) }}</td>
                            <td><a href="{{ $space->address }}"
                                    class="btn btn-link text-dark">{{ __('labels.address') }}</a></td>
                            <td><a href="{{ $space->web_url }}"
                                    class="btn btn-link text-dark">{{ __('labels.web-url') }}</a>
                            </td>
                            <td>{{ $space->type->name }}</td>

                            <!-- Columna Editar -->
                            <td class="text-center">
                                <a href="{{ route('space.edit', $space->id) }}"
                                    class="text-primary text-decoration-none">{{ __('labels.edit') }}</a>
                            </td>

                            <!-- Columna Eliminar -->
                            <td class="text-center">
                                <button type="button" class="btn btn-link text-danger p-0 m-0" x-data
                                    x-on:click.prevent="$dispatch('open-modal', 'delete-space-{{ $space->id }}')">
                                    {{ __('labels.delete') }}
                                </button>

                                <!-- Modal de confirmación -->
                                <x-confirm-delete :action="route('space.destroy', $space->id)" id="delete-space-{{ $space->id }}"
                                    title="¿Eliminar espacio?"
                                    message="¿Estás seguro de que quieres eliminar el espacio '{{ $space->name }}'? Esta acción no se puede deshacer." />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <x-pagination :paginator="$spaces" />

    </div>
@endsection
