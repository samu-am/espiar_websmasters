<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->text('whois_raw')->nullable()->default(null);
            $table->date('expired_date')->nullable()->default(null);
            $table->string('ip',20)->nullable()->default(null);
            $table->string('dns')->nullable()->default(null);
            $table->string('domain_ip')->nullable()->default(null);
            $table->date('discovered')->nullable()->default(null);
            $table->string('cms_principal')->nullable()->default(null);
            $table->foreignId("analytics_id")->nullable()->constrained();
            $table->foreignId("adsenses_id")->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
