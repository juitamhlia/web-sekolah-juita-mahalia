/* ==========================================================
   galeri.js — dipindah dari <script> di galeri.blade.php
   Berisi filter kategori dan lightbox zoom foto.
   ========================================================== */

(function(){
    const filterBtns = document.querySelectorAll('.gl-filter-btn');
    const cards = document.querySelectorAll('#glGrid .gl-card');

    function applyFilters(activeFilter){
        cards.forEach(card => {
            const kategori = card.dataset.kategori;
            const match = (activeFilter === 'Semua' || kategori === activeFilter);
            card.style.display = match ? '' : 'none';
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            applyFilters(btn.dataset.filter);
        });
    });

    // ===== Lightbox zoom =====
    const lightbox      = document.getElementById('glLightbox');
    const lightboxImg   = document.getElementById('glLightboxImg');
    const lightboxTitle = document.getElementById('glLightboxTitle');
    const lightboxTag   = document.getElementById('glLightboxTag');
    const lightboxClose = document.getElementById('glLightboxClose');

    function openLightbox(imgSrc, title, kategori){
        lightboxImg.src = imgSrc;
        lightboxImg.alt = title;
        lightboxTitle.textContent = title;

        if (kategori) {
            lightboxTag.textContent = kategori;
            lightboxTag.style.display = 'inline-block';
        } else {
            lightboxTag.style.display = 'none';
        }

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(){
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.gl-zoom-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            openLightbox(btn.dataset.img, btn.dataset.title, btn.dataset.kategori);
        });
    });

    lightboxClose.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
    });
})();