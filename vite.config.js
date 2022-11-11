import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            // eslint-disable-next-line no-undef
            app: path.resolve(__dirname, './resources/js'),
        },
    },
});
