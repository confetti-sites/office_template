@php
    /**
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var string $contentId
     */
    use Confetti\Components\List_;$newId = bin2hex(random_bytes(4));
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
        [$columns, $rows] = List_::getColumnsAndRows($component, $contentStore, $contentId);
    @endphp
    <table class="table-auto">
        <thead class="text-left">
        <tr>
            @foreach($columns as $column)
                <th>{{ $column['label'] }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="table-auto">
        @foreach($rows as $row)
            <tr>
                @foreach($row as $content)
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
