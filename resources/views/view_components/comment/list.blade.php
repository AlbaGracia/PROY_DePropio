@extends('layouts.master')

@section('title', 'Listado de Comentarios')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.comments') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="col-lg-7 col-12">
                    <form action="{{ route('comment.index') }}" method="GET" class="row g-2 mb-4 justify-content-center">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control rounded"
                                placeholder="{{ __('labels.comment-search') }}" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-3">
                            <select name="event_id" class="form-select rounded">
                                <option value="">{{ __('labels.events') }}</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}"
                                        {{ request('event_id') == $event->id ? 'selected' : '' }}>
                                        {{ $event->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <input type="date" name="date" class="form-control rounded" value="{{ request('date') }}">
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-outline-dark w-100" type="submit">
                                {{ __('labels.search') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <form method="GET" action="{{ route('comment.index') }}">
                    <button type="submit" class="btn btn-deep-purple-out">
                        {{ __('labels.clear-filters') }}
                    </button>
                </form>
                <a href="{{ route('admin.panel') }}" class="btn btn-outline-dark">
                    <i class="fa-solid fa-xmark me-1"></i> {{ __('labels.back-panel') }}
                </a>
            </div>
        </div>

        <div class="table-responsive col-lg-10">
            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>{{ __('labels.user') }}</th>
                        <th>{{ __('labels.comment') }}</th>
                        <th>{{ __('labels.event') }}</th>
                        <th>{{ __('labels.publish-date') }}</th>
                        <th class="text-center">{{ __('labels.delete') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($comment->publish_date)->format('d/m/y') }}</td>
                            <td>{{ $comment->event->name }}</td>
                            <td>{{ $comment->text }}</td>


                            <!-- Columna Eliminar -->
                            <td class="text-center">
                                <button type="button" class="btn btn-link text-danger p-0 m-0" x-data
                                    x-on:click.prevent="$dispatch('open-modal', 'delete-comment-{{ $comment->id }}')">
                                    {{ __('labels.delete') }}
                                </button>

                                <!-- Modal de confirmación -->
                                <x-confirm-delete :action="route('comment.destroy', $comment->id)" id="delete-comment-{{ $comment->id }}"
                                    title="¿Eliminar comentario?"
                                    message="¿Estás seguro de que quieres eliminar este comentario? Esta acción no se puede deshacer." />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $comments->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
