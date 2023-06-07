@if ($paginator->lastPage() != 1)
<div id="pagination" style="display: inline-block; width:100%">

    <div style="display: inline-block; margin-inline-start:0">
    <!-- Link alla prima pagina -->
    @if (!$paginator->onFirstPage())
        <a href="{{ $paginator->url(1) }}">Inizio</a> |
    @else
        Inizio |
    @endif

    <!-- Link alla pagina precedente -->
    @if ($paginator->currentPage() != 1)
        <a href="{{ $paginator->previousPageUrl() }}"><img src="./images/freccia_sinistra.png" height="30px" width="30px"></img> </a> |
    @else
    <img src="./images/freccia_sinistra.png" height="30px" width="30px"></img>  |
    @endif
    </div>
    <div style="margin-inline-end:0">
    <!-- Link alla pagina successiva -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"><img src="./images/freccia_destra.png" height="30px" width="30px"></img></a> |
    @else
    <img src="./images/freccia_destra.png" height="30px" width="30px"></img> |
    @endif

    <!-- Link all'ultima pagina -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->url($paginator->lastPage()) }}">Fine</a>
    @else
        Fine
    @endif
    </div>
    <div>
    {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} di {{ $paginator->total() }}
    </div>
</div>
</div>
@endif
@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();

    // Verifica se il numero di pagina è valido
    if ($currentPage > $lastPage) {
        // Ottieni l'URL della pagina finale
        $lastPageUrl = $paginator->url($lastPage);

        // Reindirizza all'URL della home
        header("Location: $lastPageUrl", true, 302);
        exit();
    }
@endphp
