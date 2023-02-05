import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/common/css/loading.css',
                'resources/admin/js/dashboard.js',
            ],
            refresh: true,
        }),
    ],
});
