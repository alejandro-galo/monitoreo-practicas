@extends('admin.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('contenido')
<div class="container mt-4">
    <h2 class="text-primary">Registrar nueva Carrera</h2>
    <a href="{{ route('admin.carreras.index') }}" class="btn btn-secondary mb-3">← Volver</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.carreras.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="codFac" class="form-label">Facultad</label>
            <select name="codFac" id="codFac" class="form-select" required>
                <option value="">Seleccione una facultad</option>
                @foreach($facultades as $fac)
                    <option value="{{ $fac->codFac }}">{{ $fac->nomFac }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nomCar" class="form-label">Nombre de la carrera</label>
            <input type="text" name="nomCar" id="nomCar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="detCar" class="form-label">Descripción</label>
            <textarea name="detCar" id="detCar" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="logCar" class="form-label">Logo (nombre de archivo o texto)</label>
            <input type="text" name="logCar" id="logCar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar Carrera</button>
    </form>
</div>
@endsection
