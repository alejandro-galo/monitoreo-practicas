<div class="container-fluid p-0">
    <!-- Bootstrap & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Logo fijo -->
    <div class="position-fixed top-0 end-0 m-3 d-flex align-items-center gap-2" style="z-index: 1000;">
        <img src="https://i0.wp.com/utea.edu.pe/wp-content/uploads/2022/01/logo-esucdo-utea.png?resize=246%2C282&ssl=1" 
            alt="UTEA" style="height: 70px; filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.3));">
        <span class="text-white fw-bold fs-5 text-shadow" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">UTEA</span>
    </div>

    <!-- Fondo institucional con overlay -->
    <div class="bg-image" style="background-image: url('https://i0.wp.com/utea.edu.pe/wp-content/uploads/2019/10/UTEA-Fotos-campus-Abancay-05.jpg?fit=1030%2C582&ssl=1'); background-size: cover; background-position: center; min-height: 100vh; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 30, 60, 0.85);"></div>

        <!-- Contenido -->
        <div class="content" style="position: relative; z-index: 1; padding: 4rem 1rem;">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
<div style="
    bottom: 10px;
    right: 10px;
    background: rgba(0,0,0,0.6);
    color: #fff;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 18px;
    font-weight: bold;
    z-index: 9999;
">    <p>👀 Esta página ha sido visitada <strong>{{ $visitas}}</strong> veces.</p>
</div>

                    <!-- Encabezado -->
                    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
                        <h2 class="fw-bold">Prácticas Profesionales Publicadas</h2>
                        <a href="{{ route('login') }}" class="btn btn-outline-light px-4 rounded-pill shadow-sm">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesión
                        </a>
                    </div>

                    <!-- Filtro -->
                    <div class="card shadow-lg border-0 rounded-4 mb-4">
                        <div class="card-header bg-gradient  py-3">
                            <h4 class="mb-0"><i class="bi text-secondary bi-funnel me-2"></i>Filtrar por carrera</h4>
                        </div>
                        <div class="card-body p-4">
                            <form method="GET" action="{{ route('practicas.index') }}" class="row g-4">
                                <!-- Buscador -->
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Buscar</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-secondary text-white">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control form-control-lg" placeholder="Buscar..." value="{{ request('search') }}" onchange="this.form.submit()">
                                    </div>
                                </div>
                                <!-- Carrera -->
                                <div class="col-md-6">
                                    <label class="form-label fw-medium text-secondary">Carrera</label>
                                    <select name="carrera" class="form-select form-select-lg border-secondary" onchange="this.form.submit()">
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

                    <!-- Tabla -->
                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="mb-0">Listado de prácticas publicadas</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-secondary text-white text-center">
                                    <tr>
                                        <th class="fw-bold py-3">Título</th>
                                        <th class="fw-bold py-3">Carrera</th>
                                        <th class="fw-bold py-3">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($practicas as $pra)
                                        <tr class="border-bottom text-center">
                                            <td>{{ $pra->titPra }}</td>
                                            <td class="text-secondary">{{ $pra->carrera->nomCar ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('practicas.show', ['id' => $pra->codPra]) }}" 
                                                   class="btn btn-sm btn-outline-primary px-3 rounded-3 shadow-sm">
                                                    <i class="bi bi-eye-fill me-1"></i>Ver detalles
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-5 text-muted">
                                                <i class="bi bi-journal-x display-5 opacity-50"></i>
                                                <p class="mt-3 mb-0 fw-light">No se encontraron prácticas publicadas.</p>
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
        .form-select, .form-control {
            border-radius: 8px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.1);
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
            transition: background-color 0.2s ease;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }
        
    </style>
</div>
