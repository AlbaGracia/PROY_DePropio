@extends('layouts.master')

@section('title', 'Listado de Tipos')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.types') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="col-lg-7 col-12">
                    <form action="{{ route('type.index') }}" method="GET">
                        <div class="input-group">
                            <button class="btn btn-outline-dark" type="submit">{{ __('labels.search') }}</button>
                            <input type="text" class="form-control" placeholder='{{ __('labels.type-search') }}'
                                name="search" value="{{ request('search') }}" style="border-radius: 0 20px 20px 0">
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <a href="{{ route('type.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i> {{ __('labels.create-type') }}
                </a>
                <a href="{{ route('admin.panel') }}" class="btn btn-outline-dark">
                    <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-panel') }}
                </a>
            </div>
        </div>

        <div class="table-responsive col-lg-8">
            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('labels.id') }}</th>
                        <th>{{ __('labels.type') }}</th>
                        <th class="text-center">{{ __('labels.edit') }}</th>
                        <th class="text-center">{{ __('labels.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>


                            <!-- Columna Editar -->
                            <td class="text-center">
                                <a href="{{ route('type.edit', $type->id) }}"
                                    class="text-primary text-decoration-none">{{ __('labels.edit') }}</a>
                            </td>

                            <!-- Columna Eliminar -->
                            <td class="text-center">
                                <button type="button" class="btn btn-link text-danger p-0 m-0" x-data
                                    x-on:click.prevent="$dispatch('open-modal', 'delete-type-{{ $type->id }}')">
                                    {{ __('labels.delete') }}
                                </button>

                                <!-- Modal de confirmación -->
                                <x-confirm-delete :action="route('type.destroy', $type->id)" id="delete-type-{{ $type->id }}"
                                    title="{{ __('labels.delete-type') }}"
                                    message="{!! __('labels.delete-type-sub', ['name' => $type->name]) !!} {{ __('labels.no-option') }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <x-pagination :paginator="$types" />

    </div>
@endsection
