@pushonce('image_component_config')
    @php
        echo(new Confetti\Helpers\ComponentGenerator(
            // Example: $var->image('image')
            name: 'image',
            // Example: ->label('Image')->width(300)->height(200)
            decorations: [
                Confetti\Helpers\Decoration::LABEL->comment('Label is used as a field title in the admin panel'),
                Confetti\Helpers\Decoration::HEIGHT->comment('Height of the image'),
                Confetti\Helpers\Decoration::WIDTH->comment('Width of the image'),
            ],
        ))->toJson();
    @endphp
@endpushonce

@pushonce('image_component_getter')
    @php
        ob_start();
            new class extends Confetti\Helpers\ComponentStandard {
                public function get(): string
                {
                    // Get saved value
                    $content = $this->contentStore->find($this->id);
                    if ($content !== null) {
                        return $content->value;
                    }

                    // Get default value
                    $component = $this->componentStore->findOrNull($this->key);
                    $width = $component?->getDecoration('width')['value'] ?? 300;
                    $height = $component?->getDecoration('height')['value'] ?? 200;

                    return "https://picsum.photos/$width/$height?random=" . rand(0, 10000);
                }
            };
        echo ob_get_clean();
    @endphp
@endpushonce

@pushonce('image_component_field')
    @php
        /**
         * @var \Confetti\Helpers\ComponentStore $componentStore
         * @var \Confetti\Helpers\ComponentEntity $component
         * @var \Confetti\Helpers\ContentStore $contentStore
         * @var string $contentId
         */
    @endphp
    <label class="block mt-4 text-sm">
    <span class="">
        {{ $component->getDecoration('label')['value'] }}
    </span>
        <input
                type="file"
                x-bind="field"
                name="{{ $contentId }}"
                value="{{ $contentStore->find($component->key) }}"
        >
    </label>
@endpushonce

@pushonce('image_component_preview')
    <img src="{{ $component->getDecoration('label')['value'] }}" alt=""/>
@endpushonce
