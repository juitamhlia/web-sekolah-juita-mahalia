/* ==========================================================
   ekstrakurikuler-detail.js — dipindah dari <script> di ekstrakurikuler-detail.blade.php
   Tombol panah dipasang lewat atribut data-thumb-dir,
   thumbnail lewat class .ed-thumb (tidak lagi memakai onclick di HTML).
   ========================================================== */

function edSetActiveThumb(el) {
    document.querySelectorAll('.ed-thumb').forEach(t => t.classList.remove('active'));
    el.classList.add('active');

    const img = el.querySelector('img');
    const mainImg = document.getElementById('edMainPhotoImg');
    if (img && mainImg) {
        mainImg.src = img.src;
    }
}

function edScrollThumb(direction) {
    const thumbs = Array.from(document.querySelectorAll('.ed-thumb'));
    if (!thumbs.length) return;

    const activeIndex = thumbs.findIndex(t => t.classList.contains('active'));
    let nextIndex = activeIndex + direction;

    if (nextIndex < 0) nextIndex = thumbs.length - 1;
    if (nextIndex >= thumbs.length) nextIndex = 0;

    edSetActiveThumb(thumbs[nextIndex]);
}

// klik thumbnail
document.querySelectorAll('.ed-thumb').forEach(thumb => {
    thumb.addEventListener('click', () => edSetActiveThumb(thumb));
});

// klik tombol panah kiri / kanan
document.querySelectorAll('[data-thumb-dir]').forEach(btn => {
    btn.addEventListener('click', () => {
        edScrollThumb(parseInt(btn.dataset.thumbDir, 10));
    });
});