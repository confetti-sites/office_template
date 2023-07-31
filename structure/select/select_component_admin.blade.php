@php
    /**
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var string $contentId
     */
    use Confetti\Components\Select;

    $currentValue = $contentStore->find($contentId) ?? Select::getDefaultOption($component);
    $options = Select::getAllOptions($componentStore, $component);
    // Use hashId because alpinejs can't handel the / in the key
@endphp
<div x-data="{ {{ hashId($component->key) }}: '{{ $currentValue }}' }">
    <label class="block mt-4 text-sm">
        <span class="">
            {{ $component->getDecoration('label')['value'] }}
        </span>
        <select
                class="block w-full mt-0 placeholder-gray-400 border-0 border-b-2 border-gray-300 px-0.5 focus:ring-0 focus:border-primary-300 dark:bg-transparent dark:border-gray-700 dark:text-gray-300 focus-within:text-primary-600 dark:focus-within:text-primary-400 dark:placeholder-gray-500 dark:focus:placeholder-gray-600 focus:placeholder-gray-300"
                x-model="{{ hashId($component->key) }}"
                x-bind="field"
                name="{{ $contentId }}"
        >
            @foreach($options as $value => $optionLabel)
                <option value="{{ $value }}">{{ $optionLabel }}</option>
            @endforeach
        </select>
    </label>
    @if($component->hasDecoration('fileInDirectories'))
    @php($children = $componentStore->whereParentKey($component->key))
        @foreach($children as $child)
            @php($suffix = str_replace($component->key, '', $child->key))
            <div x-show="{{ hashId($child->getDecoration('condition')['pointer_key']) }} == '{{ $child->getDecoration('condition')['pointed_key'] }}'">
                @include("structure.{$child->type}_component_admin", ['componentRepository' => $componentStore, 'component' => $child, 'contentId' => $contentId . $suffix])
            </div>
        @endforeach
    @endif
</div>
@pushonce('script_select')
    <script>
        console.log('select');
    </script>
@endpushonce
