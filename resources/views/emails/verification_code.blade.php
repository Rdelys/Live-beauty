@component('mail::message')
# Code de vérification

Votre code à 6 chiffres est :

## **{{ $code }}**

Ce code expire dans **10 minutes**.  
Saisissez-le sur le site pour valider votre inscription.

Merci,  
L’équipe LiveBeautyOfficielle
@endcomponent
