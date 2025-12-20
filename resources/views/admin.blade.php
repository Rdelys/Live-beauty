<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Admin - Live Beauty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

  <style>
    
  /* ================================
   THEME DARK PREMIUM NOIR & ROUGE
=================================*/
:root {
    --primary: #d90429;          /* Rouge principal */
    --primary-light: #ef233c;    /* Rouge clair */
    --primary-dark: #9b021d;     /* Rouge foncé */

    --bg: #111;                  /* Fond global noir */
    --sidebar-bg: #161616;       /* Sidebar noir mat */
    --content-bg: #1a1a1a;       /* Contenu noir anthracite */

    --text-dark: #e5e5e5;        /* Texte clair */
    --text-light: #b3b3b3;       /* Texte gris clair */

    --border: #2a2a2a;           /* Border dark */
    --radius: 12px;

    --shadow-sm: 0 2px 6px rgba(0,0,0,0.4);
    --shadow-md: 0 6px 18px rgba(0,0,0,0.6);
}

/* GLOBAL */
body {
    margin: 0;
    font-family: "Inter", "Segoe UI", sans-serif;
    background: var(--bg);
    color: var(--text-dark);
    display: flex;
    min-height: 100vh;
    overflow-x: hidden;
}

a {
    text-decoration: none;
    color: inherit;
}

/* ================================
   SIDEBAR
=================================*/
.sidebar {
    width: 260px;
    background: var(--sidebar-bg);
    border-right: 1px solid var(--border);
    height: 100vh;
    position: fixed;
    padding: 1.8rem 1.2rem;
    overflow-y: auto;
    transition: 0.3s ease;
    box-shadow: var(--shadow-sm);
}

.sidebar h5 {
    text-align: center;
    font-weight: 600;
    margin-bottom: 2rem;
    color: var(--primary);
    font-size: 1.3rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.sidebar a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 0.8rem 1rem;
    border-radius: var(--radius);
    margin-bottom: 0.6rem;
    color: var(--text-light);
    font-weight: 500;
    transition: 0.25s ease;
}

.sidebar a:hover,
.sidebar a.active {
    background: var(--primary);
    color: #fff;
    box-shadow: var(--shadow-sm);
    transform: translateX(4px);
}

/* SUBMENU */
.submenu {
    max-height: 0;
    overflow: hidden;
    padding-left: 1rem;
    transition: max-height 0.4s ease;
}

.submenu.show {
    max-height: 300px;
}

.submenu a {
    background: #222;
    padding: 0.6rem 1rem;
    border-radius: var(--radius);
    font-size: 0.92rem;
    color: var(--text-light);
}

.submenu a:hover {
    background: var(--primary-light);
    color: #fff;
}

/* ================================
   MAIN CONTENT
=================================*/
.content {
    margin-left: 260px;
    padding: 2rem;
    transition: 0.3s ease;
}

.content h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: var(--primary-light);
}

/* ================================
   TABLES
=================================*/
.table {
    background: var(--content-bg);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    color: var(--text-light);
}

.table thead {
    background: var(--primary);
    color: #fff;
}

.table th,
.table td {
    vertical-align: middle;
    border-color: var(--border) !important;
}

/* ================================
   BUTTONS
=================================*/
.btn-primary {
    background: var(--primary);
    border: none;
    border-radius: var(--radius);
    padding: 0.45rem 1rem;
    transition: 0.3s;
}

.btn-primary:hover {
    background: var(--primary-dark);
}

.btn-danger {
    background: #a00000;
    border-radius: var(--radius);
    border: none;
}

.btn-danger:hover {
    background: #700000;
}

.btn-success {
    background: #1f8f3e;
    border-radius: var(--radius);
    border: none;
}

.btn-success:hover {
    background: #166b2f;
}

/* ================================
   CARDS
=================================*/
.card {
    border-radius: var(--radius);
    border: none;
    background: var(--content-bg);
    box-shadow: var(--shadow-sm);
    transition: 0.25s ease;
    color: var(--text-dark);
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}

.card-title {
    font-weight: 600;
}

/* ================================
   FORMS
=================================*/
.form-control {
    background: #222;
    border-radius: var(--radius);
    border: 1px solid var(--border);
    color: var(--text-dark);
    transition: 0.2s ease;
}

.form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(217, 4, 41, 0.4);
    background: #1c1c1c;
}

/* LABELS */
label {
    font-weight: 500;
    color: var(--text-light);
    margin-bottom: 0.4rem;
}

/* ================================
   MEDIA / IMAGES
=================================*/
.zoomable-photo {
    cursor: pointer;
    transition: 0.25s ease;
    border-radius: var(--radius);
}

.zoomable-photo:hover {
    transform: scale(1.06);
}

video {
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
}

/* ================================
   ANIMATIONS
=================================*/
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to   { opacity: 1; transform: translateY(0); }
}

.content-section {
    animation: fadeIn 0.5s ease;
}

/* ============================
   RESPONSIVE MOBILE FIX MENU
============================ */
@media (max-width: 992px) {

    body {
        overflow-x: hidden;
    }

    /* Sidebar devient un menu mobile non fixe */
    .sidebar {
        position: absolute !important;
        top: 60px; /* sous la navbar mobile */
        left: 0;
        width: 100% !important;
        height: auto !important;
        max-height: 80vh;
        overflow-y: auto;
        background: var(--sidebar-bg);
        border-right: none !important;
        border-bottom: 1px solid var(--border);
        padding: 1rem !important;
        z-index: 9999;
    }

    /* Quand menu collapse est fermé → totalement caché */
    .collapse:not(.show) {
        display: none !important;
    }

    /* Le contenu reprend toute la largeur */
    .content {
        margin-left: 0 !important;
        margin-top: 20px;
        padding: 1rem !important;
    }

    /* Alignement des liens */
    .sidebar a {
        justify-content: flex-start !important;
        text-align: left !important;
    }

    /* Sous-menus */
    .submenu {
        padding-left: 1rem;
    }
}

/* ================================
   CHOICES.JS
=================================*/
.choices__inner {
    background: #222 !important;
    color: var(--text-dark) !important;
    border-radius: var(--radius) !important;
    border: 1px solid var(--border) !important;
}

.choices__list--dropdown {
    background: #1a1a1a !important;
}

.choices__item.choices__item--selectable {
    background: var(--primary) !important;
    color: #fff !important;
}

.choices__list--dropdown .choices__item:hover {
    background: var(--primary-light) !important;
}

/* ================================
   TITRES SECTION MODÈLES
================================*/
#modeles-content h2 {
    font-size: 2.2rem;
    font-weight: 800;
    color: #ef233c !important;
}

#modeles-content p {
    color: #ffffffff !important;
    font-size: 1.1rem;
    margin-bottom: 25px;
}


/* ================================
   TABLE "GLASS DARK PREMIUM"
================================*/
#modeles-content table {
    width: 100%;
    background: rgba(22,22,22,0.85);
    backdrop-filter: blur(8px);
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 10px 28px rgba(0,0,0,0.55);
    border-collapse: separate;
    border-spacing: 0;
}

/* Header rouge premium */
#modeles-content thead th {
    background: #d90429;
    color: #fff !important;
    font-weight: 700;
    border: none !important;
    padding: 14px 16px;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    font-size: 0.95rem;
}

/* Lignes */
#modeles-content tbody tr {
    transition: 0.25s ease;
}

#modeles-content tbody tr:hover {
    background: rgba(239,35,60,0.06) !important;
}

/* Cellules */
#modeles-content td {
    padding: 14px 16px !important;
    border: 1px solid rgba(255,255,255,0.05) !important;
    vertical-align: middle;
    color: #100e0eff !important;
}


/* ================================
   DESCRIPTION (ellipsis)
================================*/
#modeles-content td:nth-child(3) {
    max-width: 300px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


/* ================================
   PHOTOS — MINIATURES PREMIUM
================================*/
#modeles-content td div {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

#modeles-content img {
    width: 75px;
    height: 75px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.25s ease;
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
}

#modeles-content img:hover {
    transform: scale(1.08);
    box-shadow: 0 12px 25px rgba(239,35,60,0.45);
}


/* ================================
   VIDÉOS — STYLE MINIATURE
================================*/
#modeles-content video {
    width: 110px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.4);
    transition: .25s ease;
}

#modeles-content video:hover {
    transform: scale(1.04);
}


/* ================================
   BOUTONS ACTIONS PREMIUM
================================*/
#modeles-content .btn-primary {
    background: linear-gradient(90deg, #d90429, #850018) !important;
    border: none !important;
    padding: 6px 14px !important;
    border-radius: 10px;
    font-weight: 600;
    transition: 0.25s ease;
}

#modeles-content .btn-primary:hover {
    background: #ef233c !important;
    box-shadow: 0 0 12px rgba(239,35,60,0.5);
}

#modeles-content .btn-danger {
    background: #7a0000 !important;
    border: none !important;
    padding: 6px 14px !important;
    border-radius: 10px;
    font-weight: 600;
    transition: 0.25s ease;
}

#modeles-content .btn-danger:hover {
    background: #b30000 !important;
    box-shadow: 0 0 12px rgba(255,0,0,0.5);
}


/* ================================
   MODAL IMAGE PREMIUM
================================*/
#imageModal .modal-content {
    background: #111 !important;
    border: 1px solid #d90429;
    border-radius: 16px;
    box-shadow: 0 0 25px rgba(239,35,60,0.4);
}

#imageModal img {
    border-radius: 14px;
    box-shadow: 0 8px 28px rgba(0,0,0,0.6);
}

#imageModal .modal-title {
    color: #ef233c !important;
    font-weight: 700;
}

/* ============================================
      SECTION — HISTORIQUE DES JETONS
============================================ */

#historique-jetons-content h2 {
    font-size: 2rem;
    font-weight: 800;
    color: #ef233c !important;
    margin-bottom: 10px;
    text-shadow: 0 0 8px rgba(239,35,60,0.4);
}

#historique-jetons-content p {
    color: #bbb !important;
    margin-bottom: 20px;
}

/* ============================================
      FILTRES
============================================ */
#historique-jetons-content .card {
    background: rgba(22,22,22,0.85) !important;
    border-radius: 14px;
    border: 1px solid rgba(255,255,255,0.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.45);
    backdrop-filter: blur(8px);
}

#historique-jetons-content .form-label {
    color: #ddd !important;
    font-weight: 600;
}

#historique-jetons-content .form-control {
    background: #181818 !important;
    border: 1px solid #333 !important;
    color: #eee !important;
    border-radius: 10px;
    padding: 8px 12px;
    transition: .25s ease;
}

#historique-jetons-content .form-control:focus {
    border-color: #ef233c !important;
    box-shadow: 0 0 10px rgba(239,35,60,0.5);
}

