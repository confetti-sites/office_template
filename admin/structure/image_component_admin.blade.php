@php
    /**
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var string $contentId
     */
@endphp
<label class="block mt-4 text-sm">
    <span class="">
        {{ $component->getDecoration('label')['value'] }}
    </span>
    <input
            type="file"
            x-bind="field"
            name="{{ $contentId }}"
            value="{{ $contentStore->find($component->key) }}"
    >
</label>
