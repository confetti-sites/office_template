@php
    /**
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var string $currentContentId
     */
    // @todo move to utils
    // @todo multiple lists
    $componentKey = preg_replace('/~([a-f0-9-]+)/', '~', $currentContentId);
    $parentContentId = preg_replace('/\/[\w~-]+$/', '', $currentContentId);
    $hasParent = str_contains($currentContentId, '~');
    $components = $componentStore->whereParentKey($componentKey);
//
//    echo '<pre>';
//    print_r($componentKey);
//    print_r($components);
//    echo '</pre>';
@endphp
<div class="container px-6 mx-auto grid">
    @foreach($components as $component)
        @php($suffix = str_replace($componentKey, '', $component->key))
        @include("structure.{$component->type}_component_admin", ['componentStore' => $componentStore, 'component' => $component, 'contentStore' => $contentStore, 'contentId' => $currentContentId . $suffix])
    @endforeach
    <button
            class="flex items-center justify-between w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            parent-content-id="{{ $parentContentId }}"
            has-parent="{{ $hasParent }}"
            x-bind="submit"
    >
        Save
    </button>
</div>
