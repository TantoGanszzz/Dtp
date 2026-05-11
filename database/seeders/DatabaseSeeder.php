<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sekolah;
use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::firstOrCreate(
            ['email' => 'admin@alhikmah.sch.id'],
            ['name' => 'Admin', 'password' => Hash::make('admin123'), 'role' => 'admin']
        );

        // Data Sekolah
        Sekolah::firstOrCreate(['jenjang' => 'SMP'], [
            'nama'      => 'SMP Al-Hikmah',
            'profil'    => 'SMP Al-Hikmah adalah sekolah menengah pertama berbasis Islam yang berdiri sejak tahun 1997. Kami mengintegrasikan kurikulum nasional dengan pendidikan agama Islam, tahfidz Al-Quran, dan bahasa Arab-Inggris untuk membentuk generasi yang cerdas dan berakhlak mulia.',
            'fasilitas' => "- Ruang kelas ber-AC\n- Laboratorium IPA\n- Laboratorium Komputer\n- Perpustakaan\n- Masjid\n- Lapangan Olahraga\n- Kantin Sehat\n- Ruang UKS",
            'data_guru' => "Total tenaga pengajar: 35 orang\n- S2: 8 orang\n- S1: 27 orang\nSemua guru bersertifikat pendidik.",
        ]);

        Sekolah::firstOrCreate(['jenjang' => 'SMA'], [
            'nama'      => 'SMA Al-Hikmah',
            'profil'    => 'SMA Al-Hikmah adalah sekolah menengah atas unggulan yang telah meluluskan ribuan alumni yang berhasil masuk ke perguruan tinggi negeri terbaik. Dengan program akademik yang kuat dan pembinaan karakter Islami, kami mempersiapkan siswa untuk menghadapi tantangan global.',
            'fasilitas' => "- Ruang kelas multimedia\n- Laboratorium Fisika, Kimia, Biologi\n- Laboratorium Bahasa\n- Laboratorium Komputer\n- Perpustakaan Digital\n- Masjid\n- Lapangan Futsal & Basket\n- Asrama (opsional)",
            'jurusan'   => "1. IPA (Ilmu Pengetahuan Alam)\n   Fokus: Matematika, Fisika, Kimia, Biologi\n\n2. IPS (Ilmu Pengetahuan Sosial)\n   Fokus: Ekonomi, Geografi, Sosiologi, Sejarah\n\n3. Bahasa\n   Fokus: Bahasa Indonesia, Inggris, Arab, Sastra",
            'data_guru' => "Total tenaga pengajar: 50 orang\n- S3: 3 orang\n- S2: 20 orang\n- S1: 27 orang\nSemua guru bersertifikat pendidik.",
        ]);

        // Sample Berita
        if (Berita::count() == 0) {
            $beritas = [
                ['judul' => 'PPDB 2024/2025 Resmi Dibuka', 'isi' => 'Yayasan Pendidikan Al-Hikmah dengan bangga mengumumkan pembukaan Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2024/2025. Pendaftaran dibuka mulai 1 Januari hingga 31 Maret 2024. Segera daftarkan putra-putri Anda dan raih kesempatan mendapatkan pendidikan berkualitas di lingkungan Islami yang kondusif.'],
                ['judul' => 'Siswa SMA Al-Hikmah Raih Juara Olimpiade Sains', 'isi' => 'Selamat kepada Ahmad Fauzan, siswa kelas XI IPA SMA Al-Hikmah, yang berhasil meraih Juara 1 Olimpiade Sains Nasional bidang Fisika tingkat Provinsi. Prestasi membanggakan ini merupakan bukti nyata kualitas pendidikan di SMA Al-Hikmah.'],
                ['judul' => 'Kegiatan Pesantren Kilat Ramadhan 1445 H', 'isi' => 'Dalam rangka menyambut bulan suci Ramadhan 1445 H, Yayasan Al-Hikmah menyelenggarakan kegiatan Pesantren Kilat selama 10 hari. Kegiatan ini diikuti oleh seluruh siswa SMP dan SMA Al-Hikmah dengan berbagai program seperti tadarus Al-Quran, kajian Islam, dan kegiatan sosial.'],
            ];
            foreach ($beritas as $b) {
                Berita::create(array_merge($b, ['penulis' => 'Admin']));
            }
        }
    }
}
