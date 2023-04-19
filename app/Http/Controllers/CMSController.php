<?php

namespace App\Http\Controllers;

use App\Models\Domain;
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
}
