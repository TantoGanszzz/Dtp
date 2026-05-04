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
        Schema::table('ppdbs', function (Blueprint $table) {
            $table->string('ijazah')->nullable();
            $table->string('akta_kelahiran')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('kk')->nullable();
            $table->string('surat_sehat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ppdbs', function (Blueprint $table) {
            $table->dropColumn(['ijazah', 'akta_kelahiran', 'pas_foto', 'kk', 'surat_sehat']);
        });
    }
};
