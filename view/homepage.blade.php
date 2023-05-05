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

<div x-auto-animate>
    <template x-if="videoIsOpen">
        <div @keydown.escape="toggleShowVideo" id="popup-modal" class="fixed top-0 left-0 right-0 z-50 overflow-x-hidden overflow-y-auto md:inset-0 h-screen max-h-full bg-black/80 flex items-center justify-center">
            <div class="relative rounded-xl p-4">
                <div class="relative bg-white rounded-xl shadow p-2 h-5/6 dark:bg-gray-700 aspect-video">
                    <div class="absolute right-[-17px] -top-5 w-11 h-11 rounded-full bg-white cursor-pointer" @click="toggleShowVideo">
                        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                    </div>
                    <iframe class="rounded-xl w-full h-full aspect-video" src="https://www.youtube.com/embed/TmWIrBPE6Bc" title="YouTube video player" autoplay=1 frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </template>
</div>