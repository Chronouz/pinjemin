import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: true, // Menggunakan host lokal
        hmr: {
            host: 'pinjemin.com', // Domain kustom Anda
        },
        https: {
            key: 'D:/laragon/etc/ssl/laragon.key', // Path ke file SSL key
            cert: 'D:/laragon/etc/ssl/laragon.crt', // Path ke file SSL certificate
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/nav.css',
                'resources/css/login.css',
                'resources/css/homepage.css',
                'resources/js/app.js', 
                'resources/js/layout.js',
                'resources/js/whatsapp.js',
                'resources/js/login.js',
            ],
            refresh: true,
        }),
    ],
});
