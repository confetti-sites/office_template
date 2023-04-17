@php
    $componentStore = new \Confetti\Helpers\ComponentStore('/section');
@endphp
        <!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin</title>
    <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>

    <script
            src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
            defer
    ></script>
    <script src="/object/admin/assets/js/init-alpine.js"></script>
</head>

@include('admin.menu_left', ['componentStore' => $componentStore])


@include('admin.middle')
