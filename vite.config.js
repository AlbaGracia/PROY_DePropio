import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                '*.blade.php',
            ]
        }),
    ],
    server: {
        host: 'localhost',
        port: 5173,
    },
});
