@php($blocks = section('home_block'))
<ul>
    @foreach($blocks->list('block')->columns(['title', 'color']) as $block1)
        <li>{{ $block1->text('title')->default('Cool') }}</li>
        <li>{{ $block1->color('color')->default('blue') }}</li>
    @endforeach
</ul>


<ul>
    @foreach($blocks->list('links')->columns(['link', 'title']) as $block2)
        <li>{{ $block2->text('link')->default('confetti.com') }}</li>
        <li>{{ $block2->text('title')->default('Confetti') }}</li>
    @endforeach
</ul>
