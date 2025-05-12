@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <h3>Mis Documentos ({{ $documentos->count() }})</h3>
  <ul class="list-group">
    @forelse($documentos as $doc)
      <li class="list-group-item d-flex align-items-center">
        <img src="{{ asset('storage/'.$doc->perfil) }}" width="50" class="me-3">
        <div>
          <a href="{{ asset('storage/'.$doc->titulo) }}" target="_blank">Ver Título</a><br>
          @if(is_array($doc->certificados))
            Certificados: 
            @foreach($doc->certificados as $cert)
              <a href="{{ asset('storage/'.$cert) }}" target="_blank">[PDF]</a>
            @endforeach
          @endif
        </div>
      </li>
    @empty
      <li class="list-group-item">No hay documentos guardados.</li>
    @endforelse
  </ul>
</div>
@endsection
