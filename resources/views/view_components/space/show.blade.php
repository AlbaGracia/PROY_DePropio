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
                        <h2 class="zen-dots text-royal-purple">{{ $space->name }}
                            @auth
                                @if (Auth::user()->name === 'Admin')
                                    <a href="{{ route('space.edit', $space->id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                @endif
                            @endauth
                        </h2>


                        <p class="badge bg-lime-yellow text-dark align-self-start">{{ $space->type->name }}</p>
                        <a href="{{ $space->address }}" class="mt-2"><i class="fa-solid fa-location-dot"></i>
                            {{ __('labels.address') }}</a>

                        <div class="accordion mt-3">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <div class="accordion-button collapsed fw-bold">
                                        {{ __('labels.description') }}
                                    </div>
                                </h2>
                                <div class="accordion-body">
                                    {{ $space->description }}
                                </div>
                            </div>
                        </div>
                        <a href="{{ $space->web_url }}" target="blank"
                            class="btn btn-dark mt-2">{{ __('labels.more_info') }}</a>
                        <a href="{{ route('eventsInSpace', $space->id) }}" class="btn btn-outline-dark mt-2">
                            {{ __('labels.event-space') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
