<table border="1">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Nivel Educativo</th>
            <th>Institución</th>
            <th>Carrera</th>
            <th>Título</th>
            <th>Certificaciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($usuarios as $usuario)
            @forelse ($usuario->formaciones as $formacion)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $formacion->nivel_educativo }}</td>
                    <td>{{ $formacion->institucion }}</td>
                    <td>{{ $formacion->carrera }}</td>
                    <td>{{ $formacion->titulo }}</td>
                    <td>{{ $formacion->certificaciones }}</td>
                </tr>
            @empty
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td colspan="5">No tiene datos académicos registrados.</td>
                </tr>
            @endforelse
        @empty
            <tr>
                <td colspan="6">No hay usuarios registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
