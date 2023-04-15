@php
    $componentRepository = new \Confetti\Helpers\ComponentStore('/section')
@endphp

<ul class="mt-6">
    @foreach($componentRepository->whereParentKey('/section') as $component)
        <li class="relative px-6 py-3">
            <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="/admin{{ $component->key }}"
            >
                <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                >
                    <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    ></path>
                </svg>
                <span class="ml-4">{{ $component->getDecoration('label')['value'] }}</span>
            </a>
        </li>
    @endforeach
</ul>
