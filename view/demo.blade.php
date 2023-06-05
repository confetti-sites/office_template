@php($demo = section('demo'))

<div class="dark:bg-gray-900 pt-8">
    @php($blocks = $demo->list('blocks')->columns(['title'])->min(1)->max(6))
    @foreach($blocks as $block)
        <div class="container py-4 md:flex gap-6">
            @php($position = $block->select('image_position')->options(['left', 'right'])->default('right'))
            <div class="md:w-1/2 opacity-0 p-2 py-2" x-intersect="$el.classList.add('slide-in-{{ $position }}')">
                <h2 class="text-2xl dark:text-white text-gray-900">{{ $block->text('title')->min(1)->max(100) }}</h2>
                <p class="mx-auto mb-8 mt-4 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400 font-body">
                    {!! $block->text('description')->min(1)->max(600) !!}
                </p>
            </div>
            <div
                    class="md:w-1/2 mt-8 md:mt-0 opacity-0 py-2 @if($position == 'left') -order-1 @endif"
                    x-intersect="$el.classList.add('slide-in-{{ $position }}')"
            >
                <img src="https://cdn.tuk.dev/previews/desktop-2x/hero_7.jpg" alt="">
            </div>
        </div>
    @endforeach
</div>
