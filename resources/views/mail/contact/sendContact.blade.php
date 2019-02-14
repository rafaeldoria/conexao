@component('mail::message')
# De {{$contact->name}},

Mensagem:

{{$contact->message}}

email: {{$contact->email}}

website: {{$contact->website}}
@endcomponent