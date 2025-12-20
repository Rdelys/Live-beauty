@extends('layouts.app')

@section('title', 'FAQ - Questions Fréquentes')

@section('meta-description', 'Trouvez les réponses à vos questions sur Live Beauty. Consultez notre FAQ complète.')

@section('content')

<!-- 🔥 SECTION HERO PREMIUM -->
<section class="faq-hero-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="faq-hero-content text-center">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="fas fa-question-circle me-2"></i>
                        Questions Fréquentes
                    </h1>
                    <p class="lead mb-4">
                        Trouvez rapidement les réponses à toutes vos questions concernant Live Beauty.
                    </p>
                    
                    <!-- Barre de recherche -->
                    <div class="faq-search-container mb-5">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                            <input 
                                type="text" 
                                id="faqSearch" 
                                class="form-control" 
                                placeholder="Rechercher une question..."
                                aria-label="Rechercher dans les FAQ"
                            >
                            <button class="btn" type="button" id="clearSearch">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="form-text mt-2">
                            Tapez des mots-clés comme "jetons", "paiement", "profil", etc.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 🔥 SECTION FILTRES PAR CATÉGORIE -->
<section class="faq-categories-section py-4">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-auto">
                <button class="btn btn-outline active" data-category="all">
                    <i class="fas fa-th-large me-2"></i>Toutes
                </button>
            </div>
            @foreach($categories as $category)
                @if(!empty($category))
                    <div class="col-auto">
                        <button class="btn btn-outline" data-category="{{ Str::slug($category) }}">
                            <i class="fas fa-folder me-2"></i>{{ $category }}
                        </button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- 🔥 SECTION PRINCIPALE FAQ -->
