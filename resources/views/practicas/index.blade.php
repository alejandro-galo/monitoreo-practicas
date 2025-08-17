<div class="container mt-4">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Prácticas Profesionales Publicadas</h2>
        <a href="{{ route('login') }}" class="btn btn-outline-primary">Iniciar sesión</a>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Filtrar por carrera</h4>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('practicas.index') }}" class="row g-3">
                
                <div class="col-md-6">
                    <label class="form-label">Carrera:</label>
                    <div class="search-container">
                        <input type="text" name="search" class="form-control search-input" placeholder="Search..." onchange="this.form.submit()">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Carrera:</label>
                    <select name="carrera" class="form-select" onchange="this.form.submit()">
                        <option value="">Todas</option>
                        @foreach($carreras as $car)
                            <option value="{{ $car->codCar }}" {{ request('carrera') == $car->codCar ? 'selected' : '' }}>
                                {{ $car->nomCar }}
                            </option>
                        @endforeach
                    </select>
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
                 
                    <!--th>Archivo</th-->
                </tr>
            </thead>
           <tbody>
    @forelse($practicas as $pra)
        <tr>
            <td>{{ $pra->titPra }}</td>
            <td>{{ $pra->carrera->nomCar ?? 'N/A' }}</td>
    
            <!--td>
                @if($pra->arcPra)
                    <a href="{{ asset('storage/' . $pra->arcPra) }}" class="btn btn-sm btn-warning" download>
                        Descargar archivo
                    </a>
                @else
                    <span class="text-muted">No disponible</span>
                @endif
            </td-->
            <td>
                <a href="{{ route('practicas.show', ['id' => $pra->codPra]) }}" class="btn btn-sm btn-info">
                    Ver detalles
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center text-muted">No se encontraron prácticas publicadas.</td>
        </tr>
    @endforelse
</tbody>

        </table>
    </div>
</div>
