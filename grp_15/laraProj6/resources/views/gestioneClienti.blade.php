@extends('layouts.gestione')

@section('title','Gestione Clienti')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiCl') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca cliente" name='CercaUtenti-input2' class="CercaUtenti-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
  @if(session('err'))
                    <div id="error-message">{{ session('err') }}</div>
                    <script>
                        setTimeout(function() {
                            var errorMessage = document.getElementById('error-message');
                            if (errorMessage) {
                                errorMessage.style.display = 'none';
                            }
                        }, 3000);
                    </script>
                @endif
    <h1>LISTA CLIENTI</h1>
    @isset($clienti)
    <ul>
        @foreach($clienti as $cliente)
                <li><a href="{{ route('cliente', [$cliente->id]) }}">Cliente: {{ $cliente->NomeUtente }}</a></li>
                <br>
        @endforeach
    </ul>
    @endisset
    <div class="Paginazione">{{ $clienti->links('pagination.paginator') }}</div>
    <br>
    <br>   
@endsection