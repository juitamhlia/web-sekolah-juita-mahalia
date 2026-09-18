{{--
    ==========================================================
    FOOTER — SMK Negeri 1 Cijati (gaya: identitas+kontak+peta)
    ==========================================================
    - Kolom kiri : logo, nama sekolah, alamat, telepon, email, sosial media
    - Kolom kanan: judul "Lokasi Sekolah" + embed Google Maps
    - Bar bawah  : copyright + tombol Admin Login (ikon gembok, samar)
    - Tombol scroll-to-top mengambang di kanan bawah
--}}

<style>
    :root{
        --ft-blue: #0d63f0;
        --ft-blue-dark: #0a4fc2;
        --ft-blue-soft: #eaf2ff;
        --ft-ink: #1F2A44;
        --ft-ink-soft: #64748B;
        --ft-border: #E3EBF5;
    }

    .ft-footer{
        background: linear-gradient(180deg, #F3F8FC 0%, #FBFDFF 100%);
        font-family:'Figtree', sans-serif;
        color: var(--ft-ink);
        position: relative;
    }

    .ft-main{
        padding: 56px 0 44px;
    }

    /* ---- Kolom kiri: identitas + kontak ---- */
    .ft-brand{
        display:flex;
        align-items:center;
        gap:12px;
        margin-bottom:22px;
    }
    .ft-logo{
        width:46px;
        height:46px;
        border-radius:50%;
        background: var(--ft-blue-soft);
        color: var(--ft-blue-dark);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:1.1rem;
        flex-shrink:0;
        overflow:hidden;
    }
    .ft-logo img{ width:100%; height:100%; object-fit:cover; }
    .ft-brand-name{
        font-size:1.15rem;
        font-weight:800;
        color: var(--ft-ink);
        margin:0;
    }

    .ft-contact-item{
        display:flex;
        align-items:flex-start;
        gap:12px;
        margin-bottom:16px;
        font-size:.88rem;
        color: var(--ft-ink-soft);
        line-height:1.5;
        max-width:380px;
    }
    .ft-contact-item i{
        color: var(--ft-blue);
        font-size:.85rem;
        margin-top:3px;
        width:16px;
        flex-shrink:0;
    }

    .ft-social{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
        margin-top:26px;
    }
    .ft-social a{
        width:38px;
        height:38px;
        border-radius:50%;
        border:1px solid var(--ft-border);
        background:#fff;
        color: var(--ft-ink-soft);
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:.9rem;
        text-decoration:none;
        transition:background .15s ease, color .15s ease, border-color .15s ease;
    }
    .ft-social a:hover{
        background: var(--ft-blue);
        border-color: var(--ft-blue);
        color:#fff;
    }

    /* ---- Kolom kanan: peta lokasi ---- */
    .ft-map-title{
        font-size:1.15rem;
        font-weight:800;
        color: var(--ft-ink);
        text-align:center;
        margin:0 0 18px;
    }
    .ft-map-wrap{
        position:relative;
        border-radius:16px;
        overflow:hidden;
        border:1px solid var(--ft-border);
        box-shadow: 0 14px 30px -18px rgba(13,99,240,.22);
    }
    .ft-map-wrap iframe{
        width:100%;
        height:230px;
        border:0;
        display:block;
    }
    .ft-map-open{
        position:absolute;
        top:14px;
        left:14px;
        display:inline-flex;
        align-items:center;
        gap:6px;
        background:#fff;
        color: var(--ft-ink);
        font-size:.8rem;
        font-weight:600;
        padding:7px 14px;
        border-radius:999px;
        text-decoration:none;
        box-shadow: 0 4px 14px rgba(16,24,39,.12);
    }
    .ft-map-open:hover{ color: var(--ft-blue-dark); }

    /* ---- Bar bawah: copyright + admin login ---- */
    .ft-bottom{
        border-top:1px solid var(--ft-border);
        padding:14px 0;
    }
    .ft-bottom-inner{
        display:flex;
        align-items:center;
        justify-content:center;
        gap:16px;
        flex-wrap:wrap;
        position:relative;
    }
    .ft-copyright{
        font-size:.82rem;
        color: var(--ft-ink-soft);
        margin:0;
        text-align:center;
    }
    .ft-copyright strong{ color: var(--ft-ink); }

    /* Tombol Admin Login: ikon gembok saja, samar, muncul jelas saat hover */
    .ft-admin-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        width:30px;
        height:30px;
        font-size:.8rem;
        color: var(--ft-ink-soft);
        background:transparent;
        border:none;
        border-radius:50%;
        text-decoration:none;
        opacity:.35;
        transition:opacity .15s ease, color .15s ease;
    }
    .ft-admin-btn:hover{
        opacity:1;
        color: var(--ft-blue-dark);
    }

    /* ---- Tombol scroll-to-top ---- */
    .ft-scrolltop{
        position:fixed;
        right:22px;
        bottom:22px;
        width:44px;
        height:44px;
        border-radius:50%;
        background: var(--ft-blue);
        color:#fff;
        border:none;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:1rem;
        box-shadow: 0 10px 22px -8px rgba(13,99,240,.55);
        cursor:pointer;
        z-index:40;
        transition:background .15s ease, transform .15s ease;
    }
    .ft-scrolltop:hover{
        background: var(--ft-blue-dark);
        transform: translateY(-2px);
    }

    @media (max-width:991px){
        .ft-map-title{ margin-top:36px; }
        .ft-map-wrap iframe{ height:210px; }
    }
