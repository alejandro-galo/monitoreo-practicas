@extends('admin.layouts.app')
@section('contenido')
<div class="container">
 <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Lista de Facultades</h2>
        <a href="{{ url('/admin/Facultad/Agregar') }}" class="btn btn-success">
            <i class="fa fa-plus-circle"></i> Añadir nueva Facultad
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facultades as $facultad)
            <tr>
                <td>{{ $facultad->codFac }}</td>
                <td>{{ $facultad->nomFac }}</td>
                <td>{{ $facultad->tipoFac }}</td>
                <td>{{ $facultad->detFac }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
