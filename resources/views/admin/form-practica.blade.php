@extends('admin.layouts.app')

@php
function semestreNombre($n) {
    $anios = [2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024];
    $index = intval(($n - 1) / 2);
    $sem = $n % 2 == 1 ? 'I' : 'II';
    return ($anios[$index] ?? 'Año?') . '-' . $sem;
}
@endphp

@section('contenido')
<div class="container mt-4">
    <h2 class="text-primary mb-4"><i class="fa fa-briefcase"></i> Registrar nueva práctica</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/admin/practicas/guardar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Estudiante:</label>
            <select class="form-select" name="codEst" id="codEst" required onchange="actualizarCarrera()">
                <option value="">-- Selecciona --</option>
                @foreach ($estudiantes as $est)
                    <option value="{{ $est->codEst }}" 
                        data-carrera="{{ $est->carrera->nomCar ?? '' }}"
                        data-codcar="{{ $est->carrera->codCar ?? '' }}">
                        {{ $est->nomEst }} {{ $est->appEst }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Carrera:</label>
            <input class="form-control" type="text" id="nombreCarrera" disabled>
            <input type="hidden" name="codCar" id="codCar">
        </div>

        <div class="mb-3">
            <label class="form-label">Docente asesor:</label>
            <select class="form-select" name="codTrab" required>
                <option value="">-- Selecciona --</option>
                @foreach ($docentes as $doc)
                    <option value="{{ $doc->codTrab }}">{{ $doc->nomTrab }} {{ $doc->appTrab }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Empresa asignada:</label>
            <select class="form-select" name="codEA" required>
                <option value="">-- Selecciona --</option>
                @foreach ($empresas as $emp)
                    <option value="{{ $emp->codEmp }}">{{ $emp->nomEmp }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Semestre:</label>
            <select class="form-select" name="codSem" required>
                <option value="">-- Selecciona --</option>
                @for ($i = 1; $i <= 19; $i++)
                    <option value="{{ $i }}">{{ semestreNombre($i) }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Título de la práctica:</label>
            <input class="form-control" type="text" name="titPra" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de inicio:</label>
            <input class="form-control" type="date" name="iniPra" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de fin:</label>
            <input class="form-control" type="date" name="finPra" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Horas:</label>
            <input class="form-control" type="text" name="hraPra" placeholder="360">
        </div>

        <div class="mb-3">
            <label class="form-label">Resumen:</label>
            <textarea class="form-control" name="resPra" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado:</label>
            <select class="form-select" name="estPra" required>
                <option value="0">Pendiente</option>
                <option value="1">Publicado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar práctica</button>
    </form>
</div>

<script>
    function actualizarCarrera() {
        const select = document.getElementById('codEst');
        const option = select.options[select.selectedIndex];
        const nombreCarrera = option.getAttribute('data-carrera');
        const codCar = option.getAttribute('data-codcar');

        document.getElementById('nombreCarrera').value = nombreCarrera ?? '';
        document.getElementById('codCar').value = codCar ?? '';
    }
</script>
@endsection
