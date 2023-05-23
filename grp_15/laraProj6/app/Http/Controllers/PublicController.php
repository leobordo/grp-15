<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\UtenteLivello1;
use App\Models\UtenteLivello2;
use Illuminate\Support\Facades\Log;


class PublicController extends Controller
{
    public function showFaq(){
        return view("faq");
    }
    
}