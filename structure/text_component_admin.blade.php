@php /**
 * @var \Confetti\Helpers\ComponentEntity $component
 * @var \Confetti\Helpers\ComponentStore $componentStore
 */ @endphp
<label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $component->getDecoration('label')['value'] }}
    </span>
    <input
            type="text"
            class="block w-full mt-1 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:ring-gray focus-within:text-primary-600 dark:focus-within:text-primary-400 dark:placeholder-gray-500 dark:focus:placeholder-gray-600 focus:placeholder-gray-300"
            placeholder="{{ $component->getDecoration('placeholder')['value'] }}"
            name="{{ $component->key }}"
            value="{{ $component->getDecoration('default')['value'] }}"
    >
</label>

@pushonce('script_text')
    <script>
        console.log('text');
    </script>
@endpushonce
