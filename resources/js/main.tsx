import { responsiveFontSizes } from '@mui/material';
import { createTheme } from '@mui/material/styles';
import { ThemeProvider } from '@mui/system';
import { SnackbarProvider } from 'notistack';
import React from 'react';

const Main = ({ children }: { children: React.ReactNode }) => {
    let theme = createTheme({
        palette: {
            primary: {
                main: '#8F3985',
            },
            secondary: {
                main: '#25283D',
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
