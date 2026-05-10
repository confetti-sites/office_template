@php($hero = newRoot(new \model\homepage\hero))
<div class="js-edit:{{ $hero->getId() }} lg:container lg:mx-auto md:flex md:items-center md:justify-center bg-white mt-4 lg:mb-10">
    <div class="container mb-8 flex flex-col items-center justify-center md:w-1/2">
        <h1 class="mt-4 ml-4 text-5xl text-gray-900 xl:text-center text-pretty">
            <span>{{ $hero->text('title')->default('Your website') }}</span>
            <span>{{ $hero->text('title4')->default('Your website') }}</span>
        </h1>
        <div class="flex items-center">
            <div class="mt-8">
                <a href="/contact" class="inline-block border-2 border-blue-500 bg-white text-blue-600 px-6 py-3 rounded-lg">A button</a>
            </div>
        </div>
    </div>
    <hello-world class="bg-gray-50 md:bg-white px-2 pb-2 md:w-1/2 md:mr-10"></hello-world>
</div>
<div class=" flex items-center justify-center">
    <p class="text-gray-500 italic font-serif font-body text-sm">
        You can edit this HTML in hero.blade.php, see /website/public/mjs/demo.mjs to discover how to bring reactivity to the page
    </p>
</div>

@pushonce('end_of_body_hero')
    <script type="module" defer>
        @php/** @see /website/public/mjs/demo.mjs */@endphp
        import {HelloWorld} from '/website/public/mjs/demo.mjs';

        customElements.define('hello-world', HelloWorld);
    </script>
@endpushonce

















