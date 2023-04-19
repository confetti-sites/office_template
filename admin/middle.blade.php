@php /** @var \Confetti\Helpers\ComponentStore $componentStore */
    $currentComponentKey = ltrim(request()->uri(), '/admin') ?: 'section/homepage';
    $component = $componentStore->find('/' . $currentComponentKey);
@endphp
<div class="container px-6 mx-auto grid">
    @include("structure.{$component->type}_component_admin", ['componentStore' => $componentStore, 'component' => $component])
</div>
