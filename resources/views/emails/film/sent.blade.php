@component('mail::message')
# Votre film est disponible 🎉

Bonjour {{ $film->user->pseudo }},

Le film que vous avez commandé auprès de **{{ $film->modele->pseudo }}** vient d’être envoyé.

**Durée :** {{ $film->minutes }} minutes  
**Détails :** {{ $film->detail }}

Merci de votre confiance !  
@endcomponent
