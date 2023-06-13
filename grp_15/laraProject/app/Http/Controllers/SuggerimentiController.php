<?php
namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;

class SuggerimentiController extends Controller
{
    
    public function getSuggerimentiAz(Request $request)
    {
        
        $term = $request->input('term');

        // Esegui la query per recuperare i suggerimenti
        $suggerimenti = Azienda::where('Nome', 'LIKE', '%'.$term.'%')->pluck('Nome');

        return $suggerimenti;
    }
}