#resetHistoriqueFilter {
    background: #444 !important;
    border: none !important;
    border-radius: 10px;
    transition: .25s;
}
#resetHistoriqueFilter:hover {
    background: #ef233c !important;
    box-shadow: 0 0 10px rgba(239,35,60,0.4);
}

/* ============================================
      BLOC TOTAL JETONS
============================================ */
#historique-jetons-content .alert-info {
    background: linear-gradient(90deg,#fafafa, #e6e6e6) !important;
    border: none !important;
    box-shadow: 0 4px 12px rgba(255,255,255,0.2);
    color: #000 !important;
    border-radius: 12px;
    font-size: 1.1rem;
}

/* ============================================
      TABLE PREMIUM
============================================ */
#historique-jetons-content table {
    background: rgba(20,20,20,0.85) !important;
    border-radius: 14px;
    overflow: hidden;
    color: #ddd !important;
    border-collapse: separate;
    border-spacing: 0;
    backdrop-filter: blur(6px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.5);
}

#historique-jetons-content thead th {
    background: #d90429;
    color: #fff !important;
    padding: 14px 12px;
    font-weight: 700;
    font-size: 0.9rem;
    border: none !important;
    letter-spacing: .5px;
    text-transform: uppercase;
}

#historique-jetons-content tbody tr {
    transition: .25s ease;
}

#historique-jetons-content tbody tr:hover {
    background: rgba(239,35,60,0.08) !important;
}

#historique-jetons-content td {
    border-color: rgba(255,255,255,0.06) !important;
    padding: 14px !important;
    vertical-align: middle;
    font-size: 0.95rem;
}

/* ============================================
      BADGES
============================================ */

#historique-jetons-content .badge {
    padding: 8px 12px;
    border-radius: 10px;
    font-size: 0.8rem;
    font-weight: 700;
}

#historique-jetons-content .badge.bg-warning {
    background: #ffc857 !important;
}

#historique-jetons-content .badge.bg-success {
    background: #2ecc71 !important;
}


/* ============================================
      RESPONSIVE FIXES
============================================ */

@media (max-width: 768px) {
    #historique-jetons-content table {
        font-size: 0.8rem;
    }

    #historique-jetons-content td {
        padding: 10px !important;
    }

    #historique-jetons-content .badge {
        padding: 6px 8px;
    }
}

/* ====================================
      TITRE & DESCRIPTION
==================================== */
#ajoute-modeles-content h2 {
    font-size: 2rem;
    font-weight: 800;
    color: #ef233c !important;
    text-shadow: 0 0 8px rgba(239,35,60,0.35);
}

#ajoute-modeles-content p {
    color: #aaa !important;
    font-size: 1.1rem;
    margin-bottom: 25px;
}


/* ====================================
      FORMULAIRE PREMIUM
==================================== */
#ajoute-modeles-content form {
    background: rgba(20,20,20,0.85);
    padding: 25px;
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.05);
    box-shadow: 0 12px 30px rgba(0,0,0,0.55);
    backdrop-filter: blur(8px);
}

/* LABELS */
#ajoute-modeles-content .form-label {
    color: #ddd !important;
    font-weight: 700;
    margin-bottom: 6px;
}

/* INPUTS + SELECT + TEXTAREAS */
#ajoute-modeles-content .form-control {
    background: #141414 !important;
    border: 1px solid #333 !important;
    color: #eee !important;
    font-weight: 500;
    padding: 10px 12px;
    border-radius: 10px;
    transition: .25s ease;
}

#ajoute-modeles-content .form-control:focus {
    border-color: #ef233c !important;
    box-shadow: 0 0 10px rgba(239,35,60,0.5);
    background: #1a1a1a !important;
}

/* TEXTAREA */
#ajoute-modeles-content textarea.form-control {
    min-height: 110px;
    resize: vertical;
}


/* ====================================
      MULTIPLE FILE INPUT (Photos)
==================================== */

#ajoute-modeles-content .photo-group input[type="file"] {
    background: #1c1c1c !important;
}

#ajoute-modeles-content .add-photo {
    border-radius: 10px;
    padding: 0 12px;
    font-size: 1.2rem;
    font-weight: 700;
}


/* ====================================
      BOUTON PRINCIPAL
==================================== */
#ajoute-modeles-content .btn-primary {
    background: linear-gradient(90deg, #d90429, #8f041d) !important;
    border: none !important;
    font-size: 1.1rem;
    font-weight: 700;
    padding: 10px 20px;
    border-radius: 12px;
    transition: .3s ease;
}

#ajoute-modeles-content .btn-primary:hover {
    background: #ef233c !important;
    box-shadow: 0 0 14px rgba(239,35,60,0.55);
}


/* ====================================
      BOUTON + (AJOUT DE PHOTOS)
==================================== */
#ajoute-modeles-content .btn-success {
    background: #138a36 !important;
    border-radius: 10px;
    transition: .25s ease;
}

#ajoute-modeles-content .btn-success:hover {
    background: #0e6629 !important;
    box-shadow: 0 0 12px rgba(20,200,20,0.4);
}


/* ====================================
      SPACING RESPONSIVE
==================================== */
@media (max-width: 768px) {
    #ajoute-modeles-content form {
        padding: 18px;
    }

    #ajoute-modeles-content .btn-primary {
        width: 100%;
    }
}

/* ======================================
      TITRES SECTION CLIENTS
====================================== */
#clients-content h2 {
    font-size: 2rem;
    font-weight: 800;
    color: #ef233c !important;
    text-shadow: 0 0 10px rgba(239,35,60,0.45);
}

#clients-content p {
    color: #aaa !important;
    margin-bottom: 20px;
}


/* ======================================
      FILTRES
====================================== */
#clients-content input.form-control {
    background: #141414 !important;
    border: 1px solid #333 !important;
    color: #eee !important;
    border-radius: 10px;
    padding: 8px 10px;
    transition: .25s ease;
}

#clients-content input.form-control:focus {
    border-color: #ef233c !important;
    box-shadow: 0 0 8px rgba(239,35,60,0.5);
}

#clients-content button.btn-secondary {
    background: #444 !important;
    border-radius: 10px;
    border: none !important;
    transition: .25s ease;
}

#clients-content button.btn-secondary:hover {
    background: #ef233c !important;
    box-shadow: 0 0 10px rgba(239,35,60,0.4);
}


/* ======================================
      TABLE PREMIUM
====================================== */
#clients-content table {
    background: rgba(22,22,22,0.85) !important;
    backdrop-filter: blur(6px);
    border-radius: 14px !important;
    border: 1px solid rgba(255,255,255,0.05);
    overflow: hidden;
    box-shadow: 0 10px 28px rgba(0,0,0,0.45);
}

#clients-content thead th {
    background: #d90429;
    color: #fff !important;
    font-weight: 700;
    padding: 14px !important;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    border: none !important;
    white-space: nowrap;
}

#clients-content tbody tr {
    transition: .25s;
}

#clients-content tbody tr:hover {
    background: rgba(239,35,60,0.05) !important;
}

#clients-content td {
    padding: 14px !important;
    color: #0b0404ff !important;
    border-color: rgba(255,255,255,0.05) !important;
    vertical-align: middle;
}

/* Sort dropdown */
#clients-content .dropdown-menu {
    background: #1a1a1a !important;
    border: 1px solid #333 !important;
}
#clients-content .dropdown-item {
    color: #ddd !important;
    transition: .2s ease;
}
#clients-content .dropdown-item:hover {
    background: #ef233c !important;
    color: #fff !important;
}


/* ======================================
      BADGES / ÉTATS
====================================== */
#clients-content .badge {
    padding: 6px 10px !important;
    border-radius: 8px;
    font-size: .8rem;
    font-weight: 600;
}

#clients-content .badge.bg-warning {
    background: #ffc857 !important;
    color: #000 !important;
}


/* ======================================
      ACTIONS (INPUTS + BOUTONS)
====================================== */

/* Inputs pour jetons */
#clients-content input.form-control-sm {
    background: #181818 !important;
    border: 1px solid #333 !important;
    color: #eee !important;
    border-radius: 8px;
    padding: 5px 8px;
}

#clients-content input.form-control-sm:focus {
    border-color: #ef233c !important;
    box-shadow: 0 0 8px rgba(239,35,60,0.5);
}

/* Boutons Add/Rm Jetons */
#clients-content .btn-success.btn-sm {
    background: #1d9f4d !important;
    border: none !important;
    border-radius: 8px;
    padding: 5px 10px;
    transition: .2s ease;
}

#clients-content .btn-success.btn-sm:hover {
    background: #15773a !important;
    box-shadow: 0 0 12px rgba(45,200,45,0.4);
}

#clients-content .btn-danger.btn-sm {
    background: #890000 !important;
    border: none !important;
    border-radius: 8px;
    padding: 5px 10px;
}

#clients-content .btn-danger.btn-sm:hover {
    background: #b30000 !important;
    box-shadow: 0 0 12px rgba(255,55,55,0.4);
}

#clients-content .btn-warning.btn-sm {
    background: #ffc857 !important;
    color: #000 !important;
    border-radius: 8px;
    border: none;
}

#clients-content .btn-warning.btn-sm:hover {
    background: #ffdd70 !important;
}


/* ======================================
      RESPONSIVE OPTIMISATION
====================================== */
@media (max-width: 768px) {
    #clients-content table {
        font-size: .85rem;
    }
    #clients-content td {
        padding: 10px !important;
    }
    #clients-content input.form-control-sm {
        width: 65px !important;
    }
}

/* ================================================
   PLACEHOLDERS PREMIUM (TOUT LE SITE)
================================================ */
::placeholder {
    color: rgba(255, 60, 60, 0.7) !important;   /* rouge doux */
    font-weight: 500;
    opacity: 1; /* Pour forcer certaines plateformes */
}

input::placeholder,
textarea::placeholder,
select::placeholder {
    color: rgba(255, 60, 60, 0.75) !important;
}

/* Pour les navigateurs Webkit */
input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
    color: rgba(255, 60, 60, 0.75) !important;
}

/* Firefox */
input::-moz-placeholder,
textarea::-moz-placeholder {
    color: rgba(255, 60, 60, 0.75) !important;
}

/* Microsoft Edge */
input:-ms-input-placeholder,
textarea:-ms-input-placeholder {
    color: rgba(255, 60, 60, 0.75) !important;
}

/* Internet Explorer (au cas où) */
input::-ms-input-placeholder,
textarea::-ms-input-placeholder {
    color: rgba(255, 60, 60, 0.75) !important;
}

/* =====================================================
      TITRE + DESCRIPTION
===================================================== */
#shows-prives-content h2 {
    font-size: 2rem;
    color: #ef233c !important;
    font-weight: 800;
    text-shadow: 0 0 10px rgba(239,35,60,0.45);
}

