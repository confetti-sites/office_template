@php
/** @var \Confetti\Helpers\HasMapInterface $parent */
$footer = on($parent)
@endphp
<br>
<br>
{{ $footer->text('title_of_big_footer')->label('De titel van de footer')->placeholder('Vul hier de titel in') }}
