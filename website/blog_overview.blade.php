@php
    $perPage = 10;
    $page = request()->parameter('page') ?: 1;
    $offset = ($page - 1) * $perPage;
    $blogPage = newRoot(new \model\blog_overview);
    $blogs = $blogPage->list('blog')->columns(['title'])->limit($perPage)->offset($offset)->get();
@endphp
@section('head_title', 'Blog overview')
@section('head_description', 'The blog overview')
@extends('website.layouts.main')

@section('content')
<div class="js-edit:{{ $blogPage->getId() }} bg-gray-50 py-8">
    <ul class="space-y-8 max-w-4xl mx-auto">
        @foreach($blogs as $blog)
            <li class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <h3 class="text-2xl font-semibold text-blue-500">{{ $blog->text('title')->min(1)->max(50)->bar(['b', 'i', 'u']) }}</h3>
                    {!! $blog->image->getPicture(class: 'w-[100px] h-[100px] object-cover rounded-lg p-1') !!}
                </div>
                <div class="mt-4">
                    <a href="/blogs/{{ $blog->text('slug')->min(1)->max(50) }}" class="text-blue-500">Read more</a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-8 flex justify-center">
        @if($page > 1)
            <a href="{{ request()->uri() }}?page={{ $page-1 }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-2">Previous</a>
        @endif
        @if(count($blogs) === $perPage && $blogPage->blogs()->offset($offset + 1)->first() !== null)
            <a href="{{ request()->uri() }}?page={{ $page+1 }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Next</a>
        @endif
    </div>
    <div class=" flex items-center justify-center">
        <p class="text-gray-500 italic font-serif font-body text-sm">
            You can edit this HTML in blog_overview.blade.php
        </p>
    </div>
</div>
@endsection