#shows-prives-content p {
    color: #aaa !important;
    margin-bottom: 20px;
}

/* =====================================================
      INPUTS & SELECT PREMIUM
===================================================== */
#shows-prives-content select.form-control {
    background: #141414 !important;
    color: #eee !important;
    border: 1px solid #333 !important;
    border-radius: 10px;
    padding: 8px 12px;
    transition: .25s ease;
}

#shows-prives-content select.form-control:focus {
    border-color: #ef233c !important;
    box-shadow: 0 0 8px rgba(239,35,60,0.5);
}

/* Placeholder des selects */
#shows-prives-content select option {
    background: #111 !important;
}

/* Bouton reset */
#shows-prives-content .btn-secondary {
    background: #444 !important;
    border-radius: 10px;
    border: none !important;
    transition: .25s ease;
}

#shows-prives-content .btn-secondary:hover {
    background: #ef233c !important;
    box-shadow: 0 0 10px rgba(239,35,60,0.4);
}


/* =====================================================
      TABLE PREMIUM (FULL GLASS DARK)
===================================================== */
#shows-prives-content table {
    background: rgba(20,20,20,0.85) !important;
    backdrop-filter: blur(6px);
    border-radius: 14px !important;
    border: 1px solid rgba(255,255,255,0.05);
    overflow: hidden !important;
    box-shadow: 0 10px 28px rgba(0,0,0,0.45);
}

#shows-prives-content thead th {
    background: #d90429;
    color: #fff !important;
    padding: 14px !important;
    font-weight: 700;
    border: none !important;
    letter-spacing: 0.6px;
    text-transform: uppercase;
}

#shows-prives-content tbody tr {
    transition: .25s;
}

#shows-prives-content tbody tr:hover {
    background: rgba(239,35,60,0.05) !important;
}

#shows-prives-content td {
    color: #ddd !important;
    padding: 14px !important;
    vertical-align: middle;
    border-color: rgba(255,255,255,0.05) !important;
}


/* =====================================================
      BADGES (États des shows)
===================================================== */
#shows-prives-content .badge {
    font-size: 0.8rem;
    padding: 6px 10px;
    border-radius: 8px;
}

#shows-prives-content .badge.bg-info {
    background: #00b4d8 !important;
    color: #000 !important;
}

#shows-prives-content .badge.bg-warning {
    background: #ffc857 !important;
    color: #000;
}

#shows-prives-content .badge.bg-success {
    background: #1dd65f !important;
}

#shows-prives-content .badge.bg-danger {
    background: #b30000 !important;
}


/* =====================================================
      RESPONSIVE
===================================================== */
@media (max-width: 768px) {
    #shows-prives-content table {
        font-size: 0.85rem;
    }
    #shows-prives-content td {
        padding: 10px !important;
    }
}

/* ================================
   FIX GLOBAL DES TABLEAUX EN MOBILE
================================ */
.table-responsive {
    width: 100% !important;
    overflow-x: auto !important;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    display: block !important;
}

/* Empêche les cellules de s'étirer inutilement */
table {
    width: 100% !important;
    table-layout: auto !important;
}

/* Les colonnes s’ajustent en mobile */
@media (max-width: 768px) {

    table th,
    table td {
        white-space: nowrap !important;
        padding: 10px 12px !important;
    }

    /* Colonne description : permet de ne pas casser l'affichage */
    td:nth-child(3),
    th:nth-child(3) {
        white-space: normal !important;
    }
}

/* 🔥 Historique Lives - Styles */
#historique-lives-content h2 {
  font-size: 2rem;
  font-weight: 800;
  color: #ef233c !important;
  text-shadow: 0 0 8px rgba(239,35,60,0.4);
}

#historique-lives-content p {
  color: #bbb !important;
  margin-bottom: 20px;
}

/* Cartes statistiques */
#historique-lives-content .card.bg-dark {
  background: rgba(25,25,25,0.9) !important;
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 12px;
  transition: all 0.3s ease;
}

#historique-lives-content .card.bg-dark:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.4);
}

#historique-lives-content .display-5 {
  font-weight: 800;
  font-size: 2.2rem;
}

/* Tableau */
#historique-lives-content table {
  background: rgba(20,20,20,0.9) !important;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid rgba(255,255,255,0.05);
  box-shadow: 0 8px 25px rgba(0,0,0,0.4);
}

#historique-lives-content thead th {
  background: #d90429 !important;
  color: #fff !important;
  padding: 14px 12px;
  font-weight: 700;
  font-size: 0.9rem;
  letter-spacing: 0.5px;
  border: none !important;
}

#historique-lives-content tbody tr {
  transition: background 0.2s ease;
}

#historique-lives-content tbody tr:hover {
  background: rgba(239,35,60,0.06) !important;
}

#historique-lives-content td {
  padding: 14px !important;
  border-color: rgba(255,255,255,0.06) !important;
  vertical-align: middle;
  color: #000000ff !important;
}

/* Badges améliorés */
#historique-lives-content .badge {
  padding: 8px 12px;
  border-radius: 10px;
  font-weight: 700;
  font-size: 0.85rem;
}

#historique-lives-content .badge.bg-success {
  background: linear-gradient(90deg, #28a745, #1e7e34) !important;
}

#historique-lives-content .badge.bg-warning {
  background: linear-gradient(90deg, #ffc107, #e0a800) !important;
  color: #000 !important;
}

#historique-lives-content .badge.bg-info {
  background: linear-gradient(90deg, #17a2b8, #138496) !important;
}

/* Durée en gras */
#historique-lives-content strong.text-success {
  color: #20c997 !important;
}

#historique-lives-content strong.text-info {
  color: #17a2b8 !important;
}
  </style>
</head>
<body>
  <!-- Bouton Hamburger (visible en mobile) -->
<nav class="navbar navbar-dark bg-dark d-lg-none fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


<!-- Menu latéral transformé en dropdown mobile -->
<div class="collapse d-lg-block sidebar" id="mobileMenu">
  <h5><i class="fas fa-user-shield"></i> Admin Panel</h5>
  <a class="menu-link active"><i class="fas fa-tachometer-alt"></i> Tableau de bord</a>

  <a class="menu-link has-submenu"><i class="fas fa-images"></i> Modèles</a>
  <div class="submenu">
    <a class="menu-link"><i class="fas fa-list"></i> Liste des modeles</a>
    <a href="#" class="menu-link"><i class="fas fa-history"></i>Jetons obtenu</a>

    <a class="menu-link"><i class="fas fa-plus"></i> Ajout modeles</a>
  </div>

  <a class="menu-link"><i class="fas fa-users"></i> Clients</a>
  <!-- <a class="menu-link"><i class="fas fa-shopping-cart"></i> Achats photos</a> -->
  <a class="menu-link"><i class="fas fa-video"></i> Shows privés</a>

  <!--<a class="menu-link has-submenu"><i class="fas fa-coins"></i> Jetons</a>
  <div class="submenu">
    <a class="menu-link"><i class="fas fa-list-ul"></i> Liste des jetons</a>
    <a class="menu-link"><i class="fas fa-plus-circle"></i> Ajout de jetons</a>
  </div>-->

  <a href="#" class="menu-link has-submenu"><i class="fas fa-coins"></i> Jetons Proposés</a>
  <div class="submenu">
    <a href="#" class="menu-link">Liste des jetons proposés</a>
    <a href="#" class="menu-link">Ajout jetons proposés</a>
  </div>
<a class="menu-link"><i class="fas fa-film"></i> Films descriptions</a>
<!-- Dans la section du menu latéral -->
<!-- Dans la section du menu, avec les autres liens -->
<a href="#" class="menu-link" onclick="showSection('historique-lives-content')">
    <i class="fas fa-history"></i> Historique Lives
</a>
<!-- Dans la section du menu latéral, avec les autres liens -->
<a href="#" class="menu-link" onclick="showSection('connexions-modeles-content')">
    <i class="fas fa-sign-in-alt"></i> Connexions Modèles
</a>

  <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button class="btn btn-danger w-100 mt-3">
        <i class="fas fa-sign-out-alt"></i> Déconnexion
    </button>
</form>
</div>

<div class="content">

<div id="historique-jetons-content" class="content-section d-none">
  <h2><i class="fas fa-history text-danger"></i> Historique des Jetons</h2>
  <p>Suivi complet des jetons utilisés et des surprises envoyées.</p>

  <!-- FILTRE -->
  <!-- FILTRE -->
<form method="GET" class="row g-3 mb-4" action="{{ route('admin') }}">
  <!-- Filtre (client-side : pas de reload) -->
