@php
    /**
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ComponentStore $componentStore
     */
    use Confetti\Helpers\ComponentStore;
    $options = [];
    if ($component->hasDecoration('byDirectory')) {
        $dir = $component->getDecoration('byDirectory')['target'];
        $objects = new ComponentStore($dir);
        foreach ($objects->whereParentKey($dir) as $object) {
            $options[$object->key] = $object->source['file'];
        }
    } elseif ($component->hasDecoration('options')) {
        foreach ($component->getDecoration('options')['options'] as $option) {
            $options[$option['id']] = $option['label'];
        }
    } else {
        throw new \RuntimeException('Select component must have either byDirectory or options decoration');
    }
@endphp
<div x-data="{ {{ hashId($component->key) }}: '{{ $dir . '/' . $component->getDecoration('default')['value'] }}' }">
    <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">
            {{ $component->getDecoration('label')['value'] }}
        </span>
        <select
                class="block w-full mt-0 placeholder-gray-400 border-0 border-b-2 border-gray-300 px-0.5 focus:ring-0 focus:border-primary-300 dark:bg-transparent dark:border-gray-700 dark:text-gray-300 focus-within:text-primary-600 dark:focus-within:text-primary-400 dark:placeholder-gray-500 dark:focus:placeholder-gray-600 focus:placeholder-gray-300"
                x-model="{{ hashId($component->key) }}"
                x-bind="field"
                name="{{ $component->key }}"
        >
            @foreach($options as $key => $value)
                <option value="{{ $key }}" {{ $component->key === $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </label>
    @if($component->hasDecoration('byDirectory'))
        @foreach($componentStore->whereParentKey($component->key) as $child)
            <div x-show="{{ hashId($child->getDecoration('condition')['pointer_key']) }} == '{{ $child->getDecoration('condition')['pointed_key'] }}'">
                @include("structure.{$child->type}_component_admin", ['componentRepository' => $componentStore, 'component' => $child])
            </div>
        @endforeach
    @endif
</div>
@pushonce('script_select')
    <script>
        console.log('select');
    </script>
@endpushonce
