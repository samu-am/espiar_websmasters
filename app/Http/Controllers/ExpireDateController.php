<?php

namespace App\Http\Controllers;

use App\Models\Domain;

class ExpireDateController extends Controller
{
    static function updateExpireDate()
    {
        // Consulta un dominio aleatorio que tenga datos "whois_raw" pero sin información "dns"
        $domain = Domain::whereNull('expired_date')
            ->whereNotNull('whois_raw')
            ->inRandomOrder()
            ->first();

        // Obtener la fecha de expiración del atributo "expired_date"
        $expired_date = $domain->expired_date;

        // Actualiza el atributo "expired_date" con la fecha de expiración extraída
        $domain->expired_date = $expired_date;
        $domain->save();
    }
}
