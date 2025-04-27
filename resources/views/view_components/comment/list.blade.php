@extends('layouts.master')

@section('title', 'Listado de Comentarios')

@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        <h1 class="mb-4 text-center text-royal-purple">{{ __('labels.comments') }}</h1>
        <div class="container mb-4">
            <div class="d-flex justify-content-center mb-3">
                <div class="col-lg-7 col-12">
                    <form action="{{ route('comment.index') }}" method="GET">
                        <div class="input-group">
                            <button class="btn btn-outline-dark" type="submit">{{ __('labels.search') }}</button>
                            <input type="text" class="form-control" placeholder={{ __('labels.event-search') }}
                                name="search" value="{{ request('search') }}" style="border-radius: 0 20px 20px 0">
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
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
                                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0 m-0"
                                        style="text-decoration: none;">{{ __('labels.delete') }}</button>
                                </form>
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
