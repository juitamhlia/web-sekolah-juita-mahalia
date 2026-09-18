
/* ============================================================
   1. HERO CAROUSEL — counter & progress bar sinkron dengan slide
   ============================================================ */
(function () {
    var carouselEl = document.getElementById('heroCarousel');
    if (!carouselEl) return;

    var counterEl     = document.getElementById('heroCounterCurrent');
    var progressBtns  = Array.prototype.slice.call(carouselEl.querySelectorAll('.hero-progress button'));

    function syncTo(index) {
        if (counterEl) {
            counterEl.textContent = String(index + 1).padStart(2, '0');
        }

        progressBtns.forEach(function (btn, i) {
            btn.classList.toggle('is-active', i === index);
            btn.classList.toggle('is-done', i < index);
            // restart fill animation cleanly on the newly active bar;
            // Bootstrap's slide-to click handler is delegated on document,
            // so cloning keeps it working without re-binding anything
            if (i === index) {
                var clone = btn.cloneNode(true);
                btn.parentNode.replaceChild(clone, btn);
                progressBtns[i] = clone;
                clone.classList.add('is-active');
            }
        });
    }

    carouselEl.addEventListener('slide.bs.carousel', function (e) {
        syncTo(e.to);
    });

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        var instance = bootstrap.Carousel.getOrCreateInstance(carouselEl);
        instance.pause();
    }

    syncTo(0);
})();


/* ============================================================
   2. GALERI KEGIATAN — carousel 3D + lightbox zoom
   ============================================================ */
(function(){
    // Ambil semua kartu & dot yang sudah dirender Blade di atas.
    // Karena jumlahnya dinamis (tergantung data DB), kita tidak
    // hardcode array seperti versi statis sebelumnya.
    const track    = document.getElementById('gkTrack');
    if (!track) return; // halaman ini tidak punya section galeri, keluar

    const dotsWrap = document.getElementById('gkDots');
    const cards    = Array.from(track.children);
    const dots     = Array.from(dotsWrap.children);
    const n        = cards.length;

    if (n === 0) return; // jaga-jaga kalau data galeri masih kosong

    let active = 0;
    let timer  = null;

    // Hitung jarak (offset) sebuah index dari slide aktif,
    // dengan logika "melingkar" (circular) supaya carousel
    // terasa tidak terputus di ujung awal/akhir.
    function circularOffset(i, active, n){
        let diff = i - active;
        if (diff > n / 2) diff -= n;
        if (diff < -n / 2) diff += n;
        return diff;
    }

    // Terapkan data-pos ke tiap kartu (dipakai CSS untuk transform),
    // dan tandai dot yang aktif.
    function render(){
        cards.forEach((card, i) => {
            const offset = circularOffset(i, active, n);
            card.dataset.pos = Math.abs(offset) <= 2 ? String(offset) : 'hidden';
        });
        dots.forEach((dot, i) => dot.classList.toggle('active', i === active));
    }

    function goTo(i){
        active = ((i % n) + n) % n; // modulo positif, biar bisa "muter balik"
        render();
        restartAutoplay();
    }

    function next(){ goTo(active + 1); }
    function prev(){ goTo(active - 1); }

    function restartAutoplay(){
        if (timer) clearInterval(timer);
        if (n > 1) timer = setInterval(next, 3500); // ganti slide tiap 3.5 detik
    }

    // Klik dot langsung loncat ke slide terkait
    dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));

    document.getElementById('gkNext').addEventListener('click', next);
    document.getElementById('gkPrev').addEventListener('click', prev);

    // Autoplay berhenti saat kursor di atas carousel, lanjut lagi saat keluar
    const stageWrap = document.querySelector('.gk-stage-wrap');
    stageWrap.addEventListener('mouseenter', () => timer && clearInterval(timer));
    stageWrap.addEventListener('mouseleave', restartAutoplay);

    // ===== Lightbox zoom =====
    const lightbox      = document.getElementById('gkLightbox');
    const lightboxImg   = document.getElementById('gkLightboxImg');
    const lightboxTitle = document.getElementById('gkLightboxTitle');
    const lightboxClose = document.getElementById('gkLightboxClose');

    function openLightbox(imgSrc, title){
        lightboxImg.src = imgSrc;
        lightboxImg.alt = title;
        lightboxTitle.textContent = title;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
        if (timer) clearInterval(timer); // pause autoplay carousel saat modal terbuka
    }

    function closeLightbox(){
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
        restartAutoplay();
    }

    // Tombol zoom di tiap kartu
    document.querySelectorAll('.gk-zoom-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            openLightbox(btn.dataset.img, btn.dataset.title);
        });
    });

    lightboxClose.addEventListener('click', closeLightbox);

    // Klik area gelap di luar gambar untuk menutup
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    // Tutup dengan tombol Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
    });

    render();
    restartAutoplay();
})();