<!-- ==== FILTRES JETONS OBTENU ==== -->
<div class="card p-3 mb-4 bg-dark text-white">
    <div class="row g-3">

        <!-- Filtre Modèle -->
        <div class="col-md-3">
            <label class="form-label">Modèle :</label>
            <select id="filterModele" class="form-control">
                <option value="">-- Tous les modèles --</option>
                @foreach($modeles as $modele)
                    <option value="{{ $modele->id }}">
                        {{ $modele->prenom }} {{ $modele->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Entre deux dates -->
        <div class="col-md-3">
            <label class="form-label">Du :</label>
            <input type="date" id="filterStartDate" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Au :</label>
            <input type="date" id="filterEndDate" class="form-control">
        </div>

        <!-- Mois précis -->
        <div class="col-md-3">
            <label class="form-label">Mois :</label>
            <input type="month" id="filterSingleMonth" class="form-control">
        </div>

        <!-- Entre deux mois -->
        <div class="col-md-3">
            <label class="form-label">Du mois :</label>
            <input type="month" id="filterMonthStart" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Au mois :</label>
            <input type="month" id="filterMonthEnd" class="form-control">
        </div>

        <!-- Bouton réinitialiser -->
        <div class="col-md-3 d-flex align-items-end">
            <button type="button" id="resetHistoriqueFilter" class="btn btn-secondary w-100">
                <i class="fas fa-eraser"></i> Réinitialiser
            </button>
        </div>

    </div>
</div>

</form>

<!-- TOTAL -->
<div class="alert alert-info text-dark">
  <strong>Total des jetons utilisés :</strong> 💎 {{ number_format($totalJetons ?? 0, 0, ',', ' ') }}
</div>

<!-- TABLE -->
<div class="table-responsive">
  <table class="table table-bordered table-striped align-middle text-center">
    <thead class="bg-danger text-white">
      <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Modèle</th>
        <th>Type</th>
        <th>Jetons utilisés</th>
        <th>Description</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      @if(!empty($historiques) && $historiques->count())
        @foreach($historiques as $h)
  <tr data-modele-id="{{ $h->modele_id ?? '' }}">
            <td>{{ $h->id }}</td>
            <td>{{ $h->user->pseudo ?? '—' }}</td>
            <td>{{ $h->modele->prenom ?? '—' }} {{ $h->modele->nom ?? '' }}</td>
            <td>
              @if($h->type === 'surprise')
                <span class="badge bg-warning text-dark">Surprise 🎁</span>
              @else
                <span class="badge bg-success">Jeton action</span>
              @endif
            </td>
            <td><strong>{{ $h->nombre_jetons }}</strong></td>
            <td>{{ $h->description ?? '—' }}</td>
            <td>{{ $h->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        @endforeach
      @else
        <tr><td colspan="7" class="text-muted">Aucun historique trouvé.</td></tr>
      @endif
    </tbody>
  </table>
</div>

</div>

<!-- 🔥 Section Historique des Lives -->
<div id="historique-lives-content" class="content-section d-none">
  <h2><i class="fas fa-video text-danger"></i> Historique des Lives</h2>
  <p>Consultation de tous les lives passés et en cours avec filtres avancés.</p>

  <!-- Filtres Rapides -->
  <div class="card p-3 mb-4 bg-dark text-white">
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">Modèle :</label>
        <select id="filterLiveModele" class="form-control">
          <option value="">-- Tous les modèles --</option>
          @foreach($modeles as $modele)
            <option value="{{ $modele->id }}">
              {{ $modele->prenom }} {{ $modele->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Statut :</label>
        <select id="filterLiveStatut" class="form-control">
          <option value="">-- Tous --</option>
          <option value="commencer">En cours</option>
          <option value="fin">Terminé</option>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Type :</label>
        <select id="filterLiveType" class="form-control">
          <option value="">-- Tous --</option>
          <option value="1">Privé</option>
          <option value="0">Public</option>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Date :</label>
        <input type="date" id="filterLiveDate" class="form-control">
      </div>

      <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-secondary w-100" onclick="resetLiveFilters()">
          <i class="fas fa-eraser"></i> Réinitialiser
        </button>
      </div>
    </div>
  </div>

  <!-- Statistiques -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Total Lives</h6>
          <p class="display-5 text-danger mb-0">{{ $statsLives['total_lives'] ?? 0 }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Lives Privés</h6>
          <p class="display-5 text-warning mb-0">{{ $statsLives['total_prives'] ?? 0 }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Lives Publics</h6>
          <p class="display-5 text-success mb-0">{{ $statsLives['total_publics'] ?? 0 }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">En cours</h6>
          <p class="display-5 text-info mb-0">{{ $statsLives['lives_en_cours'] ?? 0 }}</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Tableau -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="bg-danger text-white">
        <tr>
          <th>ID</th>
          <th>Modèle</th>
          <th>Statut</th>
          <th>Type</th>
          <th>Date Début</th>
          <th>Date Fin</th>
          <th>Durée</th>
          <th>Créé le</th>
        </tr>
      </thead>
      <tbody id="liveHistoryBody">
        @foreach($historiqueLives as $historique)
          @php
            // Calcul de la durée
            $duree = '—';
            $estEnCours = false;
            
            if ($historique->statut == 'fin' && $historique->date_commencement && $historique->date_fin) {
              $debut = \Carbon\Carbon::parse($historique->date_commencement);
              $fin = \Carbon\Carbon::parse($historique->date_fin);
              $minutes = $debut->diffInMinutes($fin);
              
              if ($minutes < 60) {
                $duree = $minutes . ' min';
              } else {
                $heures = floor($minutes / 60);
                $minutesRestantes = $minutes % 60;
                $duree = $heures . 'h ' . $minutesRestantes . 'min';
              }
            } elseif ($historique->statut == 'commencer' && $historique->date_commencement) {
              $duree = '<span class="badge bg-warning">En cours</span>';
              $estEnCours = true;
            }
          @endphp
          
          <tr data-modele-id="{{ $historique->modele_id }}" 
              data-statut="{{ $historique->statut }}" 
              data-type="{{ $historique->is_prive }}"
              data-date="{{ $historique->date_commencement ? $historique->date_commencement->format('Y-m-d') : '' }}">
            <td>{{ $historique->id }}</td>
            <td>
              @if($historique->modele)
                <strong class="text">{{ $historique->modele->prenom }}</strong>
                <br>
                <small class="text">{{ $historique->modele->nom }}</small>
              @else
                <span class="text-danger">Modèle supprimé</span>
              @endif
            </td>
            <td>
              @if($historique->statut == 'commencer')
                <span class="badge bg-success">🎬 Debut</span>
              @else
                <span class="badge bg-secondary">✅ Fin</span>
              @endif
            </td>
            <td>
              @if($historique->is_prive)
                <span class="badge bg-warning">🔒 Privé</span>
              @else
                <span class="badge bg-info">🌐 Public</span>
              @endif
            </td>
            <td>
              @if($historique->date_commencement)
                <div class="text-nowrap">
                  {{ $historique->date_commencement->format('d/m/Y') }}<br>
                  <small>{{ $historique->date_commencement->format('H:i') }}</small>
                </div>
              @else
                —
              @endif
            </td>
            <td>
              @if($historique->date_fin)
                <div class="text-nowrap">
                  {{ $historique->date_fin->format('d/m/Y') }}<br>
                  <small>{{ $historique->date_fin->format('H:i') }}</small>
                </div>
              @else
                —
              @endif
            </td>
            <td>
    @php
        // Déterminer si c'est en cours
        $estEnCours = $historique->statut == 'commencer' && !$historique->date_fin;
        
        // Calculer la durée
        if ($historique->statut == 'fin' && $historique->duree !== null) {
            $minutes = $historique->duree;
            $heures = floor($minutes / 60);
            $minRestantes = $minutes % 60;
            
            if ($heures > 0) {
                $duree = $heures . "h " . $minRestantes . "min";
            } else {
                $duree = $minutes . " min";
            }
        } elseif ($estEnCours) {
            // Calculer la durée en cours
            $debut = \Carbon\Carbon::parse($historique->date_commencement);
            $minutes = $debut->diffInMinutes(now());
            $duree = "0";
        } else {
            $duree = "-";
            $minutes = 0;
        }
    @endphp
    
    @if($estEnCours)
        {!! $duree !!}
    @else
        <strong class="{{ $minutes > 60 ? 'text-success' : 'text-info' }}">
            {{ $duree }}
        </strong>
    @endif
</td>
            <td>
              <div class="text-nowrap">
                {{ $historique->created_at->format('d/m/Y') }}<br>
                <small>{{ $historique->created_at->format('H:i') }}</small>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  @if($historiqueLives->hasPages())
    <div class="d-flex justify-content-center mt-4">
      {{ $historiqueLives->links() }}
    </div>
  @endif
</div>

<!-- 🔥 Section Connexions Modèles -->
<div id="connexions-modeles-content" class="content-section d-none">
  <h2><i class="fas fa-sign-in-alt text-danger"></i> Historique des Connexions Modèles</h2>
  <p>Suivi complet des connexions et déconnexions des modèles avec durée des sessions.</p>

  <!-- Filtres -->
  <div class="card p-3 mb-4 bg-dark text-white">
    <div class="row g-3">
      <div class="col-md-3">
        <label class="form-label">Modèle :</label>
        <select id="filterConnexionModele" class="form-control">
          <option value="">-- Tous les modèles --</option>
          @foreach($modeles as $modele)
            <option value="{{ $modele->id }}">
              {{ $modele->prenom }} {{ $modele->nom }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Statut :</label>
        <select id="filterConnexionStatut" class="form-control">
          <option value="">-- Tous --</option>
          <option value="en_cours">En cours</option>
          <option value="terminee">Terminée</option>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label">Du :</label>
        <input type="date" id="filterConnexionStart" class="form-control">
      </div>

      <div class="col-md-2">
        <label class="form-label">Au :</label>
        <input type="date" id="filterConnexionEnd" class="form-control">
      </div>

      <div class="col-md-2 d-flex align-items-end">
        <button class="btn btn-secondary w-100" onclick="resetConnexionFilters()">
          <i class="fas fa-eraser"></i> Réinitialiser
        </button>
      </div>
    </div>
  </div>

  <!-- Statistiques -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Total Connexions</h6>
          <p class="display-5 text-danger mb-0">{{ $statsConnexions['total_connexions'] ?? 0 }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Aujourd'hui</h6>
          <p class="display-5 text-warning mb-0">{{ $statsConnexions['connexions_aujourdhui'] ?? 0 }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Sessions en cours</h6>
          <p class="display-5 text-success mb-0">{{ $statsConnexions['sessions_en_cours'] ?? 0 }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card bg-dark text-white">
        <div class="card-body text-center">
          <h6 class="card-title text-white">Durée moyenne</h6>
          <p class="display-5 text-info mb-0">
            @if(isset($statsConnexions['duree_moyenne']))
              {{ floor($statsConnexions['duree_moyenne'] / 60) }} min
            @else
              0 min
            @endif
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Tableau -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="bg-danger text-white">
        <tr>
          <th>ID</th>
          <th>Modèle</th>
          <th>Date Connexion</th>
          <th>Date Déconnexion</th>
          <th>Durée</th>
          <th>Statut</th>
        </tr>
      </thead>
      <tbody id="connexionsBody">
        @foreach($connexions as $connexion)
          @php
            // Calcul de la durée
            $duree = '—';
            $statut = 'Terminée';
            $statutClass = 'secondary';
            
            if ($connexion->date_deconnexion && $connexion->date_connexion) {
              $minutes = $connexion->duree_session_secondes ? floor($connexion->duree_session_secondes / 60) : 
                        $connexion->date_connexion->diffInMinutes($connexion->date_deconnexion);
              
              if ($minutes < 60) {
                $duree = $minutes . ' min';
              } else {
                $heures = floor($minutes / 60);
                $minutesRestantes = $minutes % 60;
                $duree = $heures . 'h ' . $minutesRestantes . 'min';
              }
            } elseif (!$connexion->date_deconnexion) {
              $statut = 'En cours';
              $statutClass = 'success';
              
              // Calculer la durée en cours
              $minutes = $connexion->date_connexion->diffInMinutes(now());
              if ($minutes < 60) {
                $duree = $minutes . ' min (en cours)';
              } else {
                $heures = floor($minutes / 60);
                $minutesRestantes = $minutes % 60;
                $duree = $heures . 'h ' . $minutesRestantes . 'min (en cours)';
              }
            }
          @endphp
          
          <tr data-modele-id="{{ $connexion->modele_id }}" 
              data-statut="{{ $connexion->date_deconnexion ? 'terminee' : 'en_cours' }}"
              data-date="{{ $connexion->date_connexion->format('Y-m-d') }}">
            <td>{{ $connexion->id }}</td>
            <td>
              @if($connexion->modele)
                <strong>{{ $connexion->modele->prenom }} {{ $connexion->modele->nom }}</strong>
                <br>
                <small class="text-muted">{{ $connexion->modele->email }}</small>
              @else
                <span class="text-danger">Modèle supprimé</span>
              @endif
            </td>
            <td>
              <div class="text-nowrap">
                {{ $connexion->date_connexion->format('d/m/Y') }}<br>
                <small>{{ $connexion->date_connexion->format('H:i:s') }}</small>
              </div>
            </td>
            <td>
              @if($connexion->date_deconnexion)
                <div class="text-nowrap">
                  {{ $connexion->date_deconnexion->format('d/m/Y') }}<br>
                  <small>{{ $connexion->date_deconnexion->format('H:i:s') }}</small>
                </div>
              @else
                <span class="badge bg-warning">En cours...</span>
              @endif
            </td>
            <td>
              <strong class="{{ $statutClass == 'success' ? 'text-success' : 'text-info' }}">
                {{ $duree }}
              </strong>
            </td>
            <td>
              <span class="badge bg-{{ $statutClass }}">
                {{ $statut }}
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  @if($connexions->hasPages())
    <div class="d-flex justify-content-center mt-4">
      {{ $connexions->links() }}
    </div>
  @endif
</div>


<div id="films-descriptions-content" class="content-section d-none">
    <h2><i class="fas fa-film text-danger"></i> Films – Descriptions</h2>
    <p>Ajoutez une description et gérez les entrées.</p>

    <!-- Formulaire -->
    <form action="{{ route('films.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label class="form-label">Description du film</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button class="btn btn-primary">Ajouter</button>
    </form>

    <!-- Tableau -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="bg-danger text-white">
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            @foreach($films as $film)
                <tr>
                    <td>{{ $film->id }}</td>
                    <td style="max-width:350px;white-space:normal;">{{ $film->description }}</td>
                    <td>{{ $film->created_at->format('d/m/Y') }}</td>
                    <td>
                        <button 
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#editFilmModal"
                            data-id="{{ $film->id }}"
                            data-description="{{ $film->description }}"
                        >
                                <i class="fa fa-edit"></i>

                        </button>

                        <form action="{{ route('films.destroy', $film->id) }}" 
                              method="POST" 
                              style="display:inline-block;"
                              onsubmit="return confirm('Supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">        <i class="fa fa-trash"></i>
</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>
<div class="modal fade" id="editFilmModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">

      <form method="POST" id="filmEditForm">
        @csrf
        @method('PUT')

        <div class="modal-header">
          <h5 class="modal-title">Modifier la description</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" id="edit-id" name="id">

          <div class="mb-3">
            <label>Description</label>
            <textarea id="edit-description" name="description" class="form-control" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary">Enregistrer</button>
        </div>

      </form>
    </div>
  </div>
</div>
<script>
document.getElementById('editFilmModal').addEventListener('show.bs.modal', function (event) {
    let button = event.relatedTarget;

    let id = button.getAttribute('data-id');
    let desc = button.getAttribute('data-description');

    document.getElementById('edit-id').value = id;
    document.getElementById('edit-description').value = desc;

    document.getElementById('filmEditForm').action = "/admin/films-descriptions/" + id;
});
</script>

  <div id="dashboard-content" class="content-section">
  <h2 class="mb-4 text-white">Tableau de bord</h2>
  <p class="mb-5 text-white">Bienvenue dans l'espace d'administration de Live Beauty.</p>

  <!-- === Cards Row === -->
  <div class="row g-4 mb-5">
    <!-- Card: Nombre de Modèles -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-user-friends fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Modèles</h6>
            <p class="display-5 fw-bold text-danger mb-0">{{ $nombreDeModeles }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card: Nombre de Jetons -->
    <!--<div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-success rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-coins fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Jetons</h6>
            <p class="display-5 fw-bold text-success mb-0">{{ $nombreDeJetons }}</p>
          </div>
        </div>
      </div>
    </div>-->

    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-success rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-coins fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Jetons proposé</h6>
            <p class="display-5 fw-bold text-success mb-0">{{ $nombrejetonsProposes }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Card: Nombre de Clients -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-info rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-users fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre de Clients</h6>
            <p class="display-5 fw-bold text-info mb-0">{{ $nombreDeClients }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Card: Nombre d'Achats Photos -->
    <div class="col-md-6 col-lg-4">
      <div class="card bg-dark text-white h-100 shadow-sm border-0">
        <div class="card-body d-flex align-items-center gap-3">
          <div class="icon bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
            <i class="fas fa-shopping-cart fa-2x text-white"></i>
          </div>
          <div>
            <h6 class="mb-2 text-white">Nombre d'Achats Photos</h6>
            <p class="display-5 fw-bold text-warning mb-0">{{ $nombreAchatsPhotos }}</p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- === Charts Row === -->
  <div class="row g-4">
    <!-- Connexions -->
    <div class="col-lg-4 col-md-6">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-chart-line me-2 text-danger"></i> Connexions modèles</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-connections-container')">Plein écran</button>
        </div>
        <div id="chart-connections-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-connections"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-connections')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-connections', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-connections', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Jetons -->
    <<div class="col-lg-4 col-md-6">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-coins me-2 text-success"></i> Jetons achetés</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-tokens-container')">Plein écran</button>
        </div>
        <div id="chart-tokens-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-tokens"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-tokens')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-tokens', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-tokens', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Shows privés -->
    <div class="col-lg-4 col-md-12">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-video me-2 text-warning"></i> Shows privés</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-shows-container')">Plein écran</button>
        </div>
        <div id="chart-shows-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-shows"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-shows')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-shows', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-shows', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Achats -->
    <div class="col-lg-4 col-md-12">
      <div class="card bg-dark text-white h-100 p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="card-title mb-0 text-white"><i class="fas fa-shopping-cart me-2 text-warning"></i> Achats photos</h5>
          <button class="btn btn-sm btn-primary" onclick="openFullscreen('chart-achats-container')">Plein écran</button>
        </div>
        <div id="chart-achats-container" style="overflow-x:auto; height:350px;">
          <canvas id="chart-achats"></canvas>
          <div class="mt-2 text-center">
            <button class="btn btn-sm btn-secondary" onclick="resetZoom('chart-achats')">🔄 Reset</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-achats', -50)">⬅️</button>
            <button class="btn btn-sm btn-secondary" onclick="panChart('chart-achats', 50)">➡️</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="achats-content" class="content-section d-none">
  <h2>Achats de photos</h2>
  <p>Liste des achats effectués par les clients.</p>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Client</th>
          <th>Modèle</th>
          <th>Jetons</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($achats as $achat)
          <tr>
            <td>{{ $achat->id }}</td>
            <td>{{ $achat->user->nom }} {{ $achat->user->prenoms }} ({{ $achat->user->pseudo }})</td>
            <td>{{ $achat->modele->nom }} {{ $achat->modele->prenom }}</td>
            <td>{{ $achat->jetons }}</td>
            <td>{{ $achat->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


  <div id="shows-prives-content" class="content-section d-none">
  <h2>Shows privés</h2>
  <p>Liste des shows privés avec leurs statuts.</p>

  <!-- Filtres -->
  <div class="row mb-3" style="color:#ccc !important;">
    <div class="col-md-3">
      <select id="filterEtat" class="form-control">
        <option value="">-- Tous les états --</option>
        <option value="En attente">En attente</option>
        <option value="En cours">En cours</option>
        <option value="En pause">En pause</option>
        <option value="Terminer">Terminé</option>
      </select>
    </div>
    <div class="col-md-2">
      <button class="btn btn-secondary w-100" onclick="resetShowFilters()">Réinitialiser</button>
    </div>
  </div>

<div class="table-responsive" style="overflow-x:auto; max-width:100%;">
  <table class="table table-bordered table-striped align-middle text-center">
    <thead>
      <tr>
        <th style="white-space:nowrap;">ID</th>
        <th style="white-space:nowrap;">Client</th>
        <th style="white-space:nowrap;">Modèle</th>
        <th style="white-space:nowrap;">Date</th>
        <th style="white-space:nowrap;">Début</th>
        <th style="white-space:nowrap;">Fin</th>
        <th style="white-space:nowrap;">Durée</th>
        <th style="white-space:nowrap;">Jetons</th>
        <th style="white-space:nowrap;">État</th>
      </tr>
    </thead>
    <tbody>
      @foreach($shows as $show)
        <tr>
          <td>{{ $show->id }}</td>
          <td>{{ $show->user->nom }} {{ $show->user->prenoms }}</td>
          <td>{{ $show->modele->prenom }}</td>
          <td>{{ $show->date }}</td>
          <td>{{ $show->debut }}</td>
          <td>{{ $show->fin }}</td>
          <td>{{ $show->duree }} min</td>
          <td>{{ $show->jetons_total }}</td>
          <td><span class="badge bg-info">{{ $show->etat }}</span></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
    <div id="modeles-content" class="content-section d-none">
  <h2>Modèles</h2>
  <p>Section dédiée aux modèles disponibles.</p>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Description</th>
        <th>Vidéo</th>
        <th>Photos</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($modeles as $modele)
        <tr>
          <td>{{ $modele->nom }}</td>
          <td>{{ $modele->prenom }}</td>
          <td>{{ $modele->description }}</td>
          <td>
    @php
        // Normalisation du champ vidéo fichier
        $videoFiles = $modele->video_file;
        if (is_string($videoFiles)) {
            $decoded = json_decode($videoFiles, true);
            $videoFiles = json_last_error() === JSON_ERROR_NONE ? $decoded : [$videoFiles];
        }
        if (!is_array($videoFiles)) {
            $videoFiles = [$videoFiles];
        }

        // Normalisation du champ vidéo lien
        $videoLinks = $modele->video_link;
        if (is_string($videoLinks)) {
            $decoded = json_decode($videoLinks, true);
            $videoLinks = json_last_error() === JSON_ERROR_NONE ? $decoded : [$videoLinks];
        }
        if (!is_array($videoLinks)) {
            $videoLinks = [$videoLinks];
        }
    @endphp

    {{-- Affichage fichiers vidéos --}}
    @if(!empty($videoFiles) && !empty($videoFiles[0]))
        @foreach($videoFiles as $file)
            @if(is_string($file) && !empty($file))
                <video width="100" controls>
                    <source src="{{ asset('storage/' . $file) }}" type="video/mp4">
                </video>
            @endif
        @endforeach

    {{-- Sinon affichage liens vidéos --}}
    @elseif(!empty($videoLinks) && !empty($videoLinks[0]))
        @foreach($videoLinks as $link)
            @if(is_string($link) && !empty($link))
                <a href="{{ $link }}" target="_blank">Lien vidéo</a><br>
            @endif
        @endforeach

    @else
        Aucune
    @endif
</td>

         <td>
    @php
        // Récupérer les photos en tableau
        $photos = $modele->photos;

        if (is_string($photos)) {
            $decoded = json_decode($photos, true);
            $photos = json_last_error() === JSON_ERROR_NONE ? $decoded : [];
        }

        // S'assurer que c'est bien un tableau
        $photos = is_array($photos) ? $photos : [];
    @endphp

    @if(!empty($photos))
        <div style="display: flex; gap: 5px; flex-wrap: wrap;">
            @foreach($photos as $photo)
                @if(is_string($photo) && !empty($photo))
                    <img src="{{ asset('storage/' . $photo) }}"
                         alt="Photo"
                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                @endif
            @endforeach
        </div>
    @else
        Aucune photo
    @endif
</td>


          <td>
<a href="{{ route('modeles.edit', $modele->id) }}" 
   class="btn btn-sm btn-primary" 
   target="_blank" 
   rel="noopener noreferrer">
    <i class="fa fa-edit"></i>
</a>

  <form action="{{ route('modeles.destroy', $modele->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirmer la suppression ?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">        <i class="fa fa-trash"></i>
</button>
  </form>
</td>

        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- Modal d'image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="imageModalLabel">Aperçu de la photo</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid rounded" />
      </div>
    </div>
  </div>
</div>


    <div id="ajoute-modeles-content" class="content-section d-none">
      <h2>Ajout de modèle</h2>
<p>Remplissez le formulaire pour ajouter un nouveau modèle.</p>

<form action="{{ route('modeles.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row mb-3">
    <div class="col-md-6">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required />
    </div>
    <div class="col-md-6">
      <label for="prenom" class="form-label">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" required />
    </div>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>

  <div class="row mb-3">
  <div class="col-md-4">
    <label class="form-label">Âge</label>
    <input type="number" name="age" class="form-control" min="18" max="99">
  </div>
  <div class="col-md-4">
    <label class="form-label">Taille (cm)</label>
    <input type="text" name="taille" class="form-control">
  </div>
  <div class="col-md-4">
    <label class="form-label">Silhouette</label>
    <input type="text" name="silhouette" class="form-control">
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Poitrine</label>
    <input type="text" name="poitrine" class="form-control">
  </div>
  <div class="col-md-6">
    <label class="form-label">Fesse</label>
    <input type="text" name="fesse" class="form-control">
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Langues parlées</label>
  <select id="langue" name="langue[]" class="form-control" multiple>
    <option value="FR">Français</option>
    <option value="EN">Anglais</option>
    <option value="DE">Allemand</option>
    <option value="ES">Espagnol</option>
    <option value="IT">Italien</option>
    <option value="PT">Portugais</option>
    <option value="NL">Néerlandais</option>
  </select>
</div>



<div class="mb-3">
  <label class="form-label">Ce qu’elle propose</label>
  <textarea name="services" class="form-control" rows="4" placeholder="Décris ce qu’elle propose..."></textarea>
</div>


  <div class="mb-3">
    <label for="video_link" class="form-label">Lien vidéo (optionnel)</label>
<input type="url" class="form-control" id="video_link" name="video_link[]" placeholder="https://..." />
  </div>

  <div class="mb-3">
    <label for="video_file" class="form-label">Fichier vidéo (MP4, WebM, Ogg)</label>
    <input type="file" class="form-control" id="video_file" name="video_file[]" multiple accept="video/mp4,video/webm,video/ogg" />
  </div>

  <div class="row mb-3">
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required />
  </div>
  <div class="col-md-6">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" required />
  </div>
</div>


  <div class="mb-3">
    <label class="form-label">Photos</label>
    <div id="photos-container">
      <div class="d-flex mb-2 align-items-center photo-group">
        <input type="file" name="photos[]" class="form-control me-2" accept="image/*" />
        <button type="button" class="btn btn-success add-photo">+</button>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Ajouter le modèle</button>
</form>

    </div>
<div id="liste-jetons-proposes-content" class="content-section d-none">
  <h2>Liste des jetons proposés</h2>
  <table class="table table-bordered">
    <thead>
      <tr><th>Nom</th><th>Description</th><th>Nombre</th><th>Action</th></tr>
    </thead>
    <tbody>
      @foreach($jetonsProposes as $jp)
      <tr>
        <td>{{ $jp->nom }}</td>
        <td>{{ $jp->description }}</td>
        <td>{{ $jp->nombre_de_jetons }}</td>
        <td>
  <!-- Bouton Modifier -->
          <button class="btn btn-primary btn-sm" 
                  data-bs-toggle="modal" 
                  data-bs-target="#editJetonModal"
                  data-id="{{ $jp->id }}"
                  data-nom="{{ $jp->nom }}"
                  data-description="{{ $jp->description }}"
                  data-nombre="{{ $jp->nombre_de_jetons }}">
            Modifier
          </button>

          <!-- Bouton Supprimer -->
          <form method="POST" action="{{ route('jetons-proposes.destroy', $jp->id) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Supprimer</button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div id="ajout-jetons-proposes-content" class="content-section d-none">
  <h2>Ajouter un jeton proposé</h2>

  <form action="{{ route('jetons-proposes.store') }}" method="POST" id="form-jeton-propose">
    @csrf
    <div class="mb-3">
      <label>Nom</label>
      <input type="text" name="nom" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label>Nombre de jetons</label>
      <input type="number" name="nombre_de_jetons" class="form-control" required>
    </div>

    <!-- Optionnel : template inputs dynamiques (ajout futur) -->
    <button type="submit" class="btn btn-primary">Créer Jeton proposé</button>
  </form>
</div>

    <div id="clients-content" class="content-section d-none">
  <h2>Clients</h2>
  <p>Liste des clients enregistrés avec leur nombre de jetons.</p>
<div class="row mb-3" style="color: #ccc !important;">
  <div class="col-md-2">
    <input type="text" id="filterNom" class="form-control" placeholder="Nom">
  </div>
  <div class="col-md-2">
    <input type="text" id="filterPrenoms" class="form-control" placeholder="Prénom">
  </div>
  <div class="col-md-2">
    <input type="text" id="filterPseudo" class="form-control" placeholder="Pseudo">
  </div>
  <div class="col-md-2">
    <input type="number" id="filterJetons" class="form-control" placeholder="Jetons">
  </div>
  <div class="col-md-2">
    <input type="date" id="filterDate" class="form-control">
  </div>
  <div class="col-md-2">
    <button class="btn btn-secondary w-100" onclick="resetFilters()">Réinitialiser</button>
  </div>
</div>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
<tr>
    <th>
      Nom
      <div class="dropdown d-inline">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-sort"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#" onclick="sortTable(0,'string','asc')">A → Z</a></li>
          <li><a class="dropdown-item" href="#" onclick="sortTable(0,'string','desc')">Z → A</a></li>
        </ul>
      </div>
    </th>
    <th>Prénoms</th>
    <th>Pseudo</th>
    <th>
      Jetons
      <div class="dropdown d-inline">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-sort"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#" onclick="sortTable(3,'number','asc')">Moins → Plus</a></li>
          <li><a class="dropdown-item" href="#" onclick="sortTable(3,'number','desc')">Plus → Moins</a></li>
        </ul>
      </div>
    </th>
    <th>Email</th>
    <th>Banni</th>
    <th>
      Date de création
      <div class="dropdown d-inline">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="fas fa-sort"></i>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#" onclick="sortTable(6,'date','asc')">Ancien → Récent</a></li>
          <li><a class="dropdown-item" href="#" onclick="sortTable(6,'date','desc')">Récent → Ancien</a></li>
        </ul>
      </div>
    </th>
    <th>Actions</th>
</tr>
</thead>

<tbody>
@foreach($clients as $client)
    <tr>
        <td>{{ $client->nom }}</td>
        <td>{{ $client->prenoms }}</td>
        <td>{{ $client->pseudo }}</td>
        <td>{{ $client->jetons }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->banni ? 'Oui' : 'Non' }}</td>
        <td>{{ $client->created_at->format('d/m/Y') }}</td>
        <td>
            <!-- Bouton Ajouter Jetons -->
            <form action="{{ route('admin.clients.addTokens', $client->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <input type="number" name="jetons" min="1" 
                      class="form-control form-control-sm" 
                      style="width:80px;display:inline-block;">
                
                <button type="submit" 
                        class="btn btn-success btn-sm"
                        title="Ajouter des jetons"
                        aria-label="Ajouter des jetons">
                    <i class="fa fa-plus-circle"></i>
                </button>
            </form>

            <!-- Bouton Retirer Jetons -->
            <form action="{{ route('admin.clients.removeTokens', $client->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <input type="number" name="jetons" min="1" 
                      class="form-control form-control-sm" 
                      style="width:80px;display:inline-block;">
                
                <button type="submit" 
                        class="btn btn-danger btn-sm"
                        title="Retirer des jetons"
                        aria-label="Retirer des jetons">
                    <i class="fa fa-minus-circle"></i>
                </button>
            </form>


            <!-- Bouton Bannir/Débloquer -->
            <form action="{{ route('admin.clients.toggleBan', $client->id) }}" method="POST" style="display:inline-block;">
                @csrf
                <button type="submit" 
                        class="btn btn-{{ $client->banni ? 'warning' : 'danger' }} btn-sm"
                        title="{{ $client->banni ? 'Débloquer' : 'Bannir' }}"
                        aria-label="{{ $client->banni ? 'Débloquer' : 'Bannir' }}">
                    
                    @if($client->banni)
                        <i class="fa fa-unlock"></i>
                    @else
                        <i class="fa fa-ban"></i>
                    @endif
                </button>
            </form>


            <!-- Bouton Supprimer -->
            <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST" style="display:inline-block;" 
                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ? Cette action est irréversible.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm" aria-label="Supprimer">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>

    </table>
  </div>
</div>


    <div id="jetons-content" class="content-section d-none">
      <h2>Jetons</h2>
      <p>Gestion des types de jetons.</p>
    </div>

    <div id="liste-jetons-content" class="content-section d-none">
      <h2>Liste des jetons</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Nombre de jetons</th>
          </tr>
        </thead>
        <tbody>
@foreach($jetons as $jeton)
    <tr>
        <td>{{ $jeton->nom }}</td>
        <td>{{ $jeton->description }}</td>
        <td>{{ $jeton->nombre_de_jetons }}</td>
    </tr>
@endforeach
</tbody>
      </table>
    </div>

    <div id="ajout-jetons-content" class="content-section d-none">
      <h2>Ajout de jetons</h2>
<form id="form-jetons" action="{{ route('jetons.store') }}" method="POST">
    @csrf
        <div id="jetons-container">
          <div class="jeton-group mb-3 d-flex gap-3 flex-wrap">
            <div class="form-group flex-fill">
              <label>Nom</label>
              <input type="text" name="nom[]" class="form-control" />
            </div>
            <div class="form-group flex-fill">
              <label>Description</label>
              <input type="text" name="description[]" class="form-control" />
            </div>
            <div class="form-group flex-fill">
              <label>Nombre de jetons</label>
              <input type="number" name="nombre_de_jetons[]" class="form-control" />
            </div>
            <button type="button" class="btn btn-success btn-action add-jeton">+</button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>
    </div>
  </div>
<!-- Modal de modification -->
<div class="modal fade" id="editJetonModal" tabindex="-1" aria-labelledby="editJetonModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="editJetonModalLabel">Modifier le jeton proposé</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" id="editJetonForm">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" id="edit-id" name="id">
          <div class="mb-3">
            <label>Nom</label>
            <input type="text" id="edit-nom" name="nom" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea id="edit-description" name="description" class="form-control"></textarea>
          </div>
          <div class="mb-3">
            <label>Nombre de jetons</label>
            <input type="number" id="edit-nombre" name="nombre_de_jetons" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const mobileMenu = document.getElementById("mobileMenu");
    const navbarToggler = document.querySelector(".navbar-toggler");

    // 🔥 Fermeture automatique du menu quand on clique sur un lien (mobile)
    document.querySelectorAll("#mobileMenu .menu-link").forEach(link => {
        link.addEventListener("click", function () {

            // Si clic sur un menu avec sous-menu → on n'efface pas le menu principal
            if (this.classList.contains("has-submenu")) return;

            // On ferme le menu mobile
            if (mobileMenu.classList.contains("show")) {
                const bsCollapse = bootstrap.Collapse.getInstance(mobileMenu);
                bsCollapse.hide();
            }
        });
    });

    // 🔥 Si on clique sur un sous-menu → fermeture du dropdown mobile
    document.querySelectorAll("#mobileMenu .submenu a").forEach(sublink => {
        sublink.addEventListener("click", function () {
            if (mobileMenu.classList.contains("show")) {
                const bsCollapse = bootstrap.Collapse.getInstance(mobileMenu);
                bsCollapse.hide();
            }
        });
    });

});
</script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const menuLinks = document.querySelectorAll(".menu-link");
      const sections = {
        "Tableau de bord": document.getElementById("dashboard-content"),
        "Modèles": document.getElementById("modeles-content"),
        "Clients": document.getElementById("clients-content"),
        "Achats": document.getElementById("achats-content"), // ✅ ajout
        "Jetons": document.getElementById("jetons-content"),
        "Liste des modeles": document.getElementById("modeles-content"),
        "Ajout modeles": document.getElementById("ajoute-modeles-content"),
        "Liste des jetons": document.getElementById("liste-jetons-content"),
        "Ajout de jetons": document.getElementById("ajout-jetons-content"),
        "Shows privés": document.getElementById("shows-prives-content"),
 "Liste des jetons proposés": document.getElementById("liste-jetons-proposes-content"),
  "Ajout jetons proposés": document.getElementById("ajout-jetons-proposes-content"),
    "Jetons obtenu": document.getElementById("historique-jetons-content"),
        "Films descriptions": document.getElementById("films-descriptions-content"),
          "Historique Lives": document.getElementById("historique-lives-content"), // ← Nouveau
  "Connexions Modèles": document.getElementById("connexions-modeles-content"), // ← Nouveau



      };

      menuLinks.forEach(link => {
        link.addEventListener("click", function () {
          const label = this.textContent.trim();
          if (this.classList.contains("has-submenu")) {
            const submenu = this.nextElementSibling;
            submenu.classList.toggle("show");
            return;
          }

          menuLinks.forEach(l => l.classList.remove("active"));
          this.classList.add("active");
          Object.values(sections).forEach(section => section.classList.add("d-none"));
          if (sections[label]) {
            sections[label].classList.remove("d-none");
          }
        });
      });

      document.getElementById("jetons-container").addEventListener("click", function (e) {
        if (e.target.classList.contains("add-jeton")) {
          const group = e.target.closest(".jeton-group");
          const clone = group.cloneNode(true);
          clone.querySelectorAll("input").forEach(i => (i.value = ""));
          const btn = clone.querySelector(".add-jeton");
          btn.classList.remove("add-jeton", "btn-success");
          btn.classList.add("btn-danger", "remove-jeton");
          btn.textContent = "X";
          this.appendChild(clone);
        } else if (e.target.classList.contains("remove-jeton")) {
          e.target.closest(".jeton-group").remove();
        }
      });
    });

    // Gestion des photos dynamiques
document.getElementById("photos-container").addEventListener("click", function (e) {
  if (e.target.classList.contains("add-photo")) {
    const group = e.target.closest(".photo-group");
    const clone = group.cloneNode(true);
    clone.querySelector("input").value = "";
    const btn = clone.querySelector(".add-photo");
    btn.classList.remove("add-photo", "btn-success");
    btn.classList.add("btn-danger", "remove-photo");
    btn.textContent = "X";
    this.appendChild(clone);
  } else if (e.target.classList.contains("remove-photo")) {
    e.target.closest(".photo-group").remove();
  }
});

// Afficher une image en grand via modal
document.addEventListener("click", function(e) {
  if (e.target.matches(".zoomable-photo")) {
    const src = e.target.getAttribute("src");
    const modalImg = document.getElementById("modalImage");
    modalImg.src = src;
    const modal = new bootstrap.Modal(document.getElementById("imageModal"));
    modal.show();
  }
});
document.addEventListener("DOMContentLoaded", () => {
  const rows = document.querySelectorAll("#clients-content tbody tr");

  function filterTable() {
    const nom = document.getElementById("filterNom").value.toLowerCase();
    const prenoms = document.getElementById("filterPrenoms").value.toLowerCase();
    const pseudo = document.getElementById("filterPseudo").value.toLowerCase();
    const jetons = document.getElementById("filterJetons").value;
    const date = document.getElementById("filterDate").value;

    rows.forEach(row => {
      const tdNom = row.cells[0].innerText.toLowerCase();
      const tdPrenoms = row.cells[1].innerText.toLowerCase();
      const tdPseudo = row.cells[2].innerText.toLowerCase();
      const tdJetons = row.cells[3].innerText;
      const tdDate = row.cells[6].innerText.split("/").reverse().join("-"); // transforme en yyyy-mm-dd

      let visible = true;

      if (nom && !tdNom.includes(nom)) visible = false;
      if (prenoms && !tdPrenoms.includes(prenoms)) visible = false;
      if (pseudo && !tdPseudo.includes(pseudo)) visible = false;
      if (jetons && tdJetons != jetons) visible = false;
      if (date && tdDate !== date) visible = false;

      row.style.display = visible ? "" : "none";
    });
  }

  // écouteurs sur les inputs
  ["filterNom","filterPrenoms","filterPseudo","filterJetons","filterDate"].forEach(id => {
    document.getElementById(id).addEventListener("input", filterTable);
  });

  // bouton reset
  window.resetFilters = () => {
    ["filterNom","filterPrenoms","filterPseudo","filterJetons","filterDate"].forEach(id => {
      document.getElementById(id).value = "";
    });
    filterTable();
  };
});

function sortTable(colIndex, type = 'string', dir = 'asc') {
  const table = document.querySelector("#clients-content table tbody");
  const rows = Array.from(table.querySelectorAll("tr")).filter(r => r.style.display !== "none");

  rows.sort((a, b) => {
    let A = a.cells[colIndex].innerText.trim();
    let B = b.cells[colIndex].innerText.trim();

    if (type === 'number') {
      A = parseFloat(A) || 0;
      B = parseFloat(B) || 0;
    } else if (type === 'date') {
      A = new Date(A.split("/").reverse().join("-"));
      B = new Date(B.split("/").reverse().join("-"));
    } else {
      A = A.toLowerCase();
      B = B.toLowerCase();
    }

    if (A < B) return dir === 'asc' ? -1 : 1;
    if (A > B) return dir === 'asc' ? 1 : -1;
    return 0;
  });

  rows.forEach(row => table.appendChild(row));
}

document.addEventListener("DOMContentLoaded", () => {
  const showRows = document.querySelectorAll("#shows-prives-content tbody tr");

  function filterShows() {
    const etat = document.getElementById("filterEtat").value.toLowerCase();

    showRows.forEach(row => {
      const tdEtat = row.cells[8].innerText.toLowerCase();
      let visible = true;

      if (etat && tdEtat !== etat) visible = false;

      row.style.display = visible ? "" : "none";
    });
  }

  document.getElementById("filterEtat").addEventListener("change", filterShows);

  window.resetShowFilters = () => {
    document.getElementById("filterEtat").value = "";
    filterShows();
  };
});

  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1/dist/chartjs-plugin-zoom.min.js"></script>

<script>
  async function fetchJson(url) {
  const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
  return res.json();
}

// 1. Connexions des modèles
function renderConnectionsChart(ctx, labels, data) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Connexions/jour",
        data: data,
        fill: true,
        tension: 0.3,
        pointRadius: 3,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: ctx => `📈 ${ctx.raw} connexions`
          }
        },
        zoom: {
    pan: { enabled: true, mode: 'x' },
    zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
  }
      },
      scales: {
        x: {
          ticks: { autoSkip: false }
        },
        y: { beginAtZero: true }
      }
    }
  });
}


// 2. Jetons achetés
function renderTokensChart(ctx, labels, data) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Jetons/jour",
        data: data,
        borderColor: "rgba(75, 192, 192, 1)",
        backgroundColor: "rgba(75, 192, 192, 0.2)",
        fill: true,
        tension: 0.3,
        pointRadius: 3,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: ctx => `💰 ${ctx.raw} jetons`
          }
        },
        zoom: {
    pan: { enabled: true, mode: 'x' },
    zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
  }
      },
      scales: {
        x: { ticks: { autoSkip: false } },
        y: { beginAtZero: true }
      }
    }
  });
}


