import { useMediaQuery, useTheme } from '@mui/material';
import { useMemo } from 'react';

import { PRIMARY } from 'app/globals/colors';

export default function useStyles() {
    const theme = useTheme();

    const isMd = useMediaQuery(theme.breakpoints.down('md'));

    return useMemo(
        () => ({
            innerContainer: {
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                padding: '20px',
                flexDirection: 'column',
                textAlign: 'center',
            },

            formContainer: {
                marginTop: '20px',
                width: isMd ? '85%' : '70%',
            },

            password: {
                marginTop: '20px',
            },

            loginButtonContainer: {
                marginTop: '20px',
                display: 'flex',
            },

            loginButton: {
                marginLeft: 'auto',
            },

            signupLinkContainer: {
                marginTop: '10px',
                display: 'flex',
            },

            inertiaLink: {
                marginLeft: 'auto',
                textDecoration: 'none',
                color: PRIMARY,
                fontStyle: 'italic',
            },
        }),
        [isMd],
    );
}
