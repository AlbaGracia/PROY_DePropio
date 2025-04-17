@section('title', __('labels.spaces'))
@section('subtitle', __('labels.events-sub'))


@extends('layouts.master')
@section('content')
    @include('components.title-section')

    <div class="container">
        <div class="row px-lg-5 mt-4 px-0 d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                    @foreach ($spaces as $space)
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset($space->image_path ?? 'images/no-image.jpeg') }}"
                                    class="card-img-top p-2 h-40 object-fit-cover" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title zen-dots fs-4">{{ $space->name }}</h5>
                                    <p class="card-text text-clamp-3">{{ $space->description }}</p>
                                    <a href="{{ route('space.show', $space->id) }}" class="btn btn-outline-dark mt-3">Más
                                        información</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Paginación -->
            <div class="mt-3 col-5">
                {{ $spaces->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection
