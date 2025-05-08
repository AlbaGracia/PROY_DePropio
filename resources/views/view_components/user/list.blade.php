@extends('layouts.master')

@section('title', 'Listado de Usuarios')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.users') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="col-lg-7 col-12">
                    <form action="{{ route('user.index') }}" method="GET">
                        <div class="input-group">
                            <button class="btn btn-outline-dark" type="submit">{{ __('labels.search') }}</button>
                            <input type="text" class="form-control" placeholder={{ __('labels.search') }} name="search"
                                value="{{ request('search') }}" style="border-radius: 0 20px 20px 0">
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



        <div class="table-responsive col-lg-8">
            <table class="table align-middle px-5 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('labels.user') }}</th>
                        <th>{{ __('labels.email') }}</th>
                        <th>{{ __('labels.type-user') }}</th>
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

                                <!-- Columna Editar -->
                                <td class="text-center">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="text-primary text-decoration-none">{{ __('labels.edit') }}</a>
                                </td>

                                <!-- Columna Eliminar -->
                                <td class="text-center">
                                    <button type="button" class="btn btn-link text-danger p-0 m-0" x-data
                                        x-on:click.prevent="$dispatch('open-modal', 'delete-type-{{ $user->id }}')">
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
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
