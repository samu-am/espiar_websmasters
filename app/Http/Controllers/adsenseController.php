<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Symfony\Component\HttpFoundation\Response;

class AdsenseController extends Controller
{
    public function getAdsense() {
        $domain = Domain::select("domain")->whereNull('adsenses_id')->inRandomOrder()->first();

        return new Response(json_encode($domain), 200, ['content-type' => 'application/json']);
    }

    public function setAdsense() {
        
    }
}
