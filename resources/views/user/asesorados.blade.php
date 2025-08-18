<div class="container-fluid p-0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Logo de la universidad -->
    <div class="position-fixed top-0 end-0 m-3 z-index-3">
        <img src="https://www.utec.edu.pe/wp-content/uploads/2020/05/logo-utec.png" alt="UTEC" style="height: 60px;">
    </div>

    <!-- Fondo -->
    <div class="bg-image" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAtNiRQaLJI7xhnJHGNZurx4OM829GgSlQpw&s'); background-size: cover; background-position: center; min-height: 100vh; position: relative;">
        
    
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="content" style="position: relative; z-index: 1; padding: 3rem 1rem;">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card shadow-lg border-0 rounded-4 bg-white">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center p-4">
                            <h2 class="mb-0 fw-bold">
                                <i class="bi bi-people-fill me-2"></i>Mis estudiantes asesorados
                            </h2>
                            <a href="/user" class="btn btn-outline-light px-4 rounded-pill">
                                <i class="bi bi-arrow-left-circle me-1"></i> Volver
                            </a>
                        </div>

                        <div class="card-body p-0">
                            <!-- Buscador y filtro -->
                            <div class="p-4 border-bottom bg-light">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <span class="input-group-text bg-secondary text-white">
                                                <i class="bi bi-search"></i>
                                            </span>
                                            <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Buscar por título...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <select id="statusFilter" class="form-select form-select-lg">
                                            <option value="">Todos</option>
                                            <option value="0">Pendiente</option>
                                            <option value="1">Publicado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabla -->
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th class="text-center py-3 fw-bold">Título</th>
                                            <th class="text-center py-3 fw-bold">Carrera</th>
                                            <th class="text-center py-3 fw-bold">Estado</th>
                                            <th class="text-center py-3 fw-bold">Fecha de inicio</th>
                                            <th class="text-center py-3 fw-bold">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="practicasTable">
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
                                                <td class="text-center text-muted">
                                                    {{ \Carbon\Carbon::parse($pra->iniPra)->format('d/m/Y') }}
                                                </td>
                                                <td class="text-center">
                                                    @if($pra->estPra == 1)
                                                        <a href="{{ route('practicas.show', ['id' => $pra->codPra]) }}" 
                                                           class="btn btn-sm btn-outline-info px-3 rounded-3 shadow-sm"
                                                           title="Ver detalles">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-5 text-muted">
                                                    <i class="bi bi-folder-x display-6 opacity-50"></i>
                                                    <p class="mt-3 mb-0 fw-light">No se encontraron prácticas.</p>
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
    </div>

    <!-- Script para búsqueda y filtrado -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const tableBody = document.getElementById('practicasTable');

            // Filtrar por texto
            searchInput.addEventListener('input', function () {
                const filterText = this.value.toLowerCase();
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach(row => {
                    const titulo = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                    if (titulo.includes(filterText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Filtrar por estado
            statusFilter.addEventListener('change', function () {
                const status = this.value;
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach(row => {
                    const estado = row.querySelector('td:nth-child(3) span').textContent.trim();
                    const isPendiente = estado === 'Pendiente';
                    const isPublicado = estado === 'Publicado';

                    if (status === '') {
                        row.style.display = '';
                    } else if (status === '0' && isPendiente) {
                        row.style.display = '';
                    } else if (status === '1' && isPublicado) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <style>
        .bg-image {
            position: relative;
            min-height: 100vh;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .content {
            position: relative;
            z-index: 1;
        }
        .card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .card-header {
            border-bottom: none;
        }
        .btn-outline-light {
            border-color: #fff;
            color: #fff;
        }
        .btn-outline-light:hover {
            background-color: #fff;
            color: #000;
        }
        .input-group-text {
            background-color: #007bff;
            color: white;
        }
        .form-control {
            border: 1px solid #ccc;
        }
        .form-select {
            border: 1px solid #ccc;
        }
        .table thead th {
            font-weight: bold;
            vertical-align: middle;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
        .rounded-4 {
            border-radius: 1rem;
        }
    </style>
</div>