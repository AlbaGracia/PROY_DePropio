@section('title', $event->name)


@extends('layouts.master')
@section('content')

    <main class="container ">
        <div class="row my-5 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <!-- Imagen del evento -->
                    <div class="like position-absolute top-0 end-0 m-4 text-royal-purple"><a href=""><i
                                class="fa-regular fa-heart fa-2xl"></i></a></div>
                    {{--  AÑADIR POP UP 'EVENTO GUARDADO, VER TUS EVENTOS GUARDADOS?' --}}
                    <img src="{{ asset($event->image_path ?? 'images/no-image.jpeg') }}"
                        class="card-img-top h-60 object-fit-cover" alt="{{ $event->name }}">

                    <div class="card-body mx-3">
                        <a href="{{ route('event.edit', $event->id) }}">
                            <h2 class="card-title text-center mb-4 text-royal-purple">{{ $event->name }}</h2>
                        </a>

                        <!-- Información del evento -->
                        <div class="row">
                            <div class="col-md-6 ">
                                <p class="fs-5"><b class="fs-5">{{ __('labels.category') }}: </b>
                                    {{ $event->category->name }}</p>
                                <p class="fs-5"><b class="fs-5">{{ __('labels.space') }}: </b><a
                                        href="{{ route('space.show', $event->space_id) }}" class="link-black fs-5">
                                        {{ $event->space->name }}</a></p>
                            </div>
                            <div class="col-md-6">
                                <p class="fs-5"><b class="fs-5">{{ __('labels.dates') }}:</b>
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/y') }}
                                    @if ($event->end_date)
                                        - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/y') }}
                                    @endif
                                </p>
                                <p class="fs-5"><b class="fs-5">{{ __('labels.price') }}:</b>
                                    {{ $event->price == 0 ? __('labels.free') : $event->price . '€' }}
                                </p>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="my-4">
                            <p class="fw-bold fs-5">{{ __('labels.description') }}:</p>
                            <p class="fs-5">{{ $event->description }}</p>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('event.index') }}" class="btn btn-outline-dark">{{ __('labels.back-list') }}</a>
                            <a href="{{ $event->web_url ? $event->web_url : '#' }}" target="blank"
                                class="btn btn-lime-yellow" onclick="{{ $event->web_url ? '' : 'return false;' }}">
                                {{ __('labels.more_info') }}
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Comentarios -->
            <div class="col-lg-8 mt-5">
                <div class="card shadow">
                    <div class="card-body mx-5">
                        @auth
                            <!-- Formulario para nuevo comentario -->
                            <form action="{{ route('comment.store') }}" method="POST" class="mt-4">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                <div class="mb-3">
                                    <label for="content" class="form-label fw-bold text-royal-purple">{{ __('labels.add-comment') }}</label>
                                    <textarea name="text" id="text" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-outline-dark">{{ __('labels.publish') }}</button>
                            </form>
                        @endauth

                        <!-- Lista de comentarios -->
                        <h4 class="card-title my-3 pt-4 fs-4 text-royal-purple zen-dots border-top">{{ __('labels.comments') }}</h4>
                        @forelse ($comments as $comment)
                            <div class="mb-3 border-bottom pb-2">
                                <p class="mb-1 fw-bold">{{ $comment->user->name }}</p>
                                <p class="mb-1">{{ $comment->text }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($comment->publish_date)->format('d/m/y') }}</small>
                                    @auth
                                        @if (Auth::user()->name == $comment->user->name)
                                            <div class="d-flex ms-auto">
                                                <a href="{{ route('comment.edit', $comment->id) }}" class="btn"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('comment.destroy', $comment->id) }}" class="d-inline"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">{{ __('labels.no-comments') }}</p>
                        @endforelse

                        <!-- Paginación -->
                        <div class="mt-3">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
