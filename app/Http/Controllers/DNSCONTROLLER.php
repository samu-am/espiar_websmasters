<?php

namespace App\Http\Controllers;

use App\Models\Domain;

class DNSCONTROLLER extends Controller
{
    static function updateDns()
    {
        // Consulta un dominio aleatorio que tenga datos "whois_raw" pero sin información "dns"
        $domain = Domain::whereNull('dns')
            ->whereNotNull('whois_raw')
            ->inRandomOrder()
            ->first();

        // Extrae la información DNS del atributo "whois_raw"
        $whois_raw = $domain->whois_raw;
        preg_match('/DNS:(.*?)\n/', $whois_raw, $matches); // Extrae información DNS usando expresión regular
        $dns = $matches[1];

        // Actualiza el atributo "dns" con la información DNS extraída
        $domain->dns = $dns;
        $domain->save();
    }
}
