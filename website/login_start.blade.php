@extends('website.layouts.blank')
@section('head_title', 'Login')
@section('content')
    <div class="container flex h-screen font-body">
        <div class="m-auto w-96 p-6 border rounded-lg shadow-lg bg-white">
            <h1 id="model-title" class="text-3xl font-semibold text-gray-800 text-center">Redirecting...</h1>
        </div>
    </div>
@endsection
@pushonce('end_of_body_login')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '{{ getServiceApi() }}/confetti-cms/auth/login', true);
        xhr.responseType = 'json';
        xhr.setRequestHeader('Accept', 'application/json');
        xhr.onload = function () {
            let status = xhr.status;
            if (status === 200) {
                let date = new Date();
                date.setTime(date.getTime() + (10 * 60 * 1000));
                let expires = "; expires=" + date.toUTCString();
                document.cookie = "state=" + xhr.response["state"] + expires + "; path=/";
                // set cookie to redirect to this page after login
                document.cookie = "redirect_after_login=/login_callback; path=/";
                window.location.href = xhr.response["redirect_url"];
            } else {
                console.error(status, xhr.response);
            }
        };
        xhr.send()
        console.log("request send");
    });
</script>
@endpushonce