// 3. Shows privés
// 3. Shows privés avec jetons
function renderShowsChart(ctx, labels, showsData, jetonsData, details) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [
        {
          label: "Shows/jour",
          data: showsData,
          borderColor: "rgba(255, 99, 132, 1)",
          backgroundColor: "rgba(255, 99, 132, 0.2)",
          fill: true,
          tension: 0.3,
          pointRadius: 3,
          yAxisID: 'y',
        },
        {
          label: "Jetons dépensés",
          data: jetonsData,
          borderColor: "rgba(54, 162, 235, 1)",
          backgroundColor: "rgba(54, 162, 235, 0.2)",
          fill: true,
          tension: 0.3,
          pointRadius: 3,
          yAxisID: 'y1', // deuxième axe Y
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode: 'index', intersect: false },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(ctx) {
              if(ctx.dataset.label === "Shows/jour") {
                return `🎬 ${ctx.raw} shows`;
              } else if(ctx.dataset.label === "Jetons dépensés") {
                return `💎 ${ctx.raw} jetons`;
              }
            }
          }
        },
        zoom: {
          pan: { enabled: true, mode: 'x' },
          zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
        }
      },
      scales: {
        x: { ticks: { autoSkip: false } },
        y: { 
          beginAtZero: true,
          title: { display: true, text: 'Nombre de shows' },
        },
        y1: { 
          beginAtZero: true,
          position: 'right',
          title: { display: true, text: 'Jetons dépensés' },
          grid: { drawOnChartArea: false }
        }
      }
    }
  });
}

