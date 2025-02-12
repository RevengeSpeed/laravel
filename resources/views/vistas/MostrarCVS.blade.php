<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .user-image {
            width: 100%;
            height: auto;
        }
        .img-placeholder {
            width: 100%;
            height: 200px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Lista de Egresados</h2>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($user->profile_picture)
                                <img src="{{ $user->profile_picture }}" alt="Foto de {{ $user->formacionacademica->Nombre ?? 'Usuario' }} {{ $user->formacionacademica->Apellido ?? '' }}" class="user-image">
                            @else
                                <div class="img-placeholder">Sin Imagen</div>
                            @endif
                            <h5 class="card-title mt-2">{{ $user->formacionacademica->Nombre ?? 'Nombre no disponible' }} {{ $user->formacionacademica->Apellido ?? '' }}</h5>
                            <p class="card-text"><strong>Carrera:</strong> {{ $user->formAcadem->carrera ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Habilidades Técnicas:</strong> {{ $user->habilidades->habilidades_tecnicas ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Idiomas:</strong> {{ $user->habilidades->idiomas ?? 'N/A' }}</p>
                            <a href="{{ route('vistas.InformacionUsuarioCVS', $user->id) }}" class="btn btn-primary">Mostrar toda la información</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>