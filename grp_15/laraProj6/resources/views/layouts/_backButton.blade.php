<button onclick="goBack()" class="back-button">
    <span class="arrow">&larr;</span>
</button>

<script>
    function goBack() {
        
        if({!! Route::is('modificaoperatore') ? 'true' : 'false' !!}) window.location.href="{{route('showOperatore')}}";
        if({!! Route::is('modificaAzienda') ? 'true' : 'false' !!}) window.location.href="{{route('gestioneAziende')}}";
        if({!! Route::is('modificapromo') ? 'true' : 'false' !!}) window.location.href="{{route('showPromozione')}}";
        
        
    }
</script>