// 4. Achats photos
function renderAchatsChart(ctx, labels, data) {
  return new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: "Jetons dépensés (achats)",
        data: data,
        borderColor: "rgba(255, 206, 86, 1)",
        backgroundColor: "rgba(255, 206, 86, 0.2)",
        fill: true,
        tension: 0.3,
        pointRadius: 3,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: { label: ctx => `🛒 ${ctx.raw} jetons` }
        },
        zoom: {
          pan: { enabled: true, mode: 'x' },
          zoom: { wheel: { enabled: true }, pinch: { enabled: true }, mode: 'x' }
        }
      },
      scales: { y: { beginAtZero: true } }
    }
  });
}



  document.addEventListener('DOMContentLoaded', async () => {
  const base = '/admin';

  // Connexions
  const conn = await fetchJson(base + '/api/model-connections?days=30');
  renderConnectionsChart(
    document.getElementById('chart-connections').getContext('2d'),
    conn.labels, conn.data
  );

  // Jetons achetés
  const tokens = await fetchJson(base + '/api/tokens-purchased?days=30');
  renderTokensChart(
    document.getElementById('chart-tokens').getContext('2d'),
    tokens.labels, tokens.data
  );

  // Shows privés
  const shows = await fetchJson(base + '/api/shows-per-day?days=30');
renderShowsChart(
  document.getElementById('chart-shows').getContext('2d'),
  shows.labels,
  shows.data,
  shows.jetons,
  shows.details
);

// Achats
const achats = await fetchJson(base + '/api/achats-par-jour?days=30');
renderAchatsChart(
  document.getElementById('chart-achats').getContext('2d'),
  achats.labels, achats.data
);


});

