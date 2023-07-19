import { Editor } from 'https://esm.sh/@tiptap/core'
import StarterKit from 'https://esm.sh/@tiptap/starter-kit'
import LinkExtention from 'https://esm.sh/@tiptap/extension-link'

document.addEventListener('alpine:init', () => {
    Alpine.data('editor', (content, contentId) => {
        let editor

        return {
          updatedAt: Date.now(), // force Alpine to rerender on selection change
          init() {
            const _this = this

            editor = new Editor({
              element: this.$refs.element,
              editorProps: {
                attributes: {
                  class: 'min-h-[201px] prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto focus:outline-none',
                },
              },
              extensions: [
                StarterKit,
                LinkExtention
              ],
              content: content,
                  onUpdate({ editor }) {
                    const html = editor.getHTML();
                    Alpine.store('form').upsert(contentId, html)
                },
            })
          },
          isLoaded() {
            return editor
          },
          isActive(type, opts = {}) {
            return editor.isActive(type, opts)
          },
          toggleHeading(opts) {
            editor.chain().toggleHeading(opts).focus().run()
          },
          toggleBold() {
            editor.chain().toggleBold().focus().run()
          },
          toggleItalic() {
            editor.chain().toggleItalic().focus().run()
          },
          setLink() {
            const previousUrl = editor.getAttributes('link').href;
            const url = window.prompt('URL', previousUrl)

            // cancelled
            if (url === null) {
              return
            }

            // empty
            if (url === '') {
              editor
                .chain()
                .focus()
                .extendMarkRange('link')
                .unsetLink()
                .run()

              return
            }

            // update link
            editor
              .chain()
              .focus()
              .extendMarkRange('link')
              .setLink({ href: url })
              .run()
          },
        }
      })

    Alpine.store('config', {
        apiUrl: undefined,
        init() {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', '/config.blade.php', true);
            xhr.responseType = 'json';
            xhr.onload = function () {
                let status = xhr.status;
                if (status === 200) {
                    Alpine.store('config').setApiUrl(xhr.response.api_url);
                    document.dispatchEvent(new CustomEvent('config:init'));
                } else {
                    console.error(status, xhr.response);
                    Alpine.store('config').setApiUrl('error_from_config');
                }
            };
            xhr.send()
        },
        getApiUrl() {
            return this.apiUrl
        },
        setApiUrl(url) {
            console.log('setApiUrl ' + url);
            this.apiUrl = url
        }
    })

    Alpine.store('form', {
        changes: [],
        allChanges() {
            return this.changes
        },
        upsert(id, value) {
            let exists = false;
            // Update if exists
            this.changes = this.changes.map(function (change) {
                if (change.id === id) {
                    exists = true;
                    return {
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
            console.log('change');
            Alpine.store('form').upsert(event.target.attributes.name.value, event.target.value)
        },
        '@saveThisField'(event) {
            console.log('saveThisField');
            Alpine.store('form').upsert(event.target.attributes.name.value, event.target.value)
            saveContents([{
                id: event.target.attributes.name.value,
                value: event.target.value
            }], () => {
            });
        },
    }))
    Alpine.bind('submit', () => ({
        '@click.throttle.1000ms'(event) {
            console.log('submit ->');
            const parentContentId = event.target.attributes['parent-content-id'].value
            const hasParent = event.target.attributes['has-parent'].value
            let data = Alpine.store('form').allChanges();
            saveContents(data, () => {
                // if parentContentId string has ~ go back (to the list)
                if (hasParent) {
                    location.href = '/admin' + parentContentId
                } else {
                    location.reload()
                }
            });
        },
    }))

    function saveContents(data, ready) {
        // Wait for config
        let configWaiter = setInterval(function () {
            let apiUrl = Alpine.store('config').getApiUrl();
            if (apiUrl === undefined) {
                return;
            }
            clearInterval(configWaiter);
            // Do the request
            let xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            xhr.addEventListener("readystatechange", function () {
                if (this.status >= 300) {
                    console.log("Error: " + this.responseText);
                    return;
                }
                ready()
            });
            xhr.open("PATCH", apiUrl + "/content/contents");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Authorization", "Bearer " + document.cookie.split('access_token=')[1].split(';')[0]);
            let body = JSON.stringify({"data": data});
            xhr.send(body);
        }, 200);
    }
})
