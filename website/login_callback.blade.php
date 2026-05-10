@extends('website.layouts.blank')
@section('head_title', 'Waiting List')
@guest()
    @include('website.login')
@else
    @section('content')
        <div class="container flex h-screen font-body">
            <div class="m-auto w-96 p-6 border rounded-lg shadow-lg bg-white">
                <h1 id="model-title" class="text-3xl font-semibold text-gray-800 text-center">Redirecting...</h1>
            </div>
        </div>
    @endsection
    @pushonce('end_of_body_login_callback')
        <script>
            window.location.href = '/admin';
        </script>
    @endpushonce
@endguest
