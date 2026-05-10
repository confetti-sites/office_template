@php
    $alias = str_replace('/blogs/', '', request()->uri());
    $model = \model\blog_overview\blog_list::query()->whereSlugIs($alias)->first();
@endphp
@section('head_title', $model->title)
@section('head_description', 'You can edit the meta description in blog_detail.blade.php')
@extends('website.layouts.main')

@section('content')
<main class="js-edit:{{ $model->getId() }} max-w-3xl mx-auto">
    <article class="relative p-12">
        <a href="/blogs" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-2">Back to overview</a>
        <div class="rounded-lg p-4 text-2xl flex justify-center m-8">
            <h1>{{ $model->title }}</h1>
        </div>
        <div class="font-body">
            <div class="mx-4 w-full">
                {!! $model->image('image')->widthPx(800)->getPicture(class: 'relative w-full sm:w-220 p-3 rounded-lg') !!}
                @include('pkg.confetti-cms.content.blocks.index', ['model' => $model->content('content')])
            </div>
        </div>
        <div class=" flex items-center justify-center">
            <p class="text-gray-500 italic font-serif font-body text-sm">
                You can edit this HTML in blog_detail.blade.php
            </p>
        </div>
    </article>
</main>
@endsection
