import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/admin/js/dashboard.js',
                'resources/admin/js/sidebar.js',
                'resources/admin/js/table-data.js',
                'resources/common/css/loading.css',
                'resources/common/js/validation.js',
            ],
            refresh: true,
        }),
    ],
});
