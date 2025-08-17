<div class="container mt-4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<h2 class="text-danger mb-4 bg-warning" >
    Prácticas de la carrera de {{ $nombreCarrera }}
</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        
        <h2 class="text-primary">
            Bienvenido, DOCENTE: {{ session('nombre') }}
        </h2>
        <a href="/logout" class="btn btn-outline-danger">Cerrar sesión</a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Filtrar prácticas</h4>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ url('/user') }}" class="row g-3">
                <div class="col-md-4 pe-3  me-5">
                    <label class="form-label">Estado:</label>
                    <select name="estado" class="form-select">
                        <option value="">Todos</option>
                        <option value="0" {{ $filtroEstado === '0' ? 'selected' : '' }}>Pendientes</option>
                        <option value="1" {{ $filtroEstado === '1' ? 'selected' : '' }}>Publicadas</option>
                    </select>
                </div>

              

                <div class="col-md-6 d-flex align-items-end pe-3">
                    <button type="submit" class="btn btn-primary col-md-6 me-5">Filtrar</button>
                  
                <a href="{{ route('user.asesorados') }}" class="btn btn-info">
                 Ver asesorados
                     </a>
                </div>

                
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Título</th>
                    <th>Carrera</th>
                    <th>Estado</th>
                    <!--th>Archivo</th-->
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($practicas as $pra)
                    <tr>
                        <td>{{ $pra->titPra }}</td>
                        <td>{{ $pra->carrera->nomCar ?? 'N/A' }}</td>
                        <td>
                            @if($pra->estPra == 0)
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @else
                                <span class="badge bg-success">Publicado</span>
                            @endif
                        </td>
                       <!--td class="text-center">
                            @if($pra->estPra == 1 && $pra->arcPra)
                                <a href="{{ asset('storage/' . $pra->arcPra) }}" class="btn btn-sm btn-warning" download>
                                    Descargar archivo
                                </a>
                            @elseif($pra->estPra == 1)
                                <span class="text-muted">No disponible</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td-->
                        <td>
                            @if($pra->estPra == 1)
                                <a href="{{ route('practicas.show', ['id' => $pra->codPra]) }}" class="btn btn-sm btn-info">
                                    Ver detalles
                                </a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No se encontraron prácticas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
