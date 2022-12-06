@extends('page')
@section('home')
    
    @php($banner = section('banner'))
    <section class="new-video-container home">
        <div class="video banner home">
            <video preload="metadata" loop autoplay playsinline muted>
                <source src="https://dunepebbler.nl/wp-content/uploads/2022/03/DP720.webm" type="video/webm"></source>
                <source src="{{ $banner->text('video')->default('https://dunepebbler.nl/wp-content/uploads/2022/03/DP720.mp4') }}" type="video/mp4"></source>
            </video>
        </div>
        <script type="text/javascript">
            jQuery(window).on('load', function () {
                // hide loader
                jQuery('#vimeo .loader').stop().fadeOut();
            });
        </script>
        <div class="overlay-video"></div>
        <div class="video-content">
            <h2>
                <b>{{ $banner->text('headline_1')->max(10)->help("This word is bold") }}
                </b> {{ $banner->text('headline_2')->max(6)->help("One word") }}
                <span>{{ $banner->text('headline_3')->max(20)->help("Big words") }}</span>
                {{ $banner->text('headline_4')->max(30)->help("Long and small") }}
                <b>{{ $banner->text('headline_5')->max(30)->help("Long bold word") }}</b>
            </h2>
            <div class="bullets">
                @foreach($banner->multiple('bullets')->min(3)->max(3) as $bullet)
                    <div class="bullet bullet-{{ $bullet->select('color')->options(['magenta', 'purple', 'yellow']) }}"></div>
                @endforeach
            </div>
        </div>
        <div class="scroll-downs">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
    </section>
    @php($intro = section('intro'))
    <section class="intro-content home">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>{{ $intro->text('subtitle')->max(100) }}</h4>
                    <h1>{{ $intro->text('title')->max(100) }}</h1>
                    <div class="row">
                        <div class="col-10 offset-1 col-md-8 offset-md-2">
                            <p>{{ $intro->textarea('text')->min(200)->max(1500) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
