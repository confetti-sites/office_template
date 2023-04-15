@php /**
 * @var \Confetti\Helpers\ComponentEntity $component
 * @var \Confetti\Helpers\ComponentStore $componentStore
 */ @endphp
<label class="block mt-4 text-sm">
    <span class="text-gray-700 dark:text-gray-400">
        {{ $component->getDecoration('label')['value'] }}
    </span>
    <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="{{ $component->getDecoration('placeholder')['value'] }}"
    >
</label>
