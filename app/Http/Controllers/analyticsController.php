<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use Illuminate\Http\Request;
use App\Models\Domain;
use Symfony\Component\HttpFoundation\Response;

class analyticsController extends Controller
{
    public function analyticsRequest()
    {
        $domain = Domain::select("domain")->whereNull('analytics_id')->inRandomOrder()->first();

        return new Response(json_encode($domain), 200, ['content-type' => 'application/json']);
    }

    public function analyticsUpdate(Request $request): Response {

        $validatedData = $request->validate([
            'domain' => 'required|String',
            'adsense_code' => 'required|String'
        ]);

        $analytic = Analytic::firstOrCreate(['code' => $request->get('adsense_code')]);
        // dd($adsense);
        Domain::where('domain', $request->get('domain'))->update(['analytics_id' => $analytic->id]);

        return new Response(json_encode(['status' => 'OK']), 200, ['content-type' => 'application/json']);

    }
}
