homepage
<script src="https://cdn.tailwindcss.com"></script>


@php($page = section('homepage'))
<br>
{{ $page->text('title')->label('De titel van de homepagina')->placeholder('Vul hier de titel in') }}
<br>
{{ $page->text('other_title') }}
<br>
<br>
<br>
<br>

@php($footer = section('footer'))
@php($target = $footer->select('template')->byDirectory('/view/footers')->default('footer_small.blade.php'))

@include($target->get(), ['parent' => $target])
