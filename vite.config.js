import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/post-form.js',
                'resources/js/toggle-status.js',
                'resources/js/post-voting.js',
                'resources/js/add-choice.js',
                'resources/js/delete-choice.js',
                'resources/js/create-voting.js',
            ],
            refresh: true,
        }),
    ],
});