</style>

<footer class="ft-footer">
    <div class="container ft-main">
        <div class="row align-items-start gy-4">

            {{-- Kolom kiri: identitas + kontak + sosial media --}}
            <div class="col-lg-5 col-md-6">
                <div class="ft-brand">
                    <div class="ft-logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SMK Negeri 1 Cijati">
                    </div>
                    <p class="ft-brand-name">SMK NEGERI 1 CIJATI</p>
                </div>

                <div class="ft-contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $profil->alamat ?? 'Jl. Pendidikan No. 1, Cijati' }}</span>
                </div>

                <div class="ft-contact-item">
                    <i class="fas fa-phone"></i>
                    <span>{{ $profil->telepon ?? '(0265) 123456' }}</span>
                </div>

                <div class="ft-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>{{ $profil->email ?? 'info@smkn1cijati.sch.id' }}</span>
                </div>

                <div class="ft-social">
                    <a href="https://smkn1cijati.sch.id" target="_blank" title="Website"><i class="fas fa-globe"></i></a>
                    <a href="https://www.instagram.com/smkn1cijatiofficial" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/smkn1cijatiofficial" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://youtube.com/@smkncijatitv" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.tiktok.com/@smkn1cijati" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>

            {{-- Kolom kanan: peta lokasi --}}
            <div class="col-lg-7 col-md-6">
                <h5 class="ft-map-title">Lokasi Sekolah</h5>

                <div class="ft-map-wrap">
                    <a href="https://www.google.com/maps/search/?api=1&query=SMK+Negeri+1+Cijati+Cianjur" target="_blank" class="ft-map-open">
                        Open in Maps <i class="fas fa-external-link-alt"></i>
                    </a>

                    <iframe
                        src="https://maps.google.com/maps?q=SMK+Negeri+1+Cijati+Cianjur&output=embed"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </div>

    {{-- Bar bawah: copyright + Admin Login --}}
    <div class="container">
        <div class="ft-bottom">
            <div class="ft-bottom-inner">
                <p class="ft-copyright">
                    &copy; Copyright SMK NEGERI 1 CIJATI All Rights Reserved.
                </p>

                <a href="{{ route('admin.dashboard') }}" class="ft-admin-btn" title="Admin">
                    <i class="fas fa-lock"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Tombol scroll ke atas --}}
    <button type="button" class="ft-scrolltop" onclick="window.scrollTo({top:0, behavior:'smooth'})" aria-label="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>