<div class="container-fluid p-0">
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Logo y nombre UTEA: FIJO en esquina superior derecha -->
        <div class="position-fixed top-0 end-0 m-3 d-flex align-items-center gap-2" style="z-index: 1000;">
            <img src="https://i0.wp.com/utea.edu.pe/wp-content/uploads/2022/01/logo-esucdo-utea.png?resize=246%2C282&ssl=1" 
                alt="UTEA" style="height: 70px; filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.3));">
            <span class="text-white fw-bold fs-5 text-shadow" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">UTEA</span>
        </div>

    <!-- Fondo institucional con overlay -->
    <div class="bg-image" style="background-image: url('https://i0.wp.com/utea.edu.pe/wp-content/uploads/2019/10/UTEA-Fotos-campus-Abancay-05.jpg?fit=1030%2C582&ssl=1'); background-size: cover; background-position: center; min-height: 100vh; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 30, 60, 0.85);"></div>

        <!-- Contenido principal -->
        <div class="content" style="position: relative; z-index: 1; padding: 4rem 1rem;">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <!-- Encabezado principal -->
                    <div class="text-center mb-4">
                        <h1 class="text-white fw-bold display-6">
                            Sistema de Gestión de Prácticas Preprofesionales
                        </h1>
                        <p class="text-light opacity-75">Universidad Tecnológica de los Andes – Campus Abancay</p>
                    </div>

                    <!-- Tarjeta de bienvenida -->
                    <div class="card shadow-lg border-0 rounded-4 mb-4">
                        <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-center bg-white">
                            <div class="mb-3 mb-md-0">
                                <h3 class="text-primary fw-semibold mb-1">
                                    Bienvenido, DOCENTE: <strong>{{ session('nombre') }}</strong>
                                </h3>
                                <p class="text-muted mb-0">
                                    Carrera: <strong class="text-dark">{{ $nombreCarrera }}</strong>
                                </p>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="{{ route('user.asesorados') }}" class="btn btn-outline-info px-4 rounded-pill">
                                    <i class="bi bi-people me-2"></i>Ver asesorados
                                </a>
                                <a href="/logout" class="btn btn-outline-danger px-4 rounded-pill">
                                    <i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Filtro de prácticas -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4">
                        <div class="card-header bg-gradient text-white py-3" style="background: linear-gradient(135deg, #003366, #00509e);">
                            <h4 class="text-primary fw-semibold mb-1">
                                <i class="bi bi-funnel me-2"></i>Filtrar prácticas
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <form method="GET" action="{{ url('/user') }}" class="row g-4">
                                <!-- Buscador por título -->
                                <div class="col-md-6">
                                    <label for="titulo" class="form-label fw-medium text-secondary">Buscar por título</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary text-white">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="titulo" id="titulo" class="form-control form-control-lg" placeholder="Buscar título..." value="{{ request('titulo') }}">
                                    </div>
                                </div>

                                <!-- Filtro por estado -->
                                <div class="col-md-4">
                                    <label for="estado" class="form-label fw-medium text-secondary">Estado de la práctica</label>
                                    <select name="estado" id="estado" class="form-select form-select-lg border-secondary">
                                        <option value="">Todos los estados</option>
                                        <option value="0" {{ $filtroEstado === '0' ? 'selected' : '' }}>Pendientes</option>
                                        <option value="1" {{ $filtroEstado === '1' ? 'selected' : '' }}>Publicadas</option>
                                    </select>
                                </div>

                                <!-- Botón filtrar -->
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-2 rounded-3 shadow-sm">
                                        <i class="bi bi-filter me-2"></i>Filtrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tabla de prácticas -->
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0">
                                Prácticas de la carrera: <strong>{{ $nombreCarrera }}</strong>
                            </h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th class="fw-bold py-3">Título</th>
                                        <th class="fw-bold py-3">Carrera</th>
                                        <th class="fw-bold py-3">Estado</th>
                                        <th class="fw-bold py-3">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($practicas as $pra)
                                        <tr class="border-bottom">
                                            <td class="text-center">{{ $pra->titPra }}</td>
                                            <td class="text-center text-secondary">{{ $pra->carrera->nomCar ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                @if($pra->estPra == 0)
                                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill" style="font-size: 0.85rem;">
                                                        Pendiente
                                                    </span>
                                                @else
                                                    <span class="badge bg-success px-3 py-2 rounded-pill" style="font-size: 0.85rem;">
                                                        Publicado
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($pra->estPra == 1)
                                                    <a href="{{ route('practicas.show', ['id' => $pra->codPra]) }}" 
                                                       class="btn btn-sm btn-outline-primary px-3 rounded-3 shadow-sm">
                                                        <i class="bi bi-eye-fill me-1"></i>Ver
                                                    </a>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <i class="bi bi-journal-x display-5 opacity-50"></i>
                                                <p class="mt-3 mb-0 fw-light">No se encontraron prácticas Pendientes.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos personalizados -->
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #003366, #00509e);
        }
        .card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .card-header, .card-body {
            border: none;
        }
        .form-select, .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
        }
        .form-select:focus, .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1);
        }
        .table thead th {
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.2s ease;
        }
        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        .display-6 {
            font-size: 1.8rem;
            font-weight: 600;
        }
        .input-group-text {
            background-color: #003366;
            color: white;
        }
    </style>
</div>