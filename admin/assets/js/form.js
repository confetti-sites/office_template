document.addEventListener('alpine:init', () => {
    Alpine.store('form', {
        changes: [],
        allChanges() {
            return this.changes
        },
        upsert(id, value) {
            let exists = false;
            // Update if exists
            this.changes = this.changes.map(function(change) {
                if (change.id === id) {
                    exists = true;
                    console.log('update: ' + id + ' ' + value)
                    return{
                        id: id,
                        value: value
                    }
                } else {
                  return change;
                }
            });
            // Add if not exists
            if (!exists) {
                console.log('push: ' + id + ' ' + value)
                this.changes.push({
                    id: id,
                    value: value
                });
            }
        }
    })
    Alpine.bind('field', () => ({
        '@change'(event) {
            Alpine.store('form').upsert(event.target.attributes.name.value, event.target.value)
            console.log('change')
        },
    }))
    Alpine.bind('submit', () => ({
        '@click.throttle.1000ms'() {
            let xhr = new XMLHttpRequest();
            let data = Alpine.store('form').allChanges();
            let body = JSON.stringify({"data": data});

            xhr.withCredentials = true;
            xhr.addEventListener("readystatechange", function() {
                if (this.status >= 300) {
                    console.log("Error: " + this.responseText);
                }
            });
            xhr.open("PATCH", "http://api.confetti-cms.com/content/contents");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Accept", "application/json");
            xhr.send(body);
            console.log('submit')
        },
    }))
})
