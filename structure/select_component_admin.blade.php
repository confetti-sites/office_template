@php
    /**
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ComponentStore $componentStore
     */
    use Confetti\Helpers\ComponentStore;
    $dir = $component->getDecoration('byDirectory')['target'];

    $objects = new ComponentStore($dir);
    $options = [];
    foreach ($objects->whereParentKey($dir) as $object) {
        $options[$object->key] = $object->source['file'];
    }
@endphp
<div
        x-data="{ {{ hashId($component->key) }}: '{{ $dir . '/' . $component->getDecoration('default')['value'] }}' }"
>
    <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          {{ $component->getDecoration('label')['value'] }}
        </span>

        <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                x-model="{{ hashId($component->key) }}"
                name="{{ $component->key }}"
        >
            @foreach($options as $key => $value)
                <option value="{{ $key }}" {{ $component->key === $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </label>

    @foreach($componentStore->whereParentKey($component->key) as $child)
        <div x-show="{{ hashId($child->getDecoration('condition')['pointer_key']) }} == '{{ $child->getDecoration('condition')['pointed_key'] }}'">
            @include("structure.{$child->type}_component_admin", ['componentRepository' => $componentStore, 'component' => $child])
        </div>
    @endforeach
</div>
