@foreach($model->get()['blocks'] ?? [] as $block)
    @include('pkg.confetti-cms.content.blocks.' . $block['type'], ['block' => $block])
@endforeach