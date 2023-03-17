import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/admin/js/dashboard.js',
                'resources/admin/js/next-link.js',
                'resources/admin/js/table-data.js',
                'resources/common/css/loading.css',
                'resources/common/js/login.js',
                'resources/admin/js/user-create.js',
                'resources/common/js/form.js',
                'resources/common/css/form.css',
                'resources/admin/js/toast-message.js',
                'resources/admin/js/product.js',
                'resources/admin/css/product.css',
                'resources/admin/css/form-edit.css',
            ],
            refresh: true,
        }),
    ],
});
