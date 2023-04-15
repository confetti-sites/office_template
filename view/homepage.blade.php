homepage


@php($page = section('homepage'))
{{ $page->text('title')->label('De titel van de homepagina')->placeholder('Vul hier de titel in') }}

{{ $page->text('other_title') }}

@php($footer = section('footer'))
@php($target = $footer->select('template')->byDirectory('/view/footers')->default('footer_small.blade.php'))
@include($target, ['parent' => $target])
