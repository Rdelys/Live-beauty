@component('mail::message')
# {{ __('Code de vérification') }}


{{ __('Votre code à 6 chiffres est') }} :

## **{{ $code }}**

{{ __('Ce code expire dans **10 minutes**.') }}
{{ __('Saisissez-le sur le site pour valider votre inscription') }}.

{{ __('Merci') }},
{{ __('L’équipe LiveBeautyOfficielle') }}
@endcomponent
