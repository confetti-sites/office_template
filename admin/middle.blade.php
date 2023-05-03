@php
    /**
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var string $currentContentId
     */
    //    @todo convert component by id
    $component = $contentStore ? $componentStore->find($currentContentId) : null;
@endphp
<div class="container px-6 mx-auto grid">
    @if($component)
        {{-- @todo convert component by id --}}
        @php($contentId = $component->key)
        @include("structure.{$component->type}_component_admin", ['componentStore' => $componentStore, 'component' => $component, 'contentStore' => $contentStore, 'currentId' => $contentId])
        <button
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                x-bind="submit"
        >
            Save
        </button>
    @else
        <p class="text-gray-600 py-4">Nothing here. Click on a menu item.</p>
    @endif
</div>
