@extends('admin.layouts.app')

@section('contenido')
    <div class="container mt-4">
        <h2 class="mb-4 text-primary">
            <i class="fa fa-building"></i> Nueva Empresa
        </h2>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $e)
                    <p>{{ $e }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ url('/admin/empresas/guardar') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-id-card"></i> RUC:</label>
                <input type="text" class="form-control" name="rucEmp" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-industry"></i> Nombre de la empresa:</label>
                <input type="text" class="form-control" name="nomEmp" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-map-marker"></i> Dirección:</label>
                <input type="text" class="form-control" name="dirEmp">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-phone"></i> Teléfono:</label>
                <input type="text" class="form-control" name="tefEmp">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-briefcase"></i> Tipo:</label>
                <select class="form-select" name="tipEmp" required>
                    <option value="">Seleccione</option>
                    <option value="1">Privada</option>
                    <option value="2">Pública</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-location-arrow"></i> Latitud:</label>
                <input type="text" class="form-control" name="latEmp">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fa fa-location-arrow"></i> Longitud:</label>
                <input type="text" class="form-control" name="lonEmp">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Guardar
            </button>
        </form>
    </div>
@endsection
