@extends('layouts.master')


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow rounded-4">
                    <div class="card-header bg-royal-purple text-white rounded-top-4">
                        <h2 class="mb-0">Formulario de Contacto</h2>
                    </div>
                    <div class="card-body col-11 m-auto">
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="d-flex justify-content-between">
                                <div class="mb-3 col-6">
                                    <label for="name" class="form-label fw-bold">Nombre</label>
                                    <input type="text" name="name" class="form-control rounded-2" required>
                                </div>

                                <div class="mb-3 col-5">
                                    <label for="surname" class="form-label fw-bold">Apellido</label>
                                    <input type="text" name="surname" class="form-control rounded-2" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                                <input type="email" name="email" class="form-control rounded-2" required>
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Motivo de Contacto</label>
                                <input type="text" name="title" class="form-control rounded-2" required>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label fw-bold">Mensaje</label>
                                <textarea name="message" class="form-control rounded-2" rows="5" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-deep-purple-out btn-lg">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
