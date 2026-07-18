<x-mail::message>
# New Portfolio Contact

You received a new message through your portfolio site.

**From:** {{ $contactMessage->name }} ({{ $contactMessage->email }})
@if($contactMessage->phone)
**Phone:** {{ $contactMessage->phone }}
@endif
**Subject:** {{ $contactMessage->subject ?: '—' }}

---

{{ $contactMessage->message }}

---

<x-mail::button :url="'mailto:' . $contactMessage->email">
Reply to {{ $contactMessage->name }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