function openFullscreen(id) {
  const elem = document.getElementById(id);
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { // Safari
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { // IE11
    elem.msRequestFullscreen();
  }
}
function resetZoom(chartId) {
  const chart = Chart.getChart(chartId);
  if (chart) {
    chart.resetZoom();
  }
}

function panChart(chartId, amount) {
  const chart = Chart.getChart(chartId);
  if (chart) {
    chart.pan({ x: amount }, undefined, 'default');
  }
}

</script>

</div>
</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const editModal = document.getElementById('editJetonModal');
  const form = document.getElementById('editJetonForm');

  editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const nom = button.getAttribute('data-nom');
    const description = button.getAttribute('data-description');
    const nombre = button.getAttribute('data-nombre');

    form.action = `/jetons-proposes/${id}`;
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-nom').value = nom;
    document.getElementById('edit-description').value = description;
    document.getElementById('edit-nombre').value = nombre;
  });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const langueSelect = document.getElementById('langue');
  new Choices(langueSelect, {
    removeItemButton: true,
    placeholderValue: 'Sélectionnez les langues',
    searchPlaceholderValue: 'Rechercher...',
    shouldSort: false,
  });
});

document.addEventListener("DOMContentLoaded", () => {

    const rows = Array.from(document.querySelectorAll('#historique-jetons-content tbody tr'));

    const filterModele      = document.getElementById("filterModele");
    const startDateInput    = document.getElementById("filterStartDate");
    const endDateInput      = document.getElementById("filterEndDate");
    const singleMonthInput  = document.getElementById("filterSingleMonth");
    const monthStartInput   = document.getElementById("filterMonthStart");
    const monthEndInput     = document.getElementById("filterMonthEnd");
    const resetBtn          = document.getElementById("resetHistoriqueFilter");

    const totalElement = document.querySelector('#historique-jetons-content .alert-info strong');

    function parseRowDate(row) {
        const dateText = row.cells[6].innerText;
        const [d, m, yHour] = dateText.split("/");
        const [y, h] = yHour.split(" ");
        return new Date(`${y}-${m}-${d} ${h}`);
    }

    function applyAllFilters() {
        const modeleVal = filterModele.value || null;

        const startDate = startDateInput.value ? new Date(startDateInput.value) : null;
        const endDate   = endDateInput.value ? new Date(endDateInput.value + " 23:59:59") : null;

        const singleMonth = singleMonthInput.value ? singleMonthInput.value.split("-") : null;
        const monthStart  = monthStartInput.value ? monthStartInput.value.split("-") : null;
        const monthEnd    = monthEndInput.value ? monthEndInput.value.split("-") : null;

        let total = 0;

        rows.forEach(row => {

            const rowDate = parseRowDate(row);
            const modeleId = row.getAttribute('data-modele-id');
            const jetons = parseInt(row.cells[4].innerText);

            let show = true;

            // Filtre modèle
            if (modeleVal && modeleId !== modeleVal) show = false;

            // Entre deux dates
            if (startDate && rowDate < startDate) show = false;
            if (endDate && rowDate > endDate) show = false;

            // Mois précis
            if (singleMonth) {
                const [smY, smM] = singleMonth;
                if (rowDate.getFullYear() != smY || (rowDate.getMonth() + 1) != smM) {
                    show = false;
                }
            }

            // Entre deux mois
            if (monthStart && monthEnd) {
                const [msY, msM] = monthStart;
                const [meY, meM] = monthEnd;

                const startMonthDate = new Date(msY, msM - 1, 1);
                const endMonthDate   = new Date(meY, meM, 0, 23, 59, 59);

                if (rowDate < startMonthDate || rowDate > endMonthDate) {
                    show = false;
                }
            }

            row.style.display = show ? "" : "none";
            if (show) total += jetons;
        });

        totalElement.innerHTML = `💎 ${total.toLocaleString("fr-FR")}`;
    }

    // Écouteurs
    [filterModele, startDateInput, endDateInput, singleMonthInput, monthStartInput, monthEndInput]
        .forEach(el => el.addEventListener("change", applyAllFilters));

    // RESET COMPLET
    resetBtn.addEventListener("click", () => {
        filterModele.value = "";
        startDateInput.value = "";
        endDateInput.value = "";
        singleMonthInput.value = "";
        monthStartInput.value = "";
        monthEndInput.value = "";

        applyAllFilters();
    });

    // Appliquer par défaut
    applyAllFilters();
});

