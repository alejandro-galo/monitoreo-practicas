@extends('admin.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

@section('contenido')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">
            <i class="fa fa-briefcase"></i> Lista de Trabajadores
        </h2>
        <a href="{{ url('/admin/trabajadores/nuevo') }}" class="btn btn-success">
            <i class="fa fa-plus-circle"></i> Añadir nuevo trabajador
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th><i class="fa fa-user"></i> Nombre</th>
                    <th><i class="fa fa-envelope"></i> Correo</th>
                    <th><i class="fa fa-id-badge"></i> Documento</th>
                    <th><i class="fa fa-briefcase"></i> Rol</th>
                    <th><i class="fa fa-check-circle"></i> Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabajadores as $trab)
                    <tr>
                        <td>{{ $trab->nomTrab }} {{ $trab->appTrab }} {{ $trab->apmTrab }}</td>
                        <td>{{ $trab->emaTrab }}</td>
                        <td>{{ $trab->tdoTrab }} - {{ $trab->docTrab }}</td>
                        <td>
                            @if($trab->rolTrab == 1)
                                Administrativo
                            @elseif($trab->rolTrab == 2)
                                Docente
                            @else
                                Desconocido
                            @endif
                        </td>
                        <td class="text-center">
                            @if($trab->estTra == 1)
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Inactivo</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
