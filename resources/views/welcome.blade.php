<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Espiar Webmasters</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>

<body>

    <div class="container m-5">
        <div class="row">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Domini</th>
                    <th>Adsense</th>
                    <th>Google Analytics</th>
                    <th>Whois</th>
                    <th>Data de expiració</th>
                    <th>DNS</th>
                    <th class="d-none">IP</th>
                    <th>Discovered</th>
                    <th>CMS principal</th>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td>{{ $domain->domain }}</td>
                            <td class="text-center">
                                {{ $domain->adense->code ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->analytics->code ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->whois_raw ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->expired_date ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->dns ?? '-' }}
                            </td>
                            <td class="text-center d-none">
                                -
                                <!-- IP -->
                            </td>
                            <td class="text-center">
                                {{ $domain->discovered ?? '-' }}
                            </td>
                            <td class="text-center">
                                {{ $domain->cms_principal ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $domains->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
