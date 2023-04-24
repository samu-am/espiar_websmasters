<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CMSController extends Controller
{
    /**
     * @param int $number
     * @return Response
     */
    public function getDomains(int $number): Response
    {
        $domains = Domain::select("domain")->whereNull('cms_principal')->limit($number)->get();
        $domainsParsed = [];
        foreach ($domains as $domain) {
            $domainsParsed[] = $domain['domain'];
        }
        return new Response(json_encode($domainsParsed), 200, ['content-type' => 'application/json']);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function setCMSName(Request $request): Response
    {
        if ($request->get('domain') !== null && $request->get('cms') !== null) {
            Domain::where('domain', $request->get('domain'))->update(['cms_principal' => $request->get('cms')]);
            return new Response(json_encode(['status' => 'Datos añadidos correctamente']), 200, ['content-type' => 'application/json']);
        }
        return new Response(json_encode(['status' => "Algún dato no es correcto"]), 400, ['content-type' => 'application/json']);
    }

}
