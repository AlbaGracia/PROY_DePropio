@extends('layouts.master')
@section('content')
    <div class="container mt-5" style="min-height: 50vh;">
        <div class="row d-flex justify-content-center">
            <div class="col-11 ">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6 position-relative">
                        <img src="{{ asset($space->image_path ?? 'images/no-image.jpeg') }}" alt=""
                            class="w-100 object-fit-cover rounded-3">
                    </div>

                    <!-- Detalles -->
                    <div class="col-lg-6 mt-4 mt-lg-0 d-flex flex-column gap-2">
                        <a href="{{ route('space.edit', $space->id) }}">
                            <h2 class="zen-dots text-royal-purple">{{ $space->name }}</h2>
                        </a>

                        <p class="badge bg-lime-yellow text-dark w-20">{{ $space->type->name }}</p>
                        <a href="{{ $space->adress }}" class="mt-2"><i class="fa-solid fa-location-dot"></i> Dirección</a>

                        <div class="accordion mt-3">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed fw-bold">
                                        Descripción
                                    </div>
                                </h2>
                                <div class="accordion-body">
                                    {{ $space->description }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ $space->web_url }}" target="_blank" class="btn btn-dark mt-2">Más información</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
