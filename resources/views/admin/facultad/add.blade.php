@extends('admin.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('contenido')
<div class="container mt-4">
    <h2 class="text-primary mb-4">Registrar nueva Facultad</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validaciones --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('facultad.store') }}" method="POST" class="card p-4 shadow">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre de la Facultad</label>
            <input type="text" name="nomFac" class="form-control" value="{{ old('nomFac') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de Facultad</label>
            <select name="tipoFac" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="0" {{ old('tipoFac') == 0 ? 'selected' : '' }}>Tipo 0</option>
                <option value="1" {{ old('tipoFac') == 1 ? 'selected' : '' }}>Tipo 1</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Detalles</label>
            <textarea name="detFac" class="form-control" rows="3">{{ old('detFac') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Guardar Facultad
        </button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
