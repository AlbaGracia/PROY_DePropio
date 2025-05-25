@extends('layouts.master')

@section('title', __('labels.saved-events'))

@section('content')

    <main class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="text-center text-royal-purple my-3">{{ __('labels.saved-events') }}</h2>

                        <div class="card shadow-sm rounded-4 bg-light border-0 col-lg-9 col-12 m-auto p-4 mb-3">
                            <form action="{{ route('save-events.index') }}" method="GET" class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <input type="date" name="date" id="date" class="form-select rounded-1"
                                        onfocusout="this.form.submit()">
                                </div>

                                <div class="col-md-4">
                                    <select name="sort" id="sort" class="form-select rounded-1"
                                        onchange="this.form.submit()">
                                        <option value="date_asc" {{ request('sort') === 'date_asc' ? 'selected' : '' }}>
                                            {{ __('labels.date_asc') }}
                                        </option>
                                        <option value="date_desc" {{ request('sort') === 'date_desc' ? 'selected' : '' }}>
                                            {{ __('labels.date_desc') }}
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4 d-grid">
                                    <a href="{{ route('save-events.index') }}" class="btn btn-deep-purple-out">
                                        {{ __('labels.clear-filters') }}
                                    </a>
                                </div>
                            </form>
                        </div>

                        @if ($saveEvents->isEmpty())
                            <p>{{ __('labels.no-event-saved') }}</p>
                        @else
                            <!-- Tabla de eventos guardados -->
                            <table class="table">
                                <tbody>
                                    @foreach ($saveEvents as $saveEvent)
                                        <tr>
                                            <td>
                                                {{ \Carbon\Carbon::parse($saveEvent->event->start_date)->format('d/m/y') }}
                                                @if ($saveEvent->event->end_date != $saveEvent->event->start_date)
                                                    -
                                                    {{ \Carbon\Carbon::parse($saveEvent->event->end_date)->format('d/m/y') }}
                                                @endif
                                            </td>
                                            <td>{{ $saveEvent->event->name }}</td>
                                            <td class="text-center">

                                                <a href="{{ route('event.show', $saveEvent->event->id) }}"
                                                    class="btn btn-outline-dark btn-sm">
                                                    {{ __('labels.more_info') }}
                                                </a>

                                                <form action="{{ route('unsave-event', $saveEvent->event->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        {{ __('labels.delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <!-- Paginación -->
                        <x-pagination :paginator="$saveEvents" />

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
