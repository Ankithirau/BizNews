<x-mail::message>

BIZ NEWS <br>
Thank you for contacting us!
We've received your message and will get back to you shortly.<br>
Name: {{$details['name'] ."\n" }}
Email: {{$details['email']."\n" }}
Message: {{$details['message'] ."\n" }}

If you have any urgent inquiries, please call us at 8956451235.

    {{-- <x-mail::button :url="''">
        Button Text
    </x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>