import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js',
            'resources/sass/app.scss',
            'resources/sass/components/header.scss',
            'resources/sass/components/server.scss',
            'resources/sass/pages/players.scss'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
