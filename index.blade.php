@php($page = section('page'))

title:
<h1>
    {{ $page->text('title') }}
</h1>

<br>{{ $page->text('name') }}
<br>{{ $page->text('firstname') }}
<br>{{ $page->text('lastname') }}
<br>{{ $page->text('phone') }}

