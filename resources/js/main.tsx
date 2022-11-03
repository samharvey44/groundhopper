import { createTheme, ThemeProvider } from '@mui/system';
import { SnackbarProvider } from 'notistack';
import React from 'react';

const Main = ({ children }: { children: React.ReactNode }) => {
    const theme = createTheme({
        palette: {
            primary: {
                main: '#8F3985',
            },
            secondary: {
                main: '#25283D',
            },
        },
    });

    return (
        <ThemeProvider theme={theme}>
            <SnackbarProvider maxSnack={3}>{children}</SnackbarProvider>
        </ThemeProvider>
    );
};

export default Main;
