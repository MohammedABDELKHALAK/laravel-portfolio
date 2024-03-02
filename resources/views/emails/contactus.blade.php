<x-mail::message>
# Hello, you have got a message

<h3> Name: {{ $data['name'] }}</h3>
<h3> Name: {{ $data['email'] }}</h3>
<h3> Name: {{ $data['message'] }}</h3>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
