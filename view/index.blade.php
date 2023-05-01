@php($page = section('homepage'))
<html>
<head>
    <title>Confetti</title>
    <link rel="stylesheet" href="/generated/view/tailwind.output.css"/>
    <link rel="stylesheet" href="/object/view/assets/css/fonts.css"/>
    <script defer>
        @stack('scripts_*')
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
    <body class="text-md">
        @include('view.header')
        @include('view.hero')
        @include('view.usps')

        <br>


        @php($footer = section('footer'))
        @php($target = $footer->select('template')->byDirectory('/view/footers')->default('footer.blade.php'))

        @include($target->get(), ['parent' => $target])
    </body>
</html>
