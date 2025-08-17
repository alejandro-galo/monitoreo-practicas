@extends('admin.layouts.app')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@section('contenido')
<div class="container mt-4">
    <h2 class="text-primary">Registrar nuevo docente</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/admin/docentes/guardar') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nomTrab" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido:</label>
            <input type="text" name="appTrab" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="emaTrab" class="form-control" required>
        </div>

        <input type="hidden" name="rolTrab" value="2">

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i> Guardar docente
        </button>
    </form>
</div>
@endsection
