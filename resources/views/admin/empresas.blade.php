@extends('admin.layouts.app')

@section('contenido')
    <h2><i class="fa fa-building"></i> Lista de Empresas</h2>
    <a href="{{ url('/admin/empresas/nuevo') }}" class="btn btn-success my-2">
        <i class="fa fa-plus-circle"></i> Añadir nueva empresa
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th><i class="fa fa-id-card"></i> RUC</th>
                <th><i class="fa fa-industry"></i> Nombre</th>
                <th><i class="fa fa-map-marker"></i> Dirección</th>
                <th><i class="fa fa-phone"></i> Teléfono</th>
                <th><i class="fa fa-briefcase"></i> Tipo</th>
                <th><i class="fa fa-location-arrow"></i> Lat</th>
                <th><i class="fa fa-location-arrow"></i> Lon</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $emp)
                <tr>
                    <td>{{ $emp->rucEmp }}</td>
                    <td>{{ $emp->nomEmp }}</td>
                    <td>{{ $emp->dirEmp }}</td>
                    <td>{{ $emp->tefEmp }}</td>
                    <td>
                        <i class="fa {{ $emp->tipEmp == 1 ? 'fa-building-o text-primary' : 'fa-university text-success' }}"></i>
                        {{ $emp->tipEmp == 1 ? 'Privada' : 'Pública' }}
                    </td>
                    <td>{{ $emp->latEmp }}</td>
                    <td>{{ $emp->lonEmp }}</td>
                    <td class="text-center" style="width: 50px;">
                        <a href="{{ url('/admin/empresas/') }}/{{$emp->codEmp}}" class="btn btn-dark">
                            <i class="fa fa-pencil"></i> 
                        </a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
