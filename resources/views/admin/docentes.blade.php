@extends('admin.layouts.app')

@section('contenido')
<div class="container mt-4">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Lista de docentes</h2>
        <a href="{{ url('/admin/docentes/nuevo') }}" class="btn btn-success">
            <i class="fa fa-plus-circle"></i> Añadir nuevo docente
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($docentes as $doc)
                    <tr>
                                     <div class="card">

                        <td>{{ $doc->nomTrab }} {{ $doc->appTrab }}</td>
                        <td>{{ $doc->emaTrab }}</td>
                        <td>{{ $doc->rolTrab == 2 ? 'Docente' : 'Otro' }}</td>
                        <td class="text-center" style="width: 50px;">
                            <a href="{{ url('/admin/docentes/') }}/{{$doc->codTrab}}" class="btn btn-dark">
                                <i class="fa fa-pencil"></i> 
                            </a>
                        </td>
                                            </div>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
