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
        '@click.throttle.1000ms'(event) {
            let xhr = new XMLHttpRequest();
            let data = Alpine.store('form').allChanges();
            let body = JSON.stringify({"data": data});
            const parentContentId = event.target.attributes['parent-content-id'].value
            const hasParent = event.target.attributes['has-parent'].value
            console.log(hasParent);

            xhr.withCredentials = true;
            xhr.addEventListener("readystatechange", function() {
                if (this.status >= 300) {
                    console.log("Error: " + this.responseText);
                }
                    // if parentContentId string has ~ go back
                    if (hasParent) {
                        location.href = '/admin' + parentContentId
                    } else {
                        location.reload()
                    }
            });
            xhr.open("PATCH", adminConfig.api_url + "/content/contents");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Accept", "application/json");
            xhr.send(body);
        },
    }))
})
