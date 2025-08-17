<!DOCTYPE html>
<html>
<head>
    <title>Detalle de la Práctica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Volver</a>

    <h2 class="mb-4 text-primary">Detalle de la Práctica</h2>

    <div class="card">
        <div class="card-header bg-dark text-white">
            {{ $practica->titPra }}
        </div>
     
        <table style="width:100%;">
  <tr>
    <td style="width:30%;">
      <div>
    <img src="https://imgv2-2-f.scribdassets.com/img/document/584486416/original/0c93625802/1?v=1" width="300" height="auto"/>
      </div>
    </td>
    <td style="width:70%;">
      <div>
   <div class="card-body">

            <p><strong>Estudiante:</strong> {{ $practica->estudiante->nomEst ?? 'No asignado' }} {{ $practica->estudiante->appEst ?? '' }} {{ $practica->estudiante->apmEst ?? '' }}</p>
            <p><strong>Carrera:</strong> {{ $practica->carrera->nomCar ?? 'N/A' }}</p>
            <p><strong>Docente:</strong> {{ $practica->docente->nomTrab ?? 'N/A' }}</p>
            <p><strong>Empresa:</strong> {{ $practica->empresaAsignada->nomEmp ?? 'N/A' }}</p>
            <p><strong>Fecha de inicio:</strong> {{ $practica->iniPra }}</p>
            <p><strong>Fecha de fin:</strong> {{ $practica->finPra }}</p>
            <p><strong>Horas:</strong> {{ $practica->hraPra }} hrs</p>
            <p><strong>Resumen:</strong> {{ $practica->resPra ?? 'No disponible' }}</p>

            @if($practica->arcPra)
                <p><strong>Archivo:</strong> 
                    <a href="{{ asset('storage/' . $practica->arcPra) }}" class="btn btn-sm btn-outline-primary" download>Descargar</a>
                </p>
            @endif
<!--
            @if($practica->imgPra)
                <p><strong>Imagen:</strong></p>
                <img src="{{ asset('storage/' . $practica->imgPra) }}" class="img-fluid rounded" style="max-width: 300px;">
            @endif
-->
        </div>

      
      </div>
    </td>
  </tr>
</table>
    </div>
</div>
</body>
</html>
