@component('mail::message')
# 😍 {{ __('Bienvenue sur LiveBeautyOfficielle') }} {{ $user->pseudo }} !

{{ __('Merci pour votre inscription') }} 💖

🎁 **{{ __('Promotion spéciale de bienvenue') }} :**  

{{ __('Pour chaque crédit acheté') }}, ** {{ __('1 crédit supplémentaire') }}** {{ __('vous est offert automatiquement') }} 😱

---

{{ __('Si vous avez des questions ou besoin d’assistance, notre équipe est à votre disposition à tout moment') }}.


🔥 {{ __('Profitez-en dès maintenant pour vivre une expérience unique avec nos modèles en ligne') }} !

@component('mail::button', ['url' => url('/dashboard')])
👉 {{ __('Accédez à votre espace membre') }} 
@endcomponent

{{ __('À très vite') }},  
**{{ __('L’équipe LiveBeautyOfficielle') }}**
@endcomponent
