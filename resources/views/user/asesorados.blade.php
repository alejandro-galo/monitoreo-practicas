<div class="container mt-4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Mis estudiantes asesorados</h2>
        <a href="/user" class="btn btn-secondary">
            ← Volver
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Título</th>
                    <th>Carrera</th>
                    <th>Estado</th>
                    <!--th>Archivo</th-->
                    <th>Fecha de inicio</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($practicas as $pra)
                    <tr>
                        <td>{{ $pra->titPra }}</td>
                        <td>{{ $pra->carrera->nomCar ?? 'N/A' }}</td>
                        <td class="text-center">
                            @if($pra->estPra == 0)
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @else
                                <span class="badge bg-success">Publicado</span>
                            @endif
                        </td>
                        <!--td class="text-center">
                            @if($pra->estPra == 1 && $pra->arcPra)
                                <a href="{{ asset('storage/' . $pra->arcPra) }}" class="btn btn-sm btn-warning" download>
                                    Descargar
                                </a>
                            @elseif($pra->estPra == 1)
                                <span class="text-muted">No disponible</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td-->
                        <td>{{ $pra->iniPra }}</td>
                        <td class="text-center">
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
                        <td colspan="5" class="text-center text-muted">No se encontraron prácticas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
