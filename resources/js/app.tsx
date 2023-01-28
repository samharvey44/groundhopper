import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import React from 'react';

import '@fontsource/roboto/300.css';
import '@fontsource/roboto/400.css';
import '@fontsource/roboto/500.css';
import '@fontsource/roboto/700.css';

import Main from './main';

createInertiaApp({
    title: () => 'Groundhopper',
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}/index.tsx`,
            import.meta.glob('./Pages/**/*.tsx'),
        ),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <Main>
                <App {...props} />
            </Main>,
        );
    },
    progress: {
        color: '#87CBAC',
    },
});
