import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import 'flowbite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'node_modules/tw-elements/dist/js/tw-elements.umd.min.js'
            ],
            refresh: true,
        }),
        react(),
    ],
});