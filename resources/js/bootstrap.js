import _ from 'lodash';
import axios from 'axios';
import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import Alpine from 'alpinejs';

window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });


document.addEventListener('alpine:init', () => {

  // very simple store for managing the sidebar
  Alpine.store('sidebar', {
    open: false,

    toggle() {
      this.open = !this.open
    }
  });
  // To use The TipTap editor, we need to set it as the x-data editor
  Alpine.data('editor', (content) => {
    let editor
    // console.log({content});
    return {
      updatedAt: Date.now(), // force Alpine to rerender on selection change
      content: content,
      init() {
        const _this = this

        editor = new Editor({
          element: this.$refs.element,
          extensions: [
            StarterKit
          ],
          content: _this.content,
          onCreate({ editor }) {
            _this.updatedAt = Date.now()
            console.log(_this.content);
            console.log(this.content);
          },
          onUpdate({ editor }) {
            _this.updatedAt = Date.now()
            _this.content = editor.getHTML();
          },
          onSelectionUpdate({ editor }) {
            _this.updatedAt = Date.now()
            // this.content = editor.getHTML();
          }
        });
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
    };
  });
});

window.Alpine = Alpine
Alpine.start();
