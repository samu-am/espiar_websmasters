<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WPCMSController extends Controller
{
    public function getWordpressVersion(Request $request) {

        $domain = $request->input('url');
        $client = new Client();
        $response = $client->get($domain);
        $body = $response->getBody();

        if (strpos($body, 'wp-content') !== false) {

            if (preg_match('/wp-(?:\d+\.)?(?:\d+\.)?(?:\*|\d+)/', $body, $matches)) {
                $version = $matches[0];
                $this->setWPVersion($domain, $version);
                return response($version);
            } else {
                $this->setWP($domain);
                return response("No se pudo determinar la versión de WordPress");
            }

        } else {
            return response("La página no está hecha con WordPress");
        }
    }

    public function setWPVersion($domain, $version) {
        Domain::where('domain', $domain)->update(['cms_principal', 'WP: ' . $version]);
    }

    public function setWP($domain) {
        Domain::where('domain', $domain)->update(['cms_principal', 'WP']);
    }
}
