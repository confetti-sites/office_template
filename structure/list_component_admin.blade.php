@php
    /**
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var string $contentId
     */
    // @todo move to utils
    if (!function_exists('guidv4')) {
        function guidv4() {
            // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
            $data = random_bytes(16);
            assert(strlen($data) === 16);

            // Set version to 0100
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            // Set bits 6-7 to 10
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

            // Output the 36 character UUID.
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }
    }
    $newId = guidv4();
@endphp
<label class="block mt-4 text-sm">
    <a
            class="float-right justify-between px-2 py-1 mb-5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            href="/admin{{ $component->key . $newId }}"
    >
        Add {{ $component->getDecoration('label')['value'] }}
    </a>
</label>
<div class="container px-6 mx-auto grid">
    @php
        $columns = $component->getDecoration('columns')['columns'] ?? throw new \Exception('Error: No columns defined. Use ->columns([]) to define columns. In ' . $component->source);
        $fields = array_map(static fn($column) => $column['id'], $columns);
    @endphp
    <table class="table-auto">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{ $column['label'] }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="table-auto">
        @foreach($contentStore->whereIn($contentId, $fields) as $item)
            <tr>
                @foreach($item as $content)
                    <td>
                        {{ $content['value'] }}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@pushonce('script_text')
    <script>
        console.log('text');
    </script>
@endpushonce
