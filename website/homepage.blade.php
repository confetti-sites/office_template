@php(newRoot(new \model\homepage))
@section('head_title', 'Your homepage title, you can edit this in homepage.blade.php')
@section('head_description', 'The description for the homepage.')
@extends('website.layouts.main')

@section('content')
    @include('website.includes.hero')
    @include('website.includes.usps')
    @include('website.includes.blocks')
    @include('website.includes.newsletter')
    @include('website.includes.cta')
@endsection
