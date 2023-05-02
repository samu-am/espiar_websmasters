<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'whois_raw',
        'expired_date',
        'dns',
        'domain_ip',
        'ip',
        'discovered',
        'cms_principal',
        'analytics_id',
        'adsenses_id',
    ];

    public function filter($q, $data)
    {
    }

    public function analytic()
    {
        return $this->belongsTo(Analytic::class);
    }

    public function adsense()
    {
        return $this->belongsTo(Adsense::class);
    }
}
