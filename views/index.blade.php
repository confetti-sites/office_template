@extends('page')

@section('introduction')
    @php $intro = section('introduction')->label('Introduction') @endphp

    @foreach($intro->multiple('blocks')->multiple(2)->max(2) as $block)
        <div data-accent="red" data-alignment="left" data-accent-position="right" class="demo-container" data-v-5a1c61d3 data-v-3330c898>
            <div class="introduction-copy" data-v-5a1c61d3>
                <div class="callouts" data-v-5a1c61d3>
                    @foreach($block->multiple('callouts')->max(5) as $callout)
                        <span class="callout" data-v-5a1c61d3>
                            {{ $callout->textarea('callout_text')->label('Callout')->min(5)->max(200)->required() }}
                        </span>
                    @endforeach
                </div>
                <div class="copy" data-v-5a1c61d3>
                    <p data-v-5a1c61d3 data-v-3330c898>
                        {{ $block->textarea('intro_note')->label('Intro Note')->min(5)->max(200)->required() }}
                    </p>
                </div>
            </div>

            <div class="demo-area" data-v-5a1c61d3>
                <svg viewBox="0 0 650 595" fill="none" data-v-5a1c61d3><g clip-path="url(#clip277322)"><path d="M632.824 141.407C606.336 97.5883 520.451 13.8032 389.776 1.60465C236.146 -12.841 129.391 82.6609 107.88 102.082C75.7729 131.134 -10.2734 207.856 1.12449 300.148C4.81676 330.484 20.549 361.301 65.3379 411.219C100.816 451.185 220.092 574.455 265.684 590.666C311.275 606.877 353.496 575.578 375.168 538.501C389.134 514.746 404.545 462.742 446.766 400.465C456.148 385.387 466.895 371.203 478.872 358.091C531.848 304.642 576.958 322.298 619.178 274.307C639.331 252.378 650.753 223.829 651.285 194.053C649.804 175.2 643.442 157.057 632.824 141.407Z" fill="url(#paint277322_linear)"></path></g> <defs><linearGradient id="paint277322_linear" x1="325.689" y1="0.123474" x2="325.689" y2="595.049" gradientUnits="userSpaceOnUse"><stop stop-color="#DA4167"></stop> <stop offset="1" stop-color="#DA4167" stop-opacity="0"></stop></linearGradient> <clipPath id="clip277322"><rect width="650" height="595" fill="white"></rect></clipPath></defs></svg> <div data-fetch-key="data-v-2d72c711:0" class="mock-example code-example" data-v-2d72c711 data-v-3330c898><div class="editor-mock" data-v-2d72c711><div class="line-numbers" data-v-2d72c711></div> <div class="code" data-v-2d72c711><div class="line line--1" data-v-2d72c711></div> <div class="line line--2" data-v-2d72c711></div> <div class="line line--2" data-v-2d72c711></div> <div class="line line--2" data-v-2d72c711></div> <div class="line line--1 line--end" data-v-2d72c711></div> <div class="line line--1" data-v-2d72c711></div> <div class="line line--2" data-v-2d72c711></div> <div class="line line--2" data-v-2d72c711></div> <div class="line line--2" data-v-2d72c711></div> <div class="line line--1 line--end" data-v-2d72c711></div></div></div> <div class="preview-mock" data-v-2d72c711><div class="file-name" data-v-2d72c711></div> <div class="file-highlight" data-v-2d72c711></div> <div class="input" data-v-2d72c711><div class="label" data-v-2d72c711></div> <div class="field" data-v-2d72c711></div></div> <div class="input" data-v-2d72c711><div class="label" data-v-2d72c711></div> <div class="field" data-v-2d72c711></div></div></div> <div class="cta" data-v-2d72c711><span data-v-2d72c711>Load Live Example</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-v-2d72c711><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path></svg>
                    </div>
                </div>
            </div>
            <div class="post-content" data-v-5a1c61d3>

                {{ $block->select('demo_icon')->fromDirectory('icons') }}

                <p data-v-5a1c61d3 data-v-3330c898>
                    {{ $block->textarea('demo_tip') }}
                </p>
            </div>
        </div>
    @endforeach
@endsection
