@extends('page')
@php($template = on($template)->label('Home page template'))
@php($intro = $template->group('intro'))
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
