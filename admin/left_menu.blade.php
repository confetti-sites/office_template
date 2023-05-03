@php
    /**
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var \Confetti\Helpers\ComponentEntity[] $menuComponents
     * @var string $currentContentId
     */
@endphp
<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
        Windmill
    </a>
    <ul class="mt-6">
        @foreach($menuComponents as $component)
        {{-- @todo component key by id --}}
        @php($isCurrent = $component->key === $currentContentId)
        <li class="relative px-3 py-3">
            @if($isCurrent)<span class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-primary-600" aria-hidden="true"></span>@endif
            <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @if($isCurrent)text-gray-800 dark:text-gray-100 @endif"
                    href="/admin{{ $component->key }}"
            >
                <span class="ml-4">{{ $component->getDecoration('label')['value'] }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
