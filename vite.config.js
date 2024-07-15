import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: 'app/Livewire/**',
        }),
    ],
    server: {
        host: 'localhost', // Certifique-se de que está configurado para localhost
        port: 3000,
        hmr: {
          host: 'localhost', // Certifique-se de que está configurado para localhost
          protocol: 'ws', // ou 'wss' se estiver usando HTTPS
        },
        https: false, // Desative o SSL temporariamente
      },
});
