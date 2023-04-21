@php
    $componentStore = new \Confetti\Helpers\ComponentStore('/section');
    $currentContentId = str_replace('/admin', '', request()->uri());
    $currentComponentKey = $currentContentId;
    $componentRepository = new \Confetti\Helpers\ComponentStore('/section');
    $menuComponents = $componentRepository->whereParentKey('/section');
@endphp<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

    <title>Admin</title>

    <link rel="stylesheet" href="/generated/tailwind.output.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100" rel="stylesheet" />

    <script src="/object/admin/assets/js/alpine.min.js" defer></script>
    <script src="/object/admin/assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
        <!-- Desktop sidebar -->
        <aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
            @include('admin.left_menu', ['currentComponentKey' => $currentComponentKey, 'menuComponents' => $menuComponents])
        </aside>

        <!-- Mobile sidebar -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
            @include('admin.left_menu', ['currentComponentKey' => $currentComponentKey, 'menuComponents' => $menuComponents])
        </aside>

        <div class="flex flex-col flex-1">
            @include('admin.header', ['componentStore' => $componentStore])

            <main class="h-full pb-16 overflow-y-auto">
                @include('admin.middle', ['componentStore' => $componentStore, 'currentComponentKey' => $currentComponentKey])
            </main>
        </div>
    </div>
</body>

</html>
