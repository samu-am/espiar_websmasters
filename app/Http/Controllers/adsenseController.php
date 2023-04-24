<?php

namespace App\Http\Controllers;

use App\Models\Adsense;
use Symfony\Component\HttpFoundation\Response;

class adsenseController extends Controller
{
    public function getAdsense() {
        $domains = Adsense::select("domain")->get();
        $domainsParsed = [];
        foreach ($domains as $domain) {
            $domainsParsed[] = $domain['domain'];
        }
        return new Response(json_encode($domainsParsed), 200, ['content-type' => 'application/json']);
    }

    public function setAdsense() {
        
    }
}
