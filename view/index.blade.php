<!DOCTYPE html>
<head>
    <title>Confetti CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/tailwind/tailwind.output.css"/>
    <link rel="stylesheet" href="/view/assets/css/fonts.css"/>
    <script defer>
        @stack('scripts_*')
    </script>
    <script src="/view/assets/scripts/init-alpine.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@marcreichel/alpine-auto-animate@latest/dist/alpine-auto-animate.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
    <body class="text-md overflow-x-hidden" :class="{ 'dark': dark }" x-data="data()">
        @include('view.header')

        @if(str_starts_with(request()->uri(), '/pricing'))
            @include('view.pricing')
        @elseif(str_starts_with(request()->uri(), '/docs'))
            @include('view.docs')
        @else
            @include('view.homepage')
        @endif

        @php($footer = section('footer'))
        @php($target = $footer->select('template')->fileInDirectories(['/view/footers/*.blade.php'])->default('/view/footers/footer.blade.php'))

        @include($target->get(), ['parent' => $target])
    </body>
</html>
