import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        proxy: {
            // Proxy all requests except asset requests to your Laravel app
            '^(?!.*\\.\\w+$)': 'http://localhost:8000',
        },
    },
});
