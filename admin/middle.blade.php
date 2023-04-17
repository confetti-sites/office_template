@php /** @var \Confetti\Helpers\ComponentStore $componentStore */
    $currentComponentKey = ltrim(request()->uri(), '/admin') ?: 'section/homepage';
    $component = $componentStore->find('/' . $currentComponentKey);
@endphp
<h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
>
    Forms
</h2>

<div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
>
@include("structure.{$component->type}_component_admin", ['componentStore' => $componentStore, 'component' => $component])

</div>
