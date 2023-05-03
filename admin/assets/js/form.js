document.addEventListener('alpine:init', () => {
    // Get api url
    let xhr = new XMLHttpRequest();
    let adminConfig;

    function setAdminConfig() {
        xhr.open('GET', '/object/admin/config.blade.php', true);
        xhr.responseType = 'json';
        xhr.onload = function() {
            let status = xhr.status;
            if (status === 200) {
                adminConfig = xhr.response;
            } else {
                console.error(status, xhr.response);
            }
        };
        xhr.send()
    }
    setAdminConfig()

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
            xhr.open("PATCH", adminConfig.api_url + "/content/contents");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Accept", "application/json");
            xhr.send(body);
            location.reload()
        },
    }))
})
