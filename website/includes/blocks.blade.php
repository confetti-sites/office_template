@php($model = newRoot(new \model\homepage\block_holder)->label('Blocks'))

<div class="js-edit:{{ $model->getId() }} dark:bg-gray-900 pt-8 lg:mt-32">
    @php($blocks = $model->list('block')->columns(['title'])->min(1)->max(3)->get())
    @foreach($blocks as $block)
        <div class="container py-4 md:flex gap-6">
            @php($position = $block->select('image_position')->options(['left', 'right'])->get())
            <div class="md:w-1/2 opacity-100 p-2 py-2">
                <h2 class="text-2xl dark:text-white text-gray-900">{{ $block->text('title')->min(1)->max(100) }}</h2>
                <p class="mx-auto mb-8 mt-4 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400 font-body">
                    {{ $block->text('description')->max(400)->bar(['b', 'i', 'u']) }}
                </p>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 opacity-100 py-2 @if($position == 'left') -order-1 @endif">
                {!! $block->image('image')->widthPx(800)->ratio(800, 500)->getPicture(class: 'mt-4 mb-4', alt: $block->title) !!}
            </div>
        </div>
    @endforeach

    <div class=" flex items-center justify-center">
        <p class="text-gray-500 italic font-serif font-body text-sm">
            You can edit this HTML in blocks.blade.php
        </p>
    </div>
</div>
