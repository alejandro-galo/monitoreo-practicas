@extends('admin.layouts.app')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('contenido')
<div class="container mt-4">
    <h2 class="text-primary mb-4">Nuevo Estudiante</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/estudiantes/guardar') }}">
        @csrf
        <div class="mb-3">
            <label for="nomEst" class="form-label">Nombre:</label>
            <input type="text" id="nomEst" name="nomEst" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="appEst" class="form-label">Apellido:</label>
            <input type="text" id="appEst" name="appEst" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="emaEst" class="form-label">Email:</label>
            <input type="email" id="emaEst" name="emaEst" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="codCar" class="form-label">Carrera:</label>
            <select id="codCar" name="codCar" class="form-select" required>
                <option value="">Seleccione una carrera</option>
                @foreach($carreras as $car)
                    <option value="{{ $car->codCar }}">{{ $car->nomCar }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar
        </button>
    </form>
</div>
@endsection
