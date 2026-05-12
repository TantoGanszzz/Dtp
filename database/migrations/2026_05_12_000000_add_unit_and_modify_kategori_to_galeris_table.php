<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Modify kategori enum and add unit column
        DB::statement("ALTER TABLE galeris MODIFY kategori ENUM('kegiatan', 'fasilitas', 'event', 'prestasi') NOT NULL");
        
        Schema::table('galeris', function (Blueprint $table) {
            $table->enum('unit', ['umum', 'smp', 'sma'])->default('umum')->after('kategori');
        });
    }

    public function down(): void
    {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn('unit');
        });
        
        DB::statement("ALTER TABLE galeris MODIFY kategori ENUM('kegiatan', 'fasilitas', 'event') NOT NULL");
    }
};
