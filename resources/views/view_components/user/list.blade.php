@extends('layouts.master')

@section('title', 'Listado de Usuarios')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.users') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-4">
                <div class="card shadow-sm rounded-4 bg-light border-0 col-lg-8 col-12 m-auto p-4">
                    <form action="{{ route('user.index') }}" method="GET" class="row g-3 align-items-end">
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-1" placeholder="{{ __('labels.user-search') }}"
                                name="search" value="{{ request('search') }}" onchange="this.form.submit()">
                        </div>

                        <div class="col-md-4">
                            <select name="type_user" id="type_user" class="form-select rounded-1"
                                onchange="this.form.submit()">
                                <option value="" {{ request('type_user') ? '' : 'selected' }} disabled>
                                    {{ __('labels.type-user') }}
                                </option>
                                <option value="user" {{ request('type_user') == 'user' ? 'selected' : '' }}>
                                    user
                                </option>
                                <option value="admin_space" {{ request('type_user') == 'admin_space' ? 'selected' : '' }}>
                                    admin_space
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 d-grid">
                            <a href="{{ route('user.index') }}" class="btn btn-deep-purple-out">
                                {{ __('labels.clear-filters') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <a href="{{ route('user.create') }}" class="btn btn-dark">
                    <i class="fa-solid fa-plus me-1"></i> {{ __('labels.create-user') }}
                </a>
                <a href="{{ route('admin.panel') }}" class="btn btn-outline-dark">
                    <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-panel') }}
                </a>
            </div>
        </div>



        <div class="table-responsive col-lg-8 col-11">
            <table class="table align-middle px-5 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('labels.user') }}</th>
                        <th>{{ __('labels.email') }}</th>
                        <th>{{ __('labels.type-user') }}</th>
                        <th>{{ __('labels.spaces-related') }}</th>
                        <th class="text-center">{{ __('labels.edit') }}</th>
                        <th class="text-center">{{ __('labels.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($users as $user)
                        @if ($user->type_user != 'admin' && !$user->hasRole('admin'))
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type_user }}</td>
                                <td>
                                    @if ($user->spaces->isNotEmpty())
                                        <ul>
                                            @foreach ($user->spaces as $space)
                                                <li>{{ $space->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </td>

                                <!-- Columna Editar -->
                                <td class="text-center">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="text-primary text-decoration-none">{{ __('labels.edit') }}</a>
                                </td>

                                <!-- Columna Eliminar -->
                                <td class="text-center">
                                    <button type="button" class="btn btn-link text-danger p-0 m-0" x-data
                                        x-on:click.prevent="$dispatch('open-modal', 'delete-user-{{ $user->id }}')">
                                        {{ __('labels.delete') }}
                                    </button>

                                    <!-- Modal de confirmación -->
                                    <x-confirm-delete :action="route('user.destroy', $user->id)" id="delete-user-{{ $user->id }}"
                                        title="¿Eliminar usuario?"
                                        message="¿Estás seguro de que quieres eliminar el usuario '{{ $user->name }}'? Esta acción no se puede deshacer." />
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginación -->
        <x-pagination :paginator="$users" />

    </div>
@endsection
