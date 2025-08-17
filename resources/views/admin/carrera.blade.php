@extends('admin.layouts.app')

@section('contenido')
 <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Lista de Carreras</h2>
        <a href="{{ url('/admin/Carreras/Agregar') }}" class="btn btn-success">
            <i class="fa fa-plus-circle"></i> Añadir nueva carrera
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Carreras as $doc)
                    <tr>
                                     <div class="card">

                        <td>{{ $doc->nomCar }} </td>
                        <td>{{ $doc->detCar }}</td>
                                            </div>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
