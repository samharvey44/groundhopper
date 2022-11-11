import { responsiveFontSizes } from '@mui/material';
import { createTheme } from '@mui/material/styles';
import { SnackbarProvider } from 'notistack';
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

    return (
        <ThemeProvider theme={theme}>
            <SnackbarProvider maxSnack={3}>{children}</SnackbarProvider>
        </ThemeProvider>
    );
};

export default Main;