// 🔥 Filtrage des historiques lives (côté client)
document.addEventListener('DOMContentLoaded', function() {
  const liveRows = document.querySelectorAll('#liveHistoryBody tr');
  
  function filterLiveHistory() {
    const modeleId = document.getElementById('filterLiveModele').value;
    const statut = document.getElementById('filterLiveStatut').value;
    const type = document.getElementById('filterLiveType').value;
    const date = document.getElementById('filterLiveDate').value;
    
    liveRows.forEach(row => {
      const rowModeleId = row.getAttribute('data-modele-id');
      const rowStatut = row.getAttribute('data-statut');
      const rowType = row.getAttribute('data-type');
      const rowDate = row.getAttribute('data-date');
      
      let visible = true;
      
      // Filtre par modèle
      if (modeleId && rowModeleId !== modeleId) {
        visible = false;
      }
      
      // Filtre par statut
      if (statut && rowStatut !== statut) {
        visible = false;
      }
      
      // Filtre par type
      if (type && rowType !== type) {
        visible = false;
      }
      
      // Filtre par date
      if (date && rowDate !== date) {
        visible = false;
      }
      
      row.style.display = visible ? '' : 'none';
    });
  }
  
  // Écouteurs d'événements
  document.getElementById('filterLiveModele').addEventListener('change', filterLiveHistory);
  document.getElementById('filterLiveStatut').addEventListener('change', filterLiveHistory);
  document.getElementById('filterLiveType').addEventListener('change', filterLiveHistory);
  document.getElementById('filterLiveDate').addEventListener('change', filterLiveHistory);
  
  // Fonction de réinitialisation
  window.resetLiveFilters = function() {
    document.getElementById('filterLiveModele').value = '';
    document.getElementById('filterLiveStatut').value = '';
    document.getElementById('filterLiveType').value = '';
    document.getElementById('filterLiveDate').value = '';
    
    liveRows.forEach(row => {
      row.style.display = '';
    });
  };
});
</script>
<script>
// 🔥 Filtrage des connexions modèles (côté client)
document.addEventListener('DOMContentLoaded', function() {
  const connexionRows = document.querySelectorAll('#connexionsBody tr');
  
  function filterConnexions() {
    const modeleId = document.getElementById('filterConnexionModele').value;
    const statut = document.getElementById('filterConnexionStatut').value;
    const startDate = document.getElementById('filterConnexionStart').value;
    const endDate = document.getElementById('filterConnexionEnd').value;
    
    connexionRows.forEach(row => {
      const rowModeleId = row.getAttribute('data-modele-id');
      const rowStatut = row.getAttribute('data-statut');
      const rowDate = row.getAttribute('data-date');
      
      let visible = true;
      
      // Filtre par modèle
      if (modeleId && rowModeleId !== modeleId) {
        visible = false;
      }
      
      // Filtre par statut
      if (statut && rowStatut !== statut) {
        visible = false;
      }
      
      // Filtre par date de début
      if (startDate && rowDate < startDate) {
        visible = false;
      }
      
      // Filtre par date de fin
      if (endDate && rowDate > endDate) {
        visible = false;
      }
      
      row.style.display = visible ? '' : 'none';
    });
  }
  
  // Écouteurs d'événements
  document.getElementById('filterConnexionModele').addEventListener('change', filterConnexions);
  document.getElementById('filterConnexionStatut').addEventListener('change', filterConnexions);
  document.getElementById('filterConnexionStart').addEventListener('change', filterConnexions);
  document.getElementById('filterConnexionEnd').addEventListener('change', filterConnexions);
  
  // Fonction de réinitialisation
  window.resetConnexionFilters = function() {
    document.getElementById('filterConnexionModele').value = '';
    document.getElementById('filterConnexionStatut').value = '';
    document.getElementById('filterConnexionStart').value = '';
    document.getElementById('filterConnexionEnd').value = '';
    
    connexionRows.forEach(row => {
      row.style.display = '';
    });
  };
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
@include('components.chatbot-admin')

</body>
</html>
