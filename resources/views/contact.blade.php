@extends('layouts.master')

@section('title', __('labels.contact'))

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('success'))
                    <div class="alert alert-success bg-cream text-dark text-center border border-dark" id="success-alert">
                        {{ session('success') }}</div>

                    <script>
                        setTimeout(() => {
                            document.getElementById('success-alert').style.display = 'none';
                        }, 4000);
                    </script>
                @endif

                <div class="card shadow rounded-4">
                    <div class="card-header bg-royal-purple text-white rounded-top-4">
                        <h2 class="mb-0 text-center">{{ __('labels.form-contact') }}</h2>
                    </div>
                    <div class="card-body col-11 m-auto">
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="d-flex justify-content-between">
                                <div class="mb-3 col-6">
                                    <label for="name" class="form-label fw-bold">{{ __('labels.name') }}</label>
                                    <input type="text" name="name" class="form-control rounded-2" required>
                                </div>

                                <div class="mb-3 col-5">
                                    <label for="surname" class="form-label fw-bold">{{ __('labels.surname') }}</label>
                                    <input type="text" name="surname" class="form-control rounded-2" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">{{ __('labels.email') }}</label>
                                <input type="email" name="email" class="form-control rounded-2" required>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">{{ __('labels.subject') }}</label>
                                <input type="text" name="title" class="form-control rounded-2" required>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label fw-bold">{{ __('labels.message') }}</label>
                                <textarea name="message" class="form-control rounded-2" rows="5" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-deep-purple-out btn-lg">{{ __('labels.send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