<section class="faq-main-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                
                <!-- Message si aucune FAQ -->
                @if($faqs->isEmpty())
                    <div class="card mb-5">
                        <div class="card-body text-center py-5">
                            <i class="fas fa-info-circle fa-4x mb-4"></i>
                            <h3 class="mb-3">Aucune FAQ disponible</h3>
                            <p>Les questions fréquentes seront bientôt disponibles.</p>
                        </div>
                    </div>
                @endif

                <!-- Liste des FAQ -->
                <div id="faqAccordion" class="accordion accordion-flush">
                    @foreach($faqs as $index => $faq)
                        @if($faq->active)
                            <div class="accordion-item mb-3 faq-item"
                                 data-category="{{ Str::slug($faq->categorie ?? 'general') }}"
                                 data-search="{{ strtolower($faq->question . ' ' . $faq->reponse) }}">
                                
                                <h2 class="accordion-header" id="faqHeading{{ $faq->id }}">
                                    <button class="accordion-button collapsed" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#faqCollapse{{ $faq->id }}"
                                            aria-expanded="false" 
                                            aria-controls="faqCollapse{{ $faq->id }}">
                                        
                                        <div class="d-flex align-items-center w-100">
                                            <div class="faq-icon me-3">
                                                <i class="fas fa-{{ $loop->even ? 'question' : 'lightbulb' }} fa-lg"></i>
                                            </div>
                                            <div class="faq-question-content flex-grow-1 text-start">
                                                <h5 class="mb-0 fw-bold">{{ $faq->question }}</h5>
                                                @if($faq->categorie)
                                                    <small class="category-badge">
                                                        <i class="fas fa-tag me-1"></i>{{ $faq->categorie }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="faq-order-badge ms-3">
                                                <span class="badge rounded-pill">
                                                    {{ $index + 1 }}
                                                </span>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                
                                <div id="faqCollapse{{ $faq->id }}" 
                                     class="accordion-collapse collapse" 
                                     aria-labelledby="faqHeading{{ $faq->id }}"
                                     data-bs-parent="#faqAccordion">
                                    
                                    <div class="accordion-body">
                                        <div class="faq-answer-content">
                                            {!! nl2br(e($faq->reponse)) !!}
                                            
                                            @if($faq->created_at)
                                                <div class="mt-4 pt-3">
                                                    <small>
                                                        <i class="fas fa-calendar-alt me-1"></i>
                                                        Mis à jour : {{ $faq->updated_at->format('d/m/Y') }}
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Message aucun résultat recherche -->
                <div id="noResults" class="card d-none">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-search fa-4x mb-4"></i>
                        <h3 class="mb-3">Aucun résultat trouvé</h3>
                        <p>Essayez avec d'autres mots-clés ou consultez toutes les catégories.</p>
                        <button class="btn btn-outline mt-3" id="showAllFaqs">
                            <i class="fas fa-eye me-2"></i>Afficher toutes les FAQ
                        </button>
                    </div>
                </div>

                <!-- Statistiques -->
                @if($faqs->isNotEmpty())
                    <div class="mt-5 pt-4">
                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <div class="rounded p-3 stat-card">
                                    <h3 class="fw-bold">{{ $faqs->where('active', true)->count() }}</h3>
                                    <p class="mb-0">Questions actives</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="rounded p-3 stat-card">
                                    <h3 class="fw-bold">{{ $categories->count() }}</h3>
                                    <p class="mb-0">Catégories</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="rounded p-3 stat-card">
                                    <h3 class="fw-bold">{{ $faqs->max('order') ?? 0 }}</h3>
                                    <p class="mb-0">Ordre maximum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

<!-- 🔥 SECTION CONTACT -->
<section class="faq-contact-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="card">
                    <div class="card-body p-5">
                        <i class="fas fa-headset fa-4x mb-4"></i>
                        <h2 class="mb-3">Vous ne trouvez pas votre réponse ?</h2>
                        <p class="mb-4">
                            Notre équipe de support est disponible pour répondre à toutes vos questions.
                        </p>
                        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
                            <a href="{{ route('home') }}" class="btn btn-outline btn-lg">
                                <i class="fas fa-home me-2"></i>Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 🔥 VARIABLES GLOBALES
    const faqItems = document.querySelectorAll('.faq-item');
    const searchInput = document.getElementById('faqSearch');
    const clearSearchBtn = document.getElementById('clearSearch');
    const categoryButtons = document.querySelectorAll('[data-category]');
    const noResultsDiv = document.getElementById('noResults');
    const showAllFaqsBtn = document.getElementById('showAllFaqs');
    let activeCategory = 'all';
    let activeSearch = '';

    // 🔥 FONCTION POUR FILTRER LES FAQ
    function filterFaqs() {
        let visibleCount = 0;
        
        faqItems.forEach(item => {
            const matchesCategory = activeCategory === 'all' || 
                                   item.getAttribute('data-category') === activeCategory;
            
            const matchesSearch = activeSearch === '' || 
                                item.getAttribute('data-search').includes(activeSearch);
            
            const shouldShow = matchesCategory && matchesSearch;
            
            if (shouldShow) {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
                item.classList.remove('d-none');
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(-10px)';
                item.classList.add('d-none');
                item.style.display = 'none';
            }
        });
        
        // Afficher/masquer le message "aucun résultat"
        if (visibleCount === 0 && (activeSearch !== '' || activeCategory !== 'all')) {
            noResultsDiv.classList.remove('d-none');
            noResultsDiv.style.opacity = '1';
            noResultsDiv.style.transform = 'translateY(0)';
        } else {
            noResultsDiv.classList.add('d-none');
        }
        
        // Mettre à jour le compteur
        updateFaqCount(visibleCount);
    }

    // 🔥 METTRE À JOUR LE COMPTEUR
    function updateFaqCount(count) {
        const counter = document.getElementById('faqCounter');
        if (!counter) {
            const heroContent = document.querySelector('.faq-hero-content');
            const counterHtml = `
                <div class="faq-counter mt-3" id="faqCounter">
                    <span class="badge rounded-pill px-3 py-2">
                        <i class="fas fa-list me-1"></i>
                        <span id="faqCount">${count}</span> résultats
                    </span>
                </div>
            `;
            heroContent.insertAdjacentHTML('beforeend', counterHtml);
        } else {
            document.getElementById('faqCount').textContent = count;
        }
    }

    // 🔥 GESTION DE LA RECHERCHE
    searchInput.addEventListener('input', function(e) {
        activeSearch = e.target.value.toLowerCase().trim();
        filterFaqs();
        
        if (activeSearch.length > 0) {
            clearSearchBtn.style.display = 'flex';
        } else {
            clearSearchBtn.style.display = 'none';
        }
    });

    // 🔥 BOUTON EFFACER RECHERCHE
    clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        activeSearch = '';
        filterFaqs();
        clearSearchBtn.style.display = 'none';
        searchInput.focus();
    });

    // 🔥 GESTION DES CATÉGORIES
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            activeCategory = this.getAttribute('data-category');
            filterFaqs();
        });
    });

    // 🔥 AFFICHER TOUTES LES FAQ
    if (showAllFaqsBtn) {
        showAllFaqsBtn.addEventListener('click', function() {
            activeCategory = 'all';
            activeSearch = '';
            searchInput.value = '';
            
            categoryButtons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('data-category') === 'all') {
                    btn.classList.add('active');
                }
            });
            
            filterFaqs();
            clearSearchBtn.style.display = 'none';
        });
    }

    // 🔥 OUVERTURE AUTOMATIQUE PAR ANCRE URL
    const hash = window.location.hash;
    if (hash) {
        const targetId = hash.replace('#', '');
        const targetElement = document.getElementById(targetId);
        if (targetElement && targetElement.classList.contains('accordion-collapse')) {
            const bsCollapse = new bootstrap.Collapse(targetElement, {
                toggle: true
            });
            
            setTimeout(() => {
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 300);
        }
    }

    // 🔥 COPIER LE LIEN DE LA FAQ
    faqItems.forEach(item => {
        const heading = item.querySelector('.accordion-header');
        const faqId = heading.id.replace('faqHeading', '');
        
        heading.addEventListener('click', function(e) {
            if (!e.target.closest('.copy-link-btn')) {
                const newUrl = `${window.location.pathname}#faqHeading${faqId}`;
                window.history.replaceState(null, null, newUrl);
            }
        });
        
        const button = item.querySelector('.accordion-button');
        const shareBtn = document.createElement('button');
        shareBtn.className = 'copy-link-btn btn btn-sm btn-outline ms-3';
        shareBtn.innerHTML = '<i class="fas fa-link"></i>';
        shareBtn.title = 'Copier le lien';
        shareBtn.setAttribute('aria-label', 'Copier le lien vers cette FAQ');
        
        shareBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            const faqUrl = `${window.location.origin}${window.location.pathname}#faqHeading${faqId}`;
            
            navigator.clipboard.writeText(faqUrl).then(() => {
                const originalHtml = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i>';
                this.classList.remove('btn-outline');
                this.classList.add('btn-success');
                
                setTimeout(() => {
                    this.innerHTML = originalHtml;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline');
                }, 2000);
            });
        });
        
        button.querySelector('.faq-question-content').appendChild(shareBtn);
    });

    // 🔥 INITIALISATION
    filterFaqs();
    setTimeout(() => {
        faqItems.forEach(item => {
            item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        });
    }, 100);
});
</script>
@endsection

