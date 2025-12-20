@extends('layouts.app')

@section('title', $faq->question . ' - FAQ')

@section('meta-description', Str::limit($faq->reponse, 160))

@section('content')

<section class="faq-detail-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb bg-dark rounded p-3">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-white-50">
                                <i class="fas fa-home"></i> Accueil
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('faq.index') }}" class="text-white-50">
                                <i class="fas fa-question-circle"></i> FAQ
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-danger" aria-current="page">
                            Question #{{ $faq->id }}
                        </li>
                    </ol>
                </nav>

                <!-- Question -->
                <div class="card bg-dark border-danger mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="faq-detail-icon me-3">
                                <i class="fas fa-question-circle fa-3x text-danger"></i>
                            </div>
                            <div>
                                <h1 class="h3 text-white mb-2">{{ $faq->question }}</h1>
                                @if($faq->categorie)
                                    <span class="badge bg-danger rounded-pill px-3 py-2">
                                        <i class="fas fa-tag me-1"></i>{{ $faq->categorie }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Réponse -->
                <div class="card bg-darker border-warning mb-4">
                    <div class="card-body p-4">
                        <div class="faq-answer-content">
                            {!! nl2br(e($faq->reponse)) !!}
                        </div>
                        
                        <div class="mt-4 pt-3 border-top border-secondary">
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-white-50">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        Mis à jour : {{ $faq->updated_at->format('d/m/Y à H:i') }}
                                    </small>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <small class="text-white-50">
                                        <i class="fas fa-sort-numeric-up me-1"></i>
                                        Ordre : {{ $faq->order }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between mb-5">
                    <a href="{{ route('faq.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left me-2"></i>Retour à la FAQ
                    </a>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-light" onclick="window.print()">
                            <i class="fas fa-print me-2"></i>Imprimer
                        </button>
                        <button type="button" class="btn btn-outline-light" id="copyLinkBtn">
                            <i class="fas fa-link me-2"></i>Copier le lien
                        </button>
                    </div>
                </div>

                <!-- FAQs similaires -->
                @if($relatedFaqs->isNotEmpty())
                    <div class="mt-5">
                        <h3 class="text-white mb-4">
                            <i class="fas fa-random me-2 text-warning"></i>
                            Questions similaires
                        </h3>
                        
                        <div class="accordion accordion-flush" id="relatedAccordion">
                            @foreach($relatedFaqs as $relatedFaq)
                                <div class="accordion-item bg-dark border-secondary mb-2">
                                    <h4 class="accordion-header" id="relatedHeading{{ $relatedFaq->id }}">
                                        <button class="accordion-button collapsed bg-darker text-white" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#relatedCollapse{{ $relatedFaq->id }}">
                                            {{ $relatedFaq->question }}
                                        </button>
                                    </h4>
                                    <div id="relatedCollapse{{ $relatedFaq->id }}" 
                                         class="accordion-collapse collapse" 
                                         data-bs-parent="#relatedAccordion">
                                        <div class="accordion-body text-white-50">
                                            {!! nl2br(e($relatedFaq->reponse)) !!}
                                            <div class="mt-3">
                                                <a href="{{ route('faq.show', ['id' => $relatedFaq->id]) }}" 
                                                   class="btn btn-sm btn-outline-warning">
                                                    Voir en détail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Copier le lien
    const copyLinkBtn = document.getElementById('copyLinkBtn');
    if (copyLinkBtn) {
        copyLinkBtn.addEventListener('click', function() {
            const url = window.location.href;
            
            navigator.clipboard.writeText(url).then(() => {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check me-2"></i>Lien copié!';
                this.classList.remove('btn-outline-light');
                this.classList.add('btn-success');
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                    this.classList.add('btn-outline-light');
                }, 2000);
            });
        });
    }
});
</script>
@endsection