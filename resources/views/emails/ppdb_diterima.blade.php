<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pemberitahuan Kelulusan PPDB</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; margin: 0; padding: 0; color: #333333; }
        .container { max-width: 600px; margin: 40px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #16a34a, #22c55e); color: white; padding: 30px 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; font-weight: bold; }
        .content { padding: 30px; line-height: 1.6; }
        .content h2 { color: #16a34a; font-size: 20px; margin-top: 0; }
        .details-box { background-color: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; padding: 15px; margin: 20px 0; }
        .details-box p { margin: 5px 0; font-size: 14px; }
        .footer { background-color: #f1f5f9; text-align: center; padding: 20px; font-size: 13px; color: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Yayasan Al-Hidayah</h1>
        </div>
        <div class="content">
            <h2>Selamat, {{ $ppdb->nama_lengkap }}!</h2>
            <p>Kami sangat gembira memberitahukan bahwa Anda telah <strong>DITERIMA</strong> sebagai siswa baru di <strong>{{ $ppdb->pilihan_sekolah }} Unggulan Al-Hidayah</strong> untuk tahun ajaran 2026/2027.</p>
            
            <div class="details-box">
                <p><strong>Nama Lengkap:</strong> {{ $ppdb->nama_lengkap }}</p>
                <p><strong>Pilihan Sekolah:</strong> {{ $ppdb->pilihan_sekolah }}</p>
                <p><strong>No. Pendaftaran:</strong> REG-{{ str_pad($ppdb->id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>

            <p>Langkah selanjutnya, silakan datang ke sekretariat Yayasan Al-Hidayah untuk melakukan proses daftar ulang dengan membawa dokumen fisik asli (Ijazah, Akta Kelahiran, dan KK) selambat-lambatnya 14 hari kerja setelah menerima email ini.</p>
            <p>Jika ada pertanyaan, Anda dapat menghubungi panitia PPDB kami via WhatsApp di nomor 0878-9764-0195.</p>
            
            <p>Terima kasih,<br>Panitia PPDB Al-Hidayah</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Yayasan Pondok Pesantren Al-Hidayah. Semua Hak Dilindungi.</p>
            <p>Jl. Mojosari-Pacet, Kec. Kutorejo, Mojokerto</p>
        </div>
    </div>
</body>
</html>
