    @extends('layouts.master')

    @section('title', isset($user) ? 'Editar Usuario' : 'Crear nuevo usuario')

    @section('content')
        <div class="container mt-5 d-flex flex-column align-items-center">
            <h1 class="mb-4 text-center text-royal-purple">
                {{ isset($user) ? __('labels.edit-user') : __('labels.create-user') }}
            </h1>

            <div class="col-6">
                @if (isset($user) && $user->exists)
                    {{ Breadcrumbs::render('admin.user.edit', $user) }}
                @else
                    {{ Breadcrumbs::render('admin.user.create') }}
                @endif
                <div class="container mb-4">
                    <!-- Formulario para crear o editar -->
                    <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="userName" class="form-label">{{ __('labels.user-name') }}</label>
                            <input type="text" class="form-control" id="userName" name="name" required
                                placeholder="{{ __('labels.enter-user-name') }}"
                                value="{{ isset($user) ? $user->name : old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label">{{ __('labels.email') }}</label>
                            <input type="email" class="form-control" id="userEmail" name="email" required
                                placeholder="{{ __('labels.enter-email') }}"
                                value="{{ isset($user) ? $user->email : old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="userType" class="form-label">{{ __('labels.type-user') }}</label>
                            <select class="form-control" id="userType" name="type_user" required>
                                <option value="user" {{ isset($user) && $user->type_user == 'user' ? 'selected' : '' }}>
                                    user
                                </option>
                                <option value="admin_space"
                                    {{ isset($user) && $user->type_user == 'admin_space' ? 'selected' : '' }}>
                                    admin_space
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-dark">
                            <i class="fa-solid fa-plus me-1"></i>
                            {{ isset($user) ? __('labels.update-user') : __('labels.create-user') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
