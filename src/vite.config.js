import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import dotenv from 'dotenv'

dotenv.config()

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        origin: process.env.VITE_SERVER_URL,
        cors: {
            origin: '*',
        },
        strictPort: true,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
