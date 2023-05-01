@php /** @var \Confetti\Helpers\ComponentStore $componentStore */

    $currentComponentKey = ltrim(request()->uri(), '/admin') ?: 'section/homepage';
    $component = $componentStore->find('/' . $currentComponentKey);
@endphp
<div class="container px-6 mx-auto grid">
    @include("structure.{$component->type}_component_admin", ['componentStore' => $componentStore, 'component' => $component])
    <button
            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            x-bind="submit"
    >
        Save
    </button>
</div>
