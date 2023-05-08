<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WPpluginController extends Controller
{
    public function getPlugin() {

        $domain = Domain::select("domain")->whereNull('domain')->inRandomOrder()->first();

        return new Response(json_encode($domain), 200, ['content-type' => 'application/json']);
    }

    public function setPlugin(Request $request): Response {

        $validatedData = $request->validate([
            'domain' => 'required|String',
            'cms' => 'required|String',
            'theme' => 'required|String',
            'plugins' => 'required|String'
        ]);
            
      
        if ($request->get('domain') !== null && $request->get('cms') !== null) {
            Domain::where('domain', $request->get('domain'))->update(['cms_principal' => $request->get('cms') + ", " + $request->get('theme') + $request->get('plugins') ]);
            return new Response(json_encode(['status' => 'Datos añadidos correctamente']), 200, ['content-type' => 'application/json']);
        }
  
        return new Response(json_encode(['status' => "Algún dato no es correcto"]), 400, ['content-type' => 'application/json']);
    
    }
}
