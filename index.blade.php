@php
    $pages = section('pages');

    $pages->buttonNew();
    // Generate a list with 3 columns for the pages overview
    $pages->list('active', 'title', 'slug')->delete()->edit();
    $pages->pagination();

    // Get current page
    $page = $pages->where('slug' , request()->slug())->first();

    // Define de fields for every page
    $title = $page->text('title')->min(2)->max(300)->required();
    $page->text('slug')->urlFriendly()->unique()->default($title);
    $page->checkbox('active');
    $page->select('template')->fromDirectory('/views');
@endphp
@if($page->active)
    {{-- Include the chosen view and allow extra fields. --}}
    @include($page->template, ['page' => $page, 'template' => $page->template])
@else
    @include('errors.404')
@endif
