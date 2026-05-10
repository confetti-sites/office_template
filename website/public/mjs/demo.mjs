import { html, reactive } from 'https://esm.sh/@arrow-js/core@v1.0.0';

export class HelloWorld extends HTMLElement {
    state = reactive({
        count: 0
    });

    connectedCallback() {
        html`
            <div class="flex items-center justify-center">
                <h1 class="mt-4 ml-4 text-2xl text-gray-900 xl:text-center text-pretty">${() => `Count: ${this.state.count}`}</h1>
            </div>
            <div class="flex items-center justify-center">
                <button class="mt-8 ml-4 inline-block border-2 border-primary bg-primary text-white px-6 py-3 rounded-lg cursor-pointer"
                        @click="${(e) => this.state.count++}">
                    Show reactivity
                </button>
            </div>
        `(this);
    }
}