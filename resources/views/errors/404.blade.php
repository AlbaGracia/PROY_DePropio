@extends('layouts.master')

@section('title', __('labels.404-title'))

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 215px);">
        <div class="text-center mt-5">
            <h1 class="display-5">{{ __('labels.404-error') }}</h1>
            <p class="fs-5">{{ __('labels.404-subt') }}</p>
            <a href="/" class="btn btn-lime-yellow mt-3">{{ __('labels.home') }}</a>
        </div>
    </div>
@endsection
