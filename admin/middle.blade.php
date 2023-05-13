@php
    /**
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var string $currentContentId
     */
    // @todo move to utils
    // @todo multiple lists
    $componentKey = preg_replace('/~([a-z0-9-]+)/', '~', $currentContentId);
    // Get parent content id
    // (\/[a-z0-9_]+\/-)? - remove optional target key
    // \/[\w~-]+ - remove current relative key
    $parentContentId = preg_replace('/(\/[a-z0-9_]+\/-)?\/[\w~-]+$/', '', $currentContentId);
    $hasParent = str_contains($currentContentId, '~');
    $components = $componentStore->whereParentKey($componentKey);
@endphp
<div class="container px-6 mx-auto grid">
    @if($parentContentId !== '/section')
        <a
                class="flex items-center justify-between w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="/admin{{ $parentContentId }}"
        >
            < Back
        </a>
    @endif
    @foreach($components as $component)
        @php($suffix = str_replace($componentKey, '', $component->key))
        @include("structure.{$component->type}_component_admin", ['componentStore' => $componentStore, 'component' => $component, 'contentStore' => $contentStore, 'contentId' => $currentContentId . $suffix])
    @endforeach
    {{-- Ensure that we have is_created field on every parent key --}}
    <input type="hidden" name="{{ $currentContentId }}/is_created" value="true" x-bind="field" x-init="$dispatch('saveThisField')">
    <button
            class="flex items-center justify-between w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            parent-content-id="{{ $parentContentId }}"
            has-parent="{{ $hasParent }}"
            x-bind="submit"
    >
        Save
    </button>
</div>
