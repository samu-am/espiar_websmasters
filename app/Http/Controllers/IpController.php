<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpController extends Controller
{

    public function ipRequest(): Response
    {
        $domains = Domain::whereNull('ip')->inRandomOrder()->limit(1)->get();
        $domainsParsed = [];
        foreach ($domains as $domain) {
            $domainsParsed['domain'] = $domain['domain'];
        }
        return new Response(json_encode($domainsParsed), 200, ['content-type' => 'application/json']);
    }

    public function ipUpdate(Request $request): Response {

        Domain::where('domain', $request->get('domain'))->update(['ip' => $request->get('ip')]);
        return new Response(json_encode(['status' => 'ip introduida a la base de dades correctament']), 200, ['content-type' => 'application/json']);

    }
}
