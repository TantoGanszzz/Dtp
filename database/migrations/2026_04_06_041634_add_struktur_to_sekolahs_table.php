<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            $table->text('struktur_organisasi')->nullable()->after('data_guru');
            $table->string('foto_struktur')->nullable()->after('struktur_organisasi');
        });
    }

    public function down(): void
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            $table->dropColumn(['struktur_organisasi', 'foto_struktur']);
        });
    }
};
