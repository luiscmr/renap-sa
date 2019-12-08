@component('mail::message')

# ¡Hola!

## Tu nueva contraseña de {{ env('APP_NAME') }} ha sido asignada.

**CUI:** {{ $cui }}

**Contraseña:** {{ $password }}


@component('mail::button', ['url' => route('login')])
Inicia Sesión
@endcomponent

Saludos,
{{ env('APP_NAME') }}

@endcomponent
