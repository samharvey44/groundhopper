import { responsiveFontSizes } from '@mui/material';
import { createTheme } from '@mui/material/styles';
import { SnackbarProvider } from 'notistack';
import { ThemeProvider } from '@mui/system';
import { router } from '@inertiajs/react';
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

        router.reload({
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
            <SnackbarProvider
                maxSnack={3}
                anchorOrigin={{
                    vertical: 'bottom',
                    horizontal: 'right',
                }}
            >
                {children}
            </SnackbarProvider>
        </ThemeProvider>
    );
};

export default Main;
