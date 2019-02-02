@component('mail::message')
# Olá {{$user->username}},

Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.

@component('mail::button', ['url' => $url])
Resetar Senha
@endcomponent

Se você não solicitou uma redefinição de senha, ignore este email.<br>
Mas faça uma conexão - conexaonerd.com.br

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
