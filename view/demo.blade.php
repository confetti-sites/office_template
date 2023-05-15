@php($demo = section('demo'))

<div class="dark:bg-gray-900">
    @foreach($demo->list('home_blocks')->columns(['title'])->min(1)->max(6) as $block)
        <div class="container py-4 md:flex">
            @php($position = $block->select('position')->options(['left', 'right'])->default('left'))
            @if($position->get() == 'left')
                <div class="md:w-1/2 mt-8 md:mt-0 md:mr-12 opacity-0 py-2" x-intersect="$el.classList.add('slide-in-left')">
                    <img src="https://cdn.tuk.dev/previews/desktop-2x/hero_7.jpg" alt="">
                </div>
            @endif
            <div class="md:w-1/2 opacity-0 py-2" x-intersect="$el.classList.add('slide-in-left')">
                <h2 class="text-2xl dark:text-white text-gray-900">{{ $block->text('title')->min(1)->max(100) }}</h2>
                <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl dark:text-gray-400 font-body">
                    {{ $block->text('description')->min(1)->max(600) }}
                </p>
            </div>
            @if($position == 'right')
                <div class="md:w-1/2 mt-8 md:mt-0 md:ml-12 opacity-0 py-2" x-intersect="$el.classList.add('slide-in-right')">
                    <img src="https://cdn.tuk.dev/previews/desktop-2x/hero_7.jpg" alt="">
                </div>
            @endif
        </div>
    @endforeach
</div>
