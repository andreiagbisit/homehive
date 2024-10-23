@component('mail::message')
# New Bulletin Board Entry: {{ $title }}

**Description:**
{{ $description }}

**Author:**
{{ $author }}

**Posted on:**
{{ $created_at }}

@component('mail::button', ['url' => route('bulletin.board')])
View Bulletin Board
@endcomponent

Thank you for staying updated!

{{ config('app.name') }}
@endcomponent
