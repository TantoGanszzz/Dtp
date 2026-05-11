<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yayasan Pondok Pesantren Al-Hidayah')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ═══════════════════════════════════════════
           DESIGN SYSTEM — Al-Hidayah Premium Theme
           ═══════════════════════════════════════════ */

        * { scroll-behavior: smooth; -webkit-font-smoothing: antialiased !important; -moz-osx-font-smoothing: grayscale !important; text-rendering: optimizeLegibility !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; backface-visibility: hidden; }

        /* ── Custom Scrollbar ── */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(180deg, #16a34a, #22c55e); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: linear-gradient(180deg, #15803d, #16a34a); }

        :root {
            --green-primary: #16a34a;
            --green-light: #22c55e;
            --green-bright: #4ade80;
            --green-dark: #14532d;
        }

        /* ── Photo Hero ── */
        .photo-hero { position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed; }
        .photo-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(5,46,22,0.85), rgba(20,83,45,0.75), rgba(22,101,52,0.80)); z-index: 10; }
        .photo-card { position: relative; overflow: hidden; background-size: cover; background-position: center; background-repeat: no-repeat; }
        .photo-card-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.6)); z-index: 10; }

        /* ── Islamic Geometric Pattern Overlay ── */
        .islamic-pattern::before {
            content: '';
            position: absolute;
            inset: 0;
            z-index: 11;
            opacity: 0.04;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* ── Gradients ── */
        .grad-main    { background: linear-gradient(135deg, #14532d 0%, #16a34a 50%, #22c55e 100%); }
        .grad-hero    { background: linear-gradient(135deg, #052e16 0%, #14532d 40%, #166534 100%); }
        .grad-green   { background: linear-gradient(135deg, #16a34a, #22c55e); }
        .grad-smp     { background: linear-gradient(135deg, #1e3a8a, #1d4ed8, #2563eb); }
        .grad-sma     { background: linear-gradient(135deg, #0369a1, #0284c7, #38bdf8); }
        .grad-card    { background: linear-gradient(135deg, #16a34a, #15803d); }
        .grad-footer  { background: linear-gradient(180deg, #0a0a0a 0%, #000000 100%); }
        .gradient-card  { background: linear-gradient(135deg, #16a34a, #15803d); }
        .gradient-green { background: linear-gradient(135deg, #16a34a, #22c55e); }

        /* ── Premium Glass ── */
        .glass { background: rgba(255,255,255,0.08); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255,255,255,0.15); }
        .glass-dark { background: rgba(0,0,0,0.2); backdrop-filter: blur(20px) saturate(180%); -webkit-backdrop-filter: blur(20px) saturate(180%); border: 1px solid rgba(255,255,255,0.08); }

        /* ── Buttons ── */
        .btn-main { background: linear-gradient(135deg, #16a34a, #22c55e); box-shadow: 0 4px 20px rgba(34,197,94,0.4); transition: all .3s cubic-bezier(.4,0,.2,1); position: relative; overflow: hidden; }
        .btn-main:hover { transform: translateY(-3px) scale(1.02); box-shadow: 0 12px 35px rgba(34,197,94,0.5); }
        .btn-main::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-main:hover::after { transform: rotate(45deg) translateX(100%); }
        .btn-outline { border: 2px solid rgba(255,255,255,0.5); transition: all .3s; backdrop-filter: blur(8px); background: rgba(255,255,255,0.05); }
        .btn-outline:hover { background: rgba(255,255,255,0.15); border-color: white; transform: translateY(-2px); }
        .btn-smp { background: linear-gradient(135deg, #1e3a8a, #2563eb); box-shadow: 0 4px 20px rgba(37,99,235,0.4); transition: all .3s; position: relative; overflow: hidden; }
        .btn-smp:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(37,99,235,0.5); }
        .btn-smp::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-smp:hover::after { transform: rotate(45deg) translateX(100%); }
        .btn-sma { background: linear-gradient(135deg, #0369a1, #38bdf8); box-shadow: 0 4px 20px rgba(56,189,248,0.4); transition: all .3s; position: relative; overflow: hidden; }
        .btn-sma:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(56,189,248,0.5); }
        .btn-sma::after { content:''; position:absolute; top:-50%; left:-50%; width:200%; height:200%; background: linear-gradient(transparent, rgba(255,255,255,0.1), transparent); transform: rotate(45deg) translateX(-100%); transition: .6s; }
        .btn-sma:hover::after { transform: rotate(45deg) translateX(100%); }

        /* ── Premium Cards ── */
        .card { transition: all .4s cubic-bezier(.4,0,.2,1); border: 1px solid rgba(0,0,0,0.05); }
        .card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px rgba(0,0,0,0.12); }
        .card-hover { transition: all .35s cubic-bezier(.4,0,.2,1); }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(0,0,0,0.1); }

        /* ── Nav ── */
        .nav-item { position: relative; transition: color .2s; }
        .nav-item::after { content:''; position:absolute; bottom:-4px; left:50%; width:0; height:2.5px; background: linear-gradient(90deg,#16a34a,#22c55e); border-radius:2px; transition: all .3s cubic-bezier(.4,0,.2,1); transform: translateX(-50%); }
        .nav-item:hover::after, .nav-item.active::after { width:100%; }

        /* ── Blob Decorations ── */
        .blob { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }

        /* ── PPDB Ticker ── */
        .ticker { background: linear-gradient(90deg, #052e16, #14532d, #16a34a, #14532d, #052e16); background-size: 300% 100%; animation: ticker 4s linear infinite; color: white !important; -webkit-text-fill-color: white; }
        @keyframes ticker { 0%{background-position:100% 0} 100%{background-position:-100% 0} }

        /* ── Hero Text Fix ── */
        .photo-hero *, .grad-hero * { color: white !important; -webkit-text-fill-color: white; -webkit-font-smoothing: antialiased; }

        /* ── Glow Effects ── */
        .glow-green { box-shadow: 0 0 30px rgba(34,197,94,0.3); }
        .glow-blue  { box-shadow: 0 0 30px rgba(37,99,235,0.3); }

        /* ── Badges ── */
        .badge-green { background: rgba(34,197,94,0.12); color: #16a34a; border: 1px solid rgba(34,197,94,0.25); }
        .badge-blue  { background: rgba(37,99,235,0.08); color: #1d4ed8; border: 1px solid rgba(37,99,235,0.2); }

        /* ── Dot Pulse ── */
        .dot-pulse { width:8px; height:8px; background:#22c55e; border-radius:50%; animation: pulse 2s infinite; box-shadow: 0 0 8px rgba(34,197,94,0.6); }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(1.5)} }

        /* ── Section Label ── */
        .section-label { font-size:.7rem; font-weight:800; letter-spacing:.2em; text-transform:uppercase; color:#16a34a; display: inline-flex; align-items: center; gap: 8px; }
        .section-label::before { content:''; width:20px; height:2px; background: linear-gradient(90deg, #16a34a, #22c55e); border-radius:2px; }

        /* ── Title Decoration ── */
        .title-deco { position:relative; display:inline-block; }
        .title-deco::after { content:''; position:absolute; bottom:-8px; left:0; width:60px; height:4px; background:linear-gradient(90deg,#16a34a,#22c55e); border-radius:99px; }

        /* ── Scroll Reveal Animation ── */
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s cubic-bezier(.4,0,.2,1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* ── Floating Particles ── */
        .particle { position: absolute; border-radius: 50%; pointer-events: none; animation: float-particle linear infinite; }
        @keyframes float-particle {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) rotate(720deg); opacity: 0; }
        }

        /* ── Animated Counter ── */
        .counter { display: inline-block; }

        /* ── Subtle Background Grain ── */
        .bg-grain::after {
            content: '';
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            opacity: 0.015;
            pointer-events: none;
            z-index: 9999;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
        }

        /* ── Section Divider ── */
        .section-divider { position: relative; }
        .section-divider::before { content:''; position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 60px; height: 4px; background: linear-gradient(90deg, transparent, #16a34a, transparent); border-radius: 99px; }

        /* ── 3D Tilt Card ── */
        .tilt-card { transition: transform 0.3s ease, box-shadow 0.3s ease; transform-style: preserve-3d; will-change: transform; }
        .tilt-card:hover { box-shadow: 0 30px 70px rgba(0,0,0,0.15); }

        /* ── Typewriter Cursor ── */
        .typewriter-cursor { display: inline-block; width: 3px; height: 1em; background: #4ade80; margin-left: 3px; vertical-align: middle; animation: blink-cursor 0.75s step-end infinite; border-radius: 2px; }
        @keyframes blink-cursor { 0%,100%{opacity:1} 50%{opacity:0} }

        /* ── Stats Counter Section ── */
        .stats-glass { background: rgba(255,255,255,0.07); backdrop-filter: blur(24px) saturate(180%); -webkit-backdrop-filter: blur(24px) saturate(180%); border: 1px solid rgba(255,255,255,0.13); }
        .stats-number { background: linear-gradient(135deg, #4ade80, #86efac); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }



        /* ── Masonry Gallery ── */
        .masonry-grid { columns: 2; column-gap: 1rem; }
        @media (min-width: 768px) { .masonry-grid { columns: 3; } }
        .masonry-item { break-inside: avoid; margin-bottom: 1rem; }
        .gallery-filter-btn { transition: all 0.3s; }
        .gallery-filter-btn.active { background: #16a34a !important; color: white !important; }

        /* ── Lightbox ── */
        #lightbox { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.92); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(8px); }
        #lightbox.open { display: flex; animation: fadeIn 0.25s ease; }
        #lightbox img { max-width: 90vw; max-height: 85vh; object-fit: contain; border-radius: 12px; box-shadow: 0 30px 80px rgba(0,0,0,0.5); }
        @keyframes fadeIn { from{opacity:0;transform:scale(0.95)} to{opacity:1;transform:scale(1)} }

        /* ── Floating WhatsApp ── */
        .wa-float { position: fixed; bottom: 28px; right: 28px; z-index: 999; }
        .wa-btn { width: 58px; height: 58px; background: linear-gradient(135deg, #25d366, #128c7e); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(37,211,102,0.45); cursor: pointer; transition: all 0.3s cubic-bezier(.4,0,.2,1); position: relative; }
        .wa-btn:hover { transform: scale(1.12) translateY(-3px); box-shadow: 0 16px 40px rgba(37,211,102,0.55); }
        .wa-pulse { position: absolute; inset: -4px; border-radius: 50%; background: rgba(37,211,102,0.35); animation: wa-ping 2s ease-out infinite; }
        @keyframes wa-ping { 0%{transform:scale(1);opacity:0.6} 100%{transform:scale(1.7);opacity:0} }
        .wa-tooltip { position: absolute; bottom: calc(100% + 12px); right: 0; background: white; color: #1f2937; font-size: 12px; font-weight: 700; white-space: nowrap; padding: 8px 14px; border-radius: 10px; box-shadow: 0 8px 24px rgba(0,0,0,0.12); opacity: 0; transform: translateY(6px); transition: all 0.3s; pointer-events: none; }
        .wa-tooltip::after { content:''; position:absolute; bottom:-5px; right:20px; width:10px; height:10px; background:white; transform:rotate(45deg); border-radius:2px; }
        .wa-float:hover .wa-tooltip { opacity: 1; transform: translateY(0); }

        /* ── Keunggulan Numbered Cards ── */
        .keunggulan-num { font-size: 4rem; font-weight: 900; line-height: 1; color: rgba(22,163,74,0.07); position: absolute; top: 12px; right: 16px; letter-spacing: -4px; font-variant-numeric: tabular-nums; transition: color 0.3s; }
        .card:hover .keunggulan-num { color: rgba(22,163,74,0.13); }
        .card:hover .keunggulan-icon { transform: rotate(-8deg) scale(1.15); box-shadow: 0 0 40px rgba(34,197,94,0.5); }
        .keunggulan-icon { transition: all 0.4s cubic-bezier(.4,0,.2,1); }

        /* ── Shimmer effect ── */
        @keyframes shimmer { 0%{background-position:-400px 0} 100%{background-position:400px 0} }
        .shimmer { background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%); background-size: 400px 100%; animation: shimmer 1.5s infinite; }

        /* ── Countdown Timer ── */
        .countdown-box { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.12); backdrop-filter: blur(20px); border-radius: 20px; padding: 20px 16px; text-align: center; min-width: 90px; }
        .countdown-num { font-size: 3rem; font-weight: 900; line-height: 1; background: linear-gradient(135deg, #4ade80, #86efac); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-variant-numeric: tabular-nums; }
        .countdown-label { font-size: 0.65rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; color: rgba(187,247,208,0.7); margin-top: 6px; }
        .countdown-sep { font-size: 2.5rem; font-weight: 900; color: rgba(134,239,172,0.5); align-self: flex-start; padding-top: 14px; }
        @keyframes countdown-pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
        .countdown-sep { animation: countdown-pulse 1s ease-in-out infinite; }

        /* ── Flip Cards 3D ── */
        .flip-card { perspective: 1000px; height: 220px; cursor: pointer; }
        .flip-card-inner { position: relative; width: 100%; height: 100%; transition: transform 0.7s cubic-bezier(.4,0,.2,1); transform-style: preserve-3d; }
        .flip-card:hover .flip-card-inner, .flip-card.flipped .flip-card-inner { transform: rotateY(180deg); }
        .flip-card-front, .flip-card-back { position: absolute; inset: 0; backface-visibility: hidden; -webkit-backface-visibility: hidden; border-radius: 24px; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 28px; }
        .flip-card-front { background: white; border: 1px solid #f3f4f6; }
        .flip-card-back { background: linear-gradient(135deg, #14532d, #16a34a); transform: rotateY(180deg); }
        .flip-card:hover .flip-card-front, .flip-card.flipped .flip-card-front { box-shadow: 0 30px 60px rgba(22,163,74,0.2); }

        /* ── FAQ Accordion ── */
        .faq-item { border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden; transition: border-color 0.3s, box-shadow 0.3s; }
        .faq-item.open { border-color: #86efac; box-shadow: 0 4px 20px rgba(34,197,94,0.08); }
        .faq-btn { width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 20px 24px; background: white; cursor: pointer; gap: 16px; text-align: left; }
        .faq-btn:hover { background: #f0fdf4; }
        .faq-icon { width: 32px; height: 32px; border-radius: 50%; background: #dcfce7; color: #16a34a; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: all 0.3s; }
        .faq-item.open .faq-icon { background: #16a34a; color: white; transform: rotate(45deg); }
        .faq-body { max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(.4,0,.2,1), padding 0.3s; }
        .faq-body.open { max-height: 300px; }
        .faq-body-inner { padding: 0 24px 20px; color: #6b7280; line-height: 1.7; font-size: 0.9rem; }

        /* ── Timeline Sejarah ── */
        .timeline { position: relative; }
        .timeline::before { content:''; position:absolute; left: 50%; top:0; bottom:0; width: 2px; background: linear-gradient(180deg, transparent, #16a34a 5%, #16a34a 95%, transparent); transform: translateX(-50%); }
        @media(max-width:767px) { .timeline::before { left: 24px; } }
        .timeline-item { display: flex; gap: 0; margin-bottom: 48px; position: relative; }
        .timeline-item:nth-child(odd) { flex-direction: row; }
        .timeline-item:nth-child(even) { flex-direction: row-reverse; }
        @media(max-width:767px) { .timeline-item, .timeline-item:nth-child(even) { flex-direction: row; padding-left: 60px; } }
        .timeline-content { width: calc(50% - 36px); }
        @media(max-width:767px) { .timeline-content { width: 100%; } }
        .timeline-item:nth-child(odd) .timeline-content { text-align: right; padding-right: 32px; }
        .timeline-item:nth-child(even) .timeline-content { text-align: left; padding-left: 32px; }
        @media(max-width:767px) { .timeline-item:nth-child(odd) .timeline-content, .timeline-item:nth-child(even) .timeline-content { text-align: left; padding-left: 0; padding-right: 0; } }
        .timeline-dot { position: absolute; left: 50%; top: 16px; transform: translateX(-50%); width: 44px; height: 44px; border-radius: 50%; background: white; border: 3px solid #e5e7eb; display: flex; align-items: center; justify-content: center; z-index: 10; transition: all 0.4s; flex-shrink: 0; }
        @media(max-width:767px) { .timeline-dot { left: 4px; transform: none; } }
        .timeline-item.visible .timeline-dot { background: #16a34a; border-color: #16a34a; box-shadow: 0 0 0 6px rgba(22,163,74,0.15); }
        .timeline-card { background: white; border: 1px solid #e5e7eb; border-radius: 20px; padding: 20px 24px; transition: all 0.4s; opacity: 0; transform: translateY(20px); }
        .timeline-item.visible .timeline-card { opacity: 1; transform: translateY(0); box-shadow: 0 8px 30px rgba(0,0,0,0.07); border-color: #bbf7d0; }
        .timeline-year { display: inline-block; background: linear-gradient(135deg, #16a34a, #22c55e); color: white; font-size: 0.75rem; font-weight: 800; padding: 3px 12px; border-radius: 99px; margin-bottom: 8px; letter-spacing: 0.05em; }

        /* ── Active Sidebar ── */
        .sidebar-link { display: flex; align-items: center; gap: 12px; padding: 12px 16px; border-radius: 14px; color: #6b7280; font-weight: 600; font-size: 0.875rem; transition: all 0.3s cubic-bezier(.4,0,.2,1); border: 1px solid transparent; background: transparent; }
        .sidebar-link:hover { background: white; color: #15803d; border-color: #bbf7d0; box-shadow: 0 4px 15px rgba(34,197,94,0.05); transform: translateX(4px); }
        .sidebar-link.active { background: linear-gradient(135deg, #16a34a, #22c55e); color: white; border-color: transparent; box-shadow: 0 8px 20px rgba(22,163,74,0.25); }
        .sidebar-link i { width: 20px; color: #9ca3af; transition: color 0.3s; text-align: center; }
        .sidebar-link:hover i { color: #16a34a; }
        .sidebar-link.active i { color: white; }
    </style>
</head>
<body class="bg-gray-50 antialiased">

{{-- PPDB Ticker --}}
<div class="ticker text-white text-center py-2 text-xs font-bold tracking-widest uppercase">
    🎓 &nbsp; PPSB 2026/2027 Resmi Dibuka — Daftarkan Putra-Putri Anda Sekarang &nbsp;
    <a href="{{ route('ppdb') }}" class="underline underline-offset-2 hover:text-green-200 transition-colors">Daftar di sini →</a>
    &nbsp; 🎓
</div>

{{-- Navbar --}}
<nav class="bg-white/80 backdrop-blur-2xl sticky top-0 z-50 border-b border-gray-100/80 shadow-[0_4px_30px_rgba(0,0,0,0.06)]" id="mainNav">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-[4.5rem]">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center overflow-hidden shadow-md group-hover:scale-105 transition-transform bg-white">
                    <img src="{{ asset('logo.jpg') }}" alt="Logo Yayasan" class="w-full h-full object-cover">
                </div>
                <div class="leading-tight">
                    <div class="font-extrabold text-gray-900 text-sm">Yayasan Pondok Pesantren Al-Hidayah</div>
                    <div class="text-xs font-semibold text-green-600">Pendidikan Islami Unggulan</div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-7">
                <a href="{{ route('home') }}"     class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Beranda</a>
                <a href="{{ route('profil') }}"   class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Profil</a>
                <div class="relative group">
                    <button class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700 flex items-center gap-1">
                        Sekolah <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-52 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 translate-y-1 group-hover:translate-y-0">
                        <a href="{{ route('sekolah.smp') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-green-50 transition-colors group/item">
                            <div class="w-8 h-8 grad-smp rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-school text-white text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-800 group-hover/item:text-blue-700">SMP Unggulan Al-Hidayah</div>
                                <div class="text-xs text-gray-400">Menengah Pertama</div>
                            </div>
                        </a>
                        <a href="{{ route('sekolah.sma') }}" class="flex items-center gap-3 px-4 py-3 hover:bg-green-50 transition-colors group/item">
                            <div class="w-8 h-8 grad-sma rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-university text-white text-xs"></i>
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-800 group-hover/item:text-sky-600">SMA Unggulan Al-Hidayah</div>
                                <div class="text-xs text-gray-400">Menengah Atas</div>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="{{ route('galeri') }}"   class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Galeri</a>
                <a href="{{ route('kontak') }}"   class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Kontak</a>

                @auth
                    {{-- User sudah login: tampilkan tombol PPSB (jika role user) + dropdown profil --}}
                    @if(auth()->user()->isUser())
                        <a href="{{ route('ppdb') }}" class="btn-main text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                            <i class="fas fa-pen-to-square text-xs"></i> Daftar PPSB
                        </a>
                    @endif
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-sm font-semibold text-gray-600 hover:text-green-700">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-green-600 text-xs"></i>
                            </div>
                            {{ auth()->user()->name }}
                            <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute top-full right-0 mt-3 w-52 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 translate-y-1 group-hover:translate-y-0">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</div>
                                <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
                            </div>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-blue-600 hover:bg-blue-50 font-semibold transition-colors">
                                    <i class="fas fa-gauge text-xs w-4"></i>Dashboard Admin
                                </a>
                            @endif
                            <a href="{{ route('profil.akun') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-600 hover:bg-green-50 hover:text-green-700 font-semibold transition-colors">
                                <i class="fas fa-id-card text-xs w-4"></i>Profil Saya
                            </a>
                            @if(auth()->user()->isUser())
                            <a href="{{ route('ppdb.riwayat') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-600 hover:bg-green-50 hover:text-green-700 font-semibold transition-colors">
                                <i class="fas fa-clipboard-list text-xs w-4"></i>Riwayat PPSB
                            </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 font-semibold transition-colors">
                                    <i class="fas fa-right-from-bracket text-xs w-4"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Belum login: tampilkan Login & Daftar --}}
                    <a href="{{ route('login') }}" class="nav-item text-sm font-semibold text-gray-600 hover:text-green-700">Login</a>
                    <a href="{{ route('register') }}" class="btn-main text-white px-5 py-2.5 rounded-xl font-bold text-sm inline-flex items-center gap-2">
                        <i class="fas fa-pen-to-square text-xs"></i> Daftar PPSB
                    </a>
                @endauth
            </div>

            {{-- Mobile Toggle --}}
            <button id="mobileToggle" class="lg:hidden w-9 h-9 flex items-center justify-center rounded-xl bg-gray-100 hover:bg-green-50 transition-colors">
                <i class="fas fa-bars text-gray-700 text-sm"></i>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden lg:hidden border-t border-gray-100 bg-white">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}"       class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Beranda</a>
            <a href="{{ route('profil') }}"     class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Profil</a>
            <a href="{{ route('sekolah.smp') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-blue-50 hover:text-blue-700 font-semibold text-sm transition-colors"><i class="fas fa-school text-blue-500 w-4"></i>SMP Al-Hikmah</a>
            <a href="{{ route('sekolah.sma') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-sky-50 hover:text-sky-600 font-semibold text-sm transition-colors"><i class="fas fa-university text-sky-500 w-4"></i>SMA Al-Hikmah</a>
            <a href="{{ route('galeri') }}"     class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Galeri</a>
            <a href="{{ route('kontak') }}"     class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">Kontak</a>

            @auth
                {{-- Info user --}}
                <div class="px-3 py-2.5 mt-2 bg-green-50 rounded-xl">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center"><i class="fas fa-user text-green-600 text-xs"></i></div>
                        <div>
                            <div class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('profil.akun') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">
                    <i class="fas fa-id-card text-green-500 w-4"></i>Profil Saya
                </a>
                @if(auth()->user()->isUser())
                <a href="{{ route('ppdb.riwayat') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors">
                    <i class="fas fa-clipboard-list text-green-500 w-4"></i>Riwayat PPSB
                </a>
                @endif
                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-blue-600 hover:bg-blue-50 font-semibold text-sm transition-colors">
                    <i class="fas fa-gauge w-4"></i>Dashboard Admin
                </a>
                @endif
                @if(auth()->user()->isUser())
                <a href="{{ route('ppdb') }}" class="btn-main text-white px-4 py-2.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 mt-1">
                    <i class="fas fa-pen-to-square text-xs"></i>Daftar PPSB
                </a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-red-500 hover:bg-red-50 font-semibold text-sm transition-colors">
                        <i class="fas fa-right-from-bracket text-xs"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-gray-700 hover:bg-green-50 hover:text-green-700 font-semibold text-sm transition-colors mt-1">
                    <i class="fas fa-sign-in-alt text-green-500 w-4"></i>Login
                </a>
                <a href="{{ route('register') }}" class="btn-main text-white px-4 py-2.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 mt-2">
                    <i class="fas fa-pen-to-square text-xs"></i>Daftar PPSB
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- Flash --}}
@if(session('success'))
<div id="toast-success" class="fixed top-24 right-4 z-[100] animate-[bounce_1s_ease-in-out]">
    <div class="bg-white border-l-4 border-green-500 shadow-2xl px-6 py-4 rounded-xl flex items-start gap-4 max-w-sm">
        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
            <i class="fas fa-check text-green-600"></i>
        </div>
        <div>
            <h4 class="text-gray-900 font-extrabold text-sm">Pendaftaran Berhasil!</h4>
            <p class="text-gray-600 text-sm mt-1 leading-relaxed">{{ session('success') }}</p>
        </div>
        <button onclick="document.getElementById('toast-success').remove()" class="text-gray-400 hover:text-gray-600 transition-colors ml-2 mt-0.5"><i class="fas fa-xmark"></i></button>
    </div>
</div>
<script>
    setTimeout(() => {
        const toast = document.getElementById('toast-success');
        if(toast) {
            toast.style.transition = 'opacity 0.5s ease';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 500);
        }
    }, 5000);
</script>
@endif

@yield('content')

{{-- Footer --}}
<footer class="grad-footer text-white mt-20 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-green-500/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-green-400/5 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 pt-16 pb-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">

            {{-- Brand --}}
            <div class="md:col-span-4">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg overflow-hidden bg-white">
                        <img src="{{ asset('logo.jpg') }}" alt="Logo Yayasan" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="font-extrabold text-white">Yayasan Pondok Pesantren Al-Hidayah</div>
                        <div class="text-green-400 text-xs font-semibold">Pendidikan Islami Unggulan</div>
                    </div>
                </div>
                <p class="text-green-200/70 text-sm leading-relaxed mb-6">Mendidik generasi bangsa yang cerdas, berakhlak mulia, dan berdaya saing global sejak 2002.</p>
                <div class="flex gap-2">
                    <a href="https://facebook.com" class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-sm transition-all hover:scale-110 hover:shadow-lg" style="background:#1877f240; border:1px solid #1877f260">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com" class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-sm transition-all hover:scale-110 hover:shadow-lg" style="background:#e4405f40; border:1px solid #e4405f60">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com" class="w-9 h-9 rounded-xl flex items-center justify-center text-white text-sm transition-all hover:scale-110 hover:shadow-lg" style="background:#ff000040; border:1px solid #ff000060">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            {{-- Links --}}
            <div class="md:col-span-2">
                <h4 class="font-bold text-white text-sm mb-4 uppercase tracking-wider">Halaman</h4>
                <ul class="space-y-2.5">
                    @foreach([['home','Beranda'],['profil','Profil'],['galeri','Galeri'],['kontak','Kontak']] as $l)
                    <li><a href="{{ route($l[0]) }}" class="text-green-200/70 hover:text-white text-sm transition-colors flex items-center gap-2 group">
                        <i class="fas fa-chevron-right text-xs text-green-500 group-hover:translate-x-1 transition-transform"></i>{{ $l[1] }}
                    </a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Sekolah --}}
            <div class="md:col-span-3">
                <h4 class="font-bold text-white text-sm mb-4 uppercase tracking-wider">Unit Sekolah</h4>
                <div class="space-y-3">
                    <a href="{{ route('sekolah.smp') }}" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition-colors border border-white/10">
                        <div class="w-8 h-8 grad-smp rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-school text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-white text-sm font-bold">SMP Unggulan Al-Hidayah</div>
                            <div class="text-green-300/60 text-xs">Menengah Pertama</div>
                        </div>
                    </a>
                    <a href="{{ route('sekolah.sma') }}" class="flex items-center gap-3 p-3 rounded-xl bg-white/5 hover:bg-white/10 transition-colors border border-white/10">
                        <div class="w-8 h-8 grad-sma rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-university text-white text-xs"></i>
                        </div>
                        <div>
                            <div class="text-white text-sm font-bold">SMA Unggulan Al-Hidayah</div>
                            <div class="text-green-300/60 text-xs">Menengah Atas</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Kontak --}}
            <div class="md:col-span-3">
                <h4 class="font-bold text-white text-sm mb-4 uppercase tracking-wider">Kontak</h4>
                <ul class="space-y-3">
                    @foreach([
                        ['fas fa-location-dot','Jl. Mojosari-Pacet, Gg. Mbah Gepuk,Dsn. Kedung Rejo, Ds. Simbaringin, kec. Kutorejo, Kab. Mojokerto, Jawa Timur 61392'],
                        ['fas fa-phone','(021) 1234-5678'],
                        ['fab fa-whatsapp','0878-9764-0195'],
                        ['fas fa-envelope','info@alhidayah.sch.id'],
                    ] as $k)
                    <li class="flex items-start gap-3 text-sm text-green-200/70">
                        <i class="{{ $k[0] }} text-green-400 mt-0.5 w-4 text-center flex-shrink-0"></i>{{ $k[1] }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center gap-3">
            <p class="text-green-300/50 text-xs">© {{ date('Y') }} Yayasan Pondok Pesantren Al-Hidayah. Hak cipta dilindungi.</p>
            <a href="{{ route('login') }}" class="text-green-300/40 hover:text-green-300/70 text-xs transition-colors flex items-center gap-1">
                <i class="fas fa-lock text-xs"></i> Admin
            </a>
        </div>
    </div>
</footer>

{{-- Floating WhatsApp --}}
<div class="wa-float">
    <a href="https://wa.me/6287897640195?text=Assalamualaikum,%20saya%20ingin%20bertanya%20tentang%20PPSB%20Al-Hidayah" target="_blank" class="wa-btn" id="waBtn">
        <span class="wa-pulse"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
    <div class="wa-tooltip">💬 Chat dengan Kami</div>
</div>

<div id="lightbox" onclick="closeLightbox()">
    <button onclick="closeLightbox()" style="position:absolute;top:20px;right:24px;color:white;font-size:2rem;background:none;border:none;cursor:pointer;line-height:1;">×</button>
    <img id="lightboxImg" src="" alt="">
</div>

<script>
    // Mobile menu toggle
    document.getElementById('mobileToggle').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // Scroll Reveal Animation
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    revealElements.forEach(el => revealObserver.observe(el));

    // Animated Counter
    const counters = document.querySelectorAll('[data-count]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.count);
                const suffix = el.dataset.suffix || '';
                const duration = 2000;
                const start = performance.now();
                function update(now) {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(target * eased) + suffix;
                    if (progress < 1) requestAnimationFrame(update);
                }
                requestAnimationFrame(update);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.3 });
    counters.forEach(el => counterObserver.observe(el));

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('mainNav');
        if (nav) {
            if (window.scrollY > 50) {
                nav.classList.add('shadow-lg');
                nav.classList.remove('shadow-[0_4px_30px_rgba(0,0,0,0.06)]');
            } else {
                nav.classList.remove('shadow-lg');
                nav.classList.add('shadow-[0_4px_30px_rgba(0,0,0,0.06)]');
            }
        }
    });

    // 3D Tilt Effect
    document.querySelectorAll('.tilt-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const cx = rect.width / 2;
            const cy = rect.height / 2;
            const rotateX = ((y - cy) / cy) * -7;
            const rotateY = ((x - cx) / cx) * 7;
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
        });
    });

    // Lightbox
    function openLightbox(src, alt) {
        document.getElementById('lightboxImg').src = src;
        document.getElementById('lightboxImg').alt = alt || '';
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', e => { if(e.key === 'Escape') closeLightbox(); });


    // Typewriter Effect
    (function() {
        const el = document.getElementById('typewriterText');
        if (!el) return;
        const words = ['Cerdas & Berakhlak', 'Hafidz Al-Qur\'an', 'Siap Bersaing Global', 'Berkarakter Islami'];
        let wi = 0, ci = 0, deleting = false;
        function type() {
            const word = words[wi];
            el.textContent = deleting ? word.substring(0, ci--) : word.substring(0, ci++);
            let delay = deleting ? 60 : 100;
            if (!deleting && ci === word.length + 1) { delay = 2000; deleting = true; }
            else if (deleting && ci === 0) { deleting = false; wi = (wi + 1) % words.length; delay = 400; }
            setTimeout(type, delay);
        }
        type();
    })();

    // Countdown Timer
    (function() {
        const cdEl = document.getElementById('countdownTimer');
        if (!cdEl) return;
        const deadline = new Date('2026-06-30T23:59:59').getTime();
        function pad(n) { return String(n).padStart(2, '0'); }
        function tick() {
            const now = Date.now();
            const diff = deadline - now;
            if (diff <= 0) {
                cdEl.innerHTML = '<span class="text-green-300 font-bold text-lg">Pendaftaran telah ditutup</span>';
                return;
            }
            const d = Math.floor(diff / 86400000);
            const h = Math.floor((diff % 86400000) / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);
            document.getElementById('cd-days').textContent = pad(d);
            document.getElementById('cd-hours').textContent = pad(h);
            document.getElementById('cd-mins').textContent = pad(m);
            document.getElementById('cd-secs').textContent = pad(s);
        }
        tick();
        setInterval(tick, 1000);
    })();

    // FAQ Accordion
    document.querySelectorAll('.faq-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.faq-item');
            const body = item.querySelector('.faq-body');
            const isOpen = item.classList.contains('open');
            // Close all
            document.querySelectorAll('.faq-item.open').forEach(el => {
                el.classList.remove('open');
                el.querySelector('.faq-body').classList.remove('open');
            });
            if (!isOpen) {
                item.classList.add('open');
                body.classList.add('open');
            }
        });
    });

    // Timeline IntersectionObserver
    const timelineItems = document.querySelectorAll('.timeline-item');
    if (timelineItems.length) {
        const tlObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    tlObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.25 });
        timelineItems.forEach(el => tlObserver.observe(el));
    }

    // Profil Sidebar Active Highlight
    (function() {
        const links = document.querySelectorAll('.sidebar-link[href^="#"]');
        if (!links.length) return;
        const sections = Array.from(links).map(l => document.querySelector(l.getAttribute('href'))).filter(Boolean);
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    links.forEach(l => l.classList.remove('active'));
                    const active = document.querySelector(`.sidebar-link[href="#${entry.target.id}"]`);
                    if (active) active.classList.add('active');
                }
            });
        }, { rootMargin: '-20% 0px -60% 0px' });
        sections.forEach(s => obs.observe(s));
    })();
</script>
</body>
</html>