@section('styles')
<style>
/* ============================================
   THEME PREMIUM - TEXTES INDÉPENDANTS DES FONDS
============================================ */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --accent-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --dark-bg: #0f0f23;
    --card-bg: #1a1a2e;
    --light-bg: #f8f9fa;
    --text-primary: #ffffff;
    --text-secondary: #a0a0c0;
    --text-dark: #2d3748;
    --border-color: #2a2a3e;
    --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* 🔥 SECTION HERO */
.faq-hero-section {
    background: var(--dark-bg);
    padding: 6rem 0 4rem;
    position: relative;
    overflow: hidden;
}

.faq-hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--accent-gradient);
}

.faq-hero-content h1 {
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
    margin-bottom: 1.5rem;
}

.faq-hero-content p {
    color: var(--text-secondary);
    font-size: 1.25rem;
}

/* 🔥 BARRE DE RECHERCHE */
.faq-search-container {
    max-width: 600px;
    margin: 0 auto;
}

.faq-search-container .input-group {
    background: var(--card-bg);
    border-radius: 50px;
    padding: 0.25rem;
    border: 2px solid transparent;
    transition: var(--transition);
    box-shadow: var(--shadow);
}

.faq-search-container .input-group:focus-within {
    border-color: #667eea;
    transform: translateY(-2px);
}

.faq-search-container .input-group-text {
    background: transparent;
    border: none;
    color: #667eea;
    font-size: 1.2rem;
    padding-left: 1.5rem;
}

.faq-search-container .form-control {
    background: transparent;
    border: none;
    color: var(--text-primary);
    padding: 1rem 0.5rem;
    font-size: 1.1rem;
}

.faq-search-container .form-control::placeholder {
    color: var(--text-secondary);
}

.faq-search-container .form-control:focus {
    box-shadow: none;
}

.faq-search-container .btn {
    background: var(--accent-gradient);
    border: none;
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    transition: var(--transition);
}

.faq-search-container .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(245, 87, 108, 0.3);
}

