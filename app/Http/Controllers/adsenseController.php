<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Adsense;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdsenseController extends Controller
{
    public function getAdsense() {
        $domain = Domain::select("domain")->whereNull('adsenses_id')->inRandomOrder()->first();

        return new Response(json_encode($domain), 200, ['content-type' => 'application/json']);
    }

    public function setAdsense(Request $request): Response {

        if ($request->get('domain') !== null && $request->get('adsense_code') !== null) {
            
            $adsense = Adsense::firstOrCreate(['code' => $request->get('adsense_code')]);
            // dd($adsense);
            Domain::where('domain', $request->get('domain'))->update(['adsenses_id' => $adsense->id]);

            return new Response(json_encode(['status' => 'OK']), 200, ['content-type' => 'application/json']);
        }
        return new Response(json_encode(['status' => "KO"]), 400, ['content-type' => 'application/json']);
    
    }
}
