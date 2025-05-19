{{-- filepath: resources/vistas/InformacionUsuarioPracticas.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del practicante - {{ $practica->nombre }} {{ $practica->apellidos }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 700px; margin: auto; }
        .card { box-shadow: 0 4px 8px rgba(0,0,0,0.1); border: none; border-radius: 10px; }
        .card-body { padding: 2rem; }
        .card-title { font-size: 1.8rem; font-weight: 600; margin-bottom: 1rem; }
        .card-text strong { display: inline-block; width: 180px; color: #495057; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Información del practicante</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $practica->nombre }} {{ $practica->apellidos }}</h5>
                <p class="card-text"><strong>Fecha de inicio en la universidad:</strong> {{ $practica->fecha_inicio_universidad }}</p>
                <p class="card-text"><strong>¿Tiene materias reprobadas?:</strong> {{ $practica->tiene_reprobadas ? 'Sí' : 'No' }}</p>
                @if(isset($practica->cantidad_reprobadas))
                    <p class="card-text"><strong>Cantidad de reprobadas:</strong> {{ $practica->cantidad_reprobadas }}</p>
                @endif
                @if(!empty($practica->cualidades))
                    <p class="card-text"><strong>Cualidades:</strong> {{ $practica->cualidades }}</p>
                @endif
                @if(!empty($practica->lenguajes_programacion))
                    <p class="card-text"><strong>Lenguajes de programación:</strong>
                        @if(is_array($practica->lenguajes_programacion))
                            {{ implode(', ', $practica->lenguajes_programacion) }}
                        @else
                            {{ $practica->lenguajes_programacion }}
                        @endif
                    </p>
                @endif
                @if(!empty($practica->certificados))
                    <p class="card-text"><strong>Certificados:</strong>
                        @php
                            $certificados = is_array($practica->certificados) ? $practica->certificados : json_decode($practica->certificados, true);
                        @endphp
                        @if(is_array($certificados))
                            <ul>
                                @foreach($certificados as $cert)
                                    <li>
                                        <a href="{{ asset('storage/' . $cert) }}" target="_blank">Ver certificado</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            {{ $practica->certificados }}
                        @endif
                    </p>
                @endif
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>