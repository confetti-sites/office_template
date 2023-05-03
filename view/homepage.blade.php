@include('view.hero')
@include('view.usps')

<div class="container py-28 md:flex ">
    <div class="md:w-1/2">
        <h2 class="text-2xl">Feel the power</h2>
        <p>Write the fields you need and</p>
    </div>
    <div class="md:w-1/2 mt-8 md:mt-0 md:ml-12">
        <img src="https://cdn.tuk.dev/previews/desktop-2x/hero_7.jpg" alt="">
    </div>
</div>

<div x-show="videoIsOpen" @keydown.escape="toggleShowVideo" id="popup-modal" class="fixed top-0 left-0 right-0 z-50 overflow-x-hidden overflow-y-auto md:inset-0 h-screen max-h-full bg-black/80 flex items-center justify-center">
    <div class="relative w-full max-w-md max-h-full rounded-xl">
        <div class="relative bg-white rounded-lg shadow p-2 dark:bg-gray-700">
            <iframe class="rounded-xl" width="560" height="315" src="https://www.youtube.com/embed/TmWIrBPE6Bc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>
