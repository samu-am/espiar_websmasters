public function updateDns() {
// Obtén un dominio aleatorio que tenga datos de WHOIS pero no DNS
$domain = Domain::whereNull('dns')->whereNotNull('whois_raw')->inRandomOrder()->first();

// Si se encontró un dominio sin DNS, actualiza los datos de DNS utilizando los datos de WHOIS
if ($domain) {
// Obtén el registro de WHOIS del dominio
$whois = $domain->whois_raw;

// Analiza los datos de WHOIS
$whoisData = \phpWhois::parse($whois);

// Extrae los servidores de nombres del dominio (DNS)
$dns = isset($whoisData['nameservers']) ? implode(',', $whoisData['nameservers']) : '';

// Actualiza los servidores de nombres (DNS) en la base de datos
$domain->dns = $dns;
$domain->save();
}

// Redirige a la página anterior
return redirect()->back();
}