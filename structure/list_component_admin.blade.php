@php
    /**
     * @var \Confetti\Helpers\ComponentStore $componentStore
     * @var \Confetti\Helpers\ComponentEntity $component
     * @var \Confetti\Helpers\ContentStore $contentStore
     * @var string $contentId
     */
    use Confetti\Components\List_;
@endphp
<div class="container px-6 py-4 mx-auto grid">
    @php([$columns, $rows] = List_::getColumnsAndRows($component, $contentStore, $contentId))
    <table class="table-auto">
        <thead class="text-left">
        <tr>
            @foreach($columns as $column)
                <th>{{ $column['label'] }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="table-auto">
        @foreach($rows as $parentId => $row)
            <tr>
                @foreach($row as $content)
                    <td>
                        {{ $content->value }}
                    </td>
                @endforeach
                <td>
                    <button
                            @click="deleteRow"
                            name="{{ $parentId }}"
                            class="float-right justify-between px-2 py-1 mb-5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                        Delete
                    </button>
                    <a
                            href="/admin{{ $parentId }}"
                            class="float-right justify-between px-2 py-1 mb-5  text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                        Edit
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <label class="block mt-4">
        <a
                class="flex items-center justify-center px-2 py-1 mb-5 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="/admin{{ $contentId . newId() }}"
        >
            + Add {{ $component->getDecoration('label')['value'] }}
        </a>
    </label>
</div>
@pushonce('script_list')
    <script>
        function deleteRow(e) {
            let idPrefix = e.target.attributes.name.value;

            let xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            xhr.addEventListener("readystatechange", function () {
                if (this.status >= 300) {
                    console.log("Error: " + this.responseText);
                    return;
                }
                e.target.parentNode.parentNode.remove();
            });
            xhr.open("DELETE", Alpine.store('config').getApiUrl() + "/content/contents?id_prefix=" + idPrefix);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Accept", "application/json");
            xhr.send();
        }
    </script>
@endpushonce
