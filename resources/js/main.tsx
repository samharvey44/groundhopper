import { responsiveFontSizes } from '@mui/material';
import { createTheme } from '@mui/material/styles';
import { SnackbarProvider } from 'notistack';
import { Inertia } from '@inertiajs/inertia';
import { ThemeProvider } from '@mui/system';
import React from 'react';

import { PRIMARY, SECONDARY } from './globals/colors';

const Main = ({ children }: { children: React.ReactNode }) => {
    let theme = createTheme({
        palette: {
            primary: {
                main: PRIMARY,
            },
            secondary: {
                main: SECONDARY,
            },
        },
    });

    theme = responsiveFontSizes(theme);

    window.addEventListener('popstate', (event) => {
        event.stopImmediatePropagation();

        Inertia.reload({
            preserveState: false,
            preserveScroll: false,
            replace: true,
            // @ts-expect-error https://github.com/inertiajs/inertia/issues/565
            onSuccess: (page) => Inertia.setPage(page),
            onError: () => (window.location.href = event.state.url),
        });
    });

    return (
        <ThemeProvider theme={theme}>
            <SnackbarProvider maxSnack={3}>{children}</SnackbarProvider>
        </ThemeProvider>
    );
};

export default Main;
