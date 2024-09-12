<x-mail::message>
<strong> From:</strong> {{$sender_name}} <{{$sender_email}}>
<br>
<strong> Subject:</strong> {{$message_subject}}
<br><br>
{{$content}}
<br><br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>