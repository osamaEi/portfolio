<x-mail::message>
# New Portfolio Contact

You received a new message through your portfolio site.

**From:** {{ $contactMessage->name }} ({{ $contactMessage->email }})
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