.faq-search-container .form-text {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

/* 🔥 FILTRES CATÉGORIES */
.faq-categories-section {
    background: var(--card-bg);
    backdrop-filter: blur(10px);
    position: sticky;
    top: 0;
    z-index: 100;
}

.btn-outline {
    background: transparent;
    border: 2px solid var(--border-color);
    color: var(--text-secondary);
    border-radius: 50px;
    padding: 0.5rem 1.5rem;
    transition: var(--transition);
}

.btn-outline:hover,
.btn-outline.active {
    background: var(--accent-gradient);
    border-color: transparent;
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow);
}

/* 🔥 ACCORDÉON FAQ */
.accordion-item {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 15px !important;
    margin-bottom: 1rem;
    overflow: hidden;
    transition: var(--transition);
    box-shadow: var(--shadow);
}

.accordion-item:hover {
    transform: translateY(-5px);
    border-color: #667eea;
}

.accordion-button {
    background: var(--card-bg);
    color: var(--text-primary);
    padding: 1.5rem;
    font-size: 1.1rem;
    border: none;
}

.accordion-button:not(.collapsed) {
    background: var(--card-bg);
    color: var(--text-primary);
    box-shadow: none;
}

.accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23667eea'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    transition: transform 0.3s ease;
}

.accordion-button:not(.collapsed)::after {
    transform: rotate(-180deg);
}

.accordion-body {
    background: var(--dark-bg);
    color: var(--text-secondary);
    padding: 1.5rem;
    border-top: 1px solid var(--border-color);
    line-height: 1.8;
}

/* 🔥 ICONES ET BADGES */
.faq-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 12px;
    color: #667eea;
}

.faq-order-badge .badge {
    background: var(--accent-gradient);
    color: white;
    font-size: 0.9rem;
    padding: 0.5rem 0.8rem;
    font-weight: 600;
}

.category-badge {
    color: #764ba2;
    font-size: 0.85rem;
    margin-top: 0.25rem;
}

/* 🔥 CARTES STATISTIQUES */
.stat-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-5px);
    border-color: #667eea;
    box-shadow: var(--shadow);
}

.stat-card h3 {
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 2.5rem;
}

.stat-card p {
    color: var(--text-secondary);
}

/* 🔥 SECTION CONTACT */
.faq-contact-section {
    background: var(--dark-bg);
}

.faq-contact-section .card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    overflow: hidden;
}

.faq-contact-section i {
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.faq-contact-section h2 {
    color: var(--text-primary);
}

.faq-contact-section p {
    color: var(--text-secondary);
}

.faq-contact-section .btn-outline {
    border-color: #667eea;
    color: #667eea;
}

.faq-contact-section .btn-outline:hover {
    background: var(--accent-gradient);
    color: white;
}

/* 🔥 BOUTON PARTAGE */
.copy-link-btn {
    transition: var(--transition);
}

.copy-link-btn:hover {
    transform: scale(1.1);
}

/* 🔥 RESPONSIVE */
@media (max-width: 768px) {
    .faq-hero-section {
        padding: 4rem 0 3rem;
    }
    
    .faq-hero-content h1 {
        font-size: 2.5rem;
    }
    
    .faq-categories-section .row {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        scrollbar-width: thin;
    }
    
    .faq-categories-section .col-auto {
        flex: 0 0 auto;
    }
    
    .btn-outline {
        padding: 0.4rem 1rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .faq-hero-section {
        padding: 3rem 0 2rem;
    }
    
    .faq-hero-content h1 {
        font-size: 2rem;
    }
    
    .faq-search-container .input-group {
        flex-direction: column;
        border-radius: 15px !important;
    }
    
    .faq-search-container .input-group-text,
    .faq-search-container .form-control,
    .faq-search-container .btn {
        width: 100%;
        border-radius: 15px !important;
        margin-bottom: 0.5rem;
    }
    
    .accordion-button {
        padding: 1.25rem;
    }
    
    .faq-icon {
        width: 40px;
        height: 40px;
    }
}

/* 🔥 ANIMATIONS */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.faq-item {
    animation: fadeInUp 0.6s ease forwards;
    animation-delay: calc(var(--item-index, 0) * 0.1s);
    opacity: 0;
}

/* 🔥 ACCESSIBILITÉ */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* 🔥 MODE SOMBRE/AUTOMATIQUE */
@media (prefers-color-scheme: light) {
    :root {
        --dark-bg: #f8f9fa;
        --card-bg: #ffffff;
        --text-primary: #2d3748;
        --text-secondary: #718096;
        --border-color: #e2e8f0;
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
}
</style>
@endsection