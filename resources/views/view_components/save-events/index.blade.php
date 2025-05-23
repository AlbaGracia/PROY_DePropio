@extends('layouts.master')

@section('title', __('labels.saved-events'))

@section('content')

    <main class="container">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h2 class="text-center text-royal-purple my-3">{{ __('labels.saved-events') }}</h2>

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
                                                @if ($saveEvent->event->end_date)
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
