@extends('admin.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@section('contenido')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">
            <i class="fa fa-users"></i> Lista de Estudiantes
        </h2>
        <a href="{{ url('/admin/estudiantes/nuevo') }}" class="btn btn-success">
            <i class="fa fa-plus-circle"></i> Añadir nuevo estudiante
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th><i class="fa fa-user"></i> Nombre</th>
                    <th><i class="fa fa-envelope"></i> Correo</th>
                    <th><i class="fa fa-graduation-cap"></i> Carrera</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $est)
                    <tr>
                        <td>{{ $est->nomEst }} {{ $est->appEst }}</td>
                        <td>{{ $est->emaEst }}</td>
                        <td>{{ $est->carrera->nomCar ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
