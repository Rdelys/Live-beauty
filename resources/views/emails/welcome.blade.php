@component('mail::message')
# 😍 Bienvenue sur LiveBeautyOfficielle {{ $user->pseudo }} !

Merci pour votre inscription 💖

🎁 **Promotion spéciale de bienvenue :**  
Pour chaque crédit acheté, **1 crédit supplémentaire** vous est offert automatiquement 😱

> Exemple : 5 crédits achetés = **10 crédits à utiliser !**

---

Si vous avez des questions ou besoin d’assistance, notre équipe est à votre disposition à tout moment.

🔥 Profitez-en dès maintenant pour vivre une expérience unique avec nos modèles en ligne !

@component('mail::button', ['url' => url('/dashboard')])
👉 Accédez à votre espace membre
@endcomponent

À très vite,  
**L’équipe LiveBeautyOfficielle**
@endcomponent
