@extends('admin.layouts.app')

@section('contenido')
<div class="container mt-4">
    <h2 class="text-primary mb-4"><i class="fa fa-briefcase"></i> Lista de Prácticas</h2>
    <a href="{{ url('/admin/practicas/nueva') }}" class="btn btn-success mb-3">
        <i class="fa fa-plus"></i> Añadir nueva práctica
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Estudiante</th>
                <th>Docente</th>
                <th>Estado</th>
                  <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($practicas as $p)
                <tr>
                    <td>{{ $p->titPra }}</td>
                    <td>{{ $p->estudiante->nomEst ?? '---' }} {{ $p->estudiante->appEst ?? '' }}</td>
                    <td>{{ $p->docente->nomTrab ?? '---' }} {{ $p->docente->appTrab ?? '' }}</td>
                    <td>
                        @if($p->estPra == 0) <span class="badge bg-warning text-dark">Pendiente</span>
                        @else <span class="badge bg-success">Publicado</span>
                        @endif
                    </td>
                    <td>
                        @if($p->estPra == 0) <span class="badge  text-dark">aun no hay nada</span>
                        @else      <a href="{{ route('practicas.show', ['id' => $p->codPra]) }}" class="btn btn-sm btn-info">
                    Ver detalles
                </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
