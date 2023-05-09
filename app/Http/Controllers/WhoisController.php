<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WhoisController extends Controller
{
    public function getWhois(): Response
    {
        $domain = Domain::select("domain")->whereNull('whois_raw')->inRandomOrder()->first();
        return new Response(json_encode($domain), 200, ['content-type' => 'application/json']);
    }

    public function setWhois(Request $request): Response
    {
        $domain = $request->get('domain');
        $whois = $request->get('whois_raw');

        if ($domain === null || $whois === null) {
            return new Response(json_encode(['status' => "Algún dato no es correcto"]), 400, ['content-type' => 'application/json']);
        }

        Domain::where('domain', $domain)->update(['whois_raw' => $whois]);
        ExpireDateController::updateExpireDate($domain); // Llama a la función updateExpireDate
        return new Response(json_encode(['status' => 'Datos añadidos correctamente']), 200, ['content-type' => 'application/json']);
    }
}
