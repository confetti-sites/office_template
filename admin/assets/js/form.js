document.addEventListener('alpine:init', () => {
    Alpine.store('form', {
        changes: {},

        get(key) {
            return this.changes[key]
        },

        push(key, value) {
            this.changes[key] = value
        }
    })
    Alpine.bind('field', () => ({
        '@change'(event) {
            Alpine.store('form').push(event.target.attributes.name.value, event.target.value)
            console.log('change')
        },
    }))
    Alpine.bind('submit', () => ({
        '@click.throttle.1000ms'() {
            let data = JSON.stringify({
                "data": [
                    {
                        "id": "bla",
                        "value": "the value"
                    }
                ]
            });

            let xhr = new XMLHttpRequest();
            xhr.withCredentials = true;

            xhr.addEventListener("readystatechange", function() {
                if(this.readyState === 4) {
                    console.log(this.responseText);
                }
                console.log('ready: ' + this.readyState)
            });

            xhr.open("PATCH", "http://api.confetti-cms.com/content/contents");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Accept", "application/json");

            xhr.send(data);
            console.log('submit')
        },
    }))
})
