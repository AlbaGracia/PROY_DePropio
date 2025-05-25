@extends('layouts.master')

@section('content')
    <div class="masthead pb-2">
        <div class="container">
            <div class="row gx-4 gx-lg-5 align-items-center justify-content-center text-center mr-0">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">{{ __('labels.title') }}</h1>
                    <hr class="divider text-white mb-2" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5 text-white fs-4">{{ __('labels.subtitle') }}</p>
                    <a class="btn btn-outline-light btn-lg"
                        href="{{ route('event.index') }}">{{ __('labels.show-events') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bloque texto - NO TEXT -->
    <aside class="text-center bg-deep-purple py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-2"></div>
                </div>
            </div>
        </div>
    </aside>
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4">
                    <a class="portfolio-box" href="{{ route('space.index') }}" title="{{ __('labels.spaces') }}">
                        <img class="img-fluid" src="{{ asset('images/space.jpg') }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-name text-deep-purple fw-bold fs-3">{{ __('labels.spaces') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="portfolio-box" href="{{ route('event.index') }}" title="{{ __('labels.events') }}">
                        <img class="img-fluid" src="{{ asset('images/event.jpg') }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-name text-deep-purple fw-bold fs-3">{{ __('labels.events') }}</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="portfolio-box" href="{{ route('calendar') }}" title="{{ __('labels.calendar') }}">
                        <img class="img-fluid" src="{{ asset('images/calendar.jpg') }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-name text-deep-purple fw-bold fs-3">{{ __('labels.calendar') }}</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Eventos semana -->
    <section class="page-section bg-white py-3" id="about">
        <div class="container pt-4 pt-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-deep-purple fs-1">{{ __('labels.this-week-title') }}</h2>
                    <hr class="divider divider-light mb-3" />
                    <p class="text-white-75 mb-4">{{ __('labels.this-week-sub') }}</p>
                    <a class="btn btn-lime-yellow btn-md"
                        href="{{ route('thisWeekEvents') }}">{{ __('labels.show-events') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
