# TODO: Add All Galeri Photos as Seamless Backgrounds (Random Selection)

## Approved Plan Summary
- Use random galeri photos for backgrounds in hero sections and cards.
- Add to: home, sekolah/smp, sekolah/sma, profil, kontak, ppdb pages.
- Seamless blend: background-image + dark overlay (bg-black/40-70) + keep readability.
- Update controllers to pass $galeris (already in Home).
- No category filter; random for now (user will customize).

## Step-by-Step Implementation

### Phase 1: Prep [COMPLETE ✅]
- [x] ✅ Analyzed files, created plan, user approved random photos.
- [x] ✅ 📖 Read all key views: home, smp, sma, profil, kontak, ppdb, galeri.
- [x] ✅ 📖 Read controllers: HomeController (passes $galeris to home), SekolahController (no $galeris).

### Phase 2: Controller Updates [COMPLETE ✅]
- [x] ✅ 🔧 HomeController: Added $galeris (take 20) to index, profil, kontak.
- [x] ✅ 🔧 SekolahController: Added $galeris to smp & sma (fixed syntax).
- [x] ✅ 🔧 PpdbController: Added $galeris to index.
- [x] ✅ 💾 All controllers updated.

### Phase 3: Layout & CSS [COMPLETE ✅]
- [x] ✅ ✏️ layouts/app.blade.php: Added .photo-hero, .photo-overlay, .photo-card, .photo-card-overlay CSS classes.

### Phase 4: View Edits [COMPLETE ✅]
- [x] ✅ ✏️ home.blade.php: Hero, SMP/SMA cards, CTA → random galeri photos + overlays.
- [x] ✅ ✏️ sekolah/smp.blade.php: Hero + sidebar foto enhanced.
- [x] ✅ ✏️ sekolah/sma.blade.php: Hero + sidebar foto enhanced.
- [x] ✅ ✏️ profil.blade.php: Hero → random photo + overlay.
- [x] ✅ ✏️ kontak.blade.php: Hero → random photo + overlay.
- [x] ✅ ✏️ ppdb.blade.php: Hero → random photo + overlay.

### Phase 5: Test & Finalize [CURRENT]
- [ ] 🧪 Run server: `cd yayasan && php artisan serve`
- [ ] 🔍 Verify all pages show blended photo backgrounds (if galeris exist).
- [ ] ✅ Task complete.

**Next**: Test the implementation. Progress: 18/20 steps. All major pages updated!


### Phase 5: Test
- [ ] 🧪 cd yayasan && php artisan serve; check pages.

**Next**: Edit home.blade.php hero. Progress: 7/20 steps.



### Phase 3: Layout & CSS
- [ ] ✏️ layouts/app.blade.php: Add Tailwind classes for photo-bg + overlay.

### Phase 4: View Edits (home first)
- [ ] ✏️ home.blade.php hero & cards.
- [ ] ✏️ sekolah/smp.blade.php & sma.blade.php.
- [ ] ✏️ profil, kontak, ppdb (all have heroes ready).

### Phase 5: Test
- [ ] 🧪 php artisan serve & check pages.

**Next**: Update controllers. Progress: 3/20 steps.


