import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/agenda.css',
                'resources/css/berita-detail.css',
                'resources/css/berita.css',
                'resources/css/ekstrakurikuler-detail.css',
                'resources/js/ekstrakurikuler-detail.js',
                'resources/css/ekstrakurikuler.css',
                'resources/css/galeri.css',
                'resources/js/galeri.js',
            ],
            refresh: true,
        }),
    ],
});