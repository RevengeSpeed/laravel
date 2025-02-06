<table border="1">
    <thead>
        <tr>
            <th>Nivel Educativo</th>
            <th>Institución</th>
            <th>Carrera</th>
            <th>Título</th>
            <th>Certificaciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($datos as $dato)
            <tr>
                <td>{{ $dato->nivel_educativo }}</td>
                <td>{{ $dato->institucion }}</td>
                <td>{{ $dato->carrera }}</td>
                <td>{{ $dato->titulo }}</td>
                <td>{{ $dato->certificaciones }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay datos disponibles.</td>
            </tr>
        @endforelse
    </tbody>
</table>
