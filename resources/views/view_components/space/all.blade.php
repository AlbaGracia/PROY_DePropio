@extends('layouts.master')

@section('title', __('labels.spaces'))
@section('subtitle', __('labels.spaces-sub'))

@section('content')
    @include('components.title-section')

    {{-- FILTROS --}}
    <div class="container">
        <div class="card shadow-sm rounded-4 bg-light border-0 col-lg-8 col-12 m-auto p-4">
            <form method="GET" action="{{ route('space.index') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control rounded-1" value="{{ request('name') }}"
                        placeholder="{{ __('labels.search-name') }}" onchange="this.form.submit()">
                </div>

                <div class="col-md-4">
                    <select name="type_id" class="form-select rounded-1" onchange="this.form.submit()">
                        <option value="" selected>{{ __('labels.space-type') }}</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 d-grid">
                    <a href="{{ route('space.index') }}" class="btn btn-deep-purple-out">
                        {{ __('labels.clear-filters') }}
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="container" style="min-height: 60vh">
        <div class="row px-lg-5 mt-4 px-0 d-flex justify-content-center">
            <div class="col-lg-11">
                @if (count($spaces) == 0)
                    <p class="text-center mt-5 pt-5">{{ __('labels.no_spaces') }}</p>
                @endif
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                    @foreach ($spaces as $space)
                        <div class="col">
                            <p class="badge bg-royal-purple text-light align-self-start">
                                {{ $space->type->name }}
                            </p>
                            <div class="card d-flex flex-column" style="min-height: 310px">
                                <img src="{{ asset($space->image_path ?? 'images/no-image.jpeg') }}"
                                    class="card-img-top p-2 h-40 object-fit-cover" alt="{{ $space->name }}">

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title zen-dots fs-4">{{ $space->name }}</h5>
                                    <p class="card-text text-clamp-2">{{ $space->description }}</p>

                                    <a href="{{ route('space.show', $space->id) }}" class="btn btn-outline-dark mt-auto">
                                        {{ __('labels.more_info') }}
                                    </a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Paginación -->
            <x-pagination :paginator="$spaces" />

        </div>
    </div>

@endsection
