import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';
import { PRIMARY } from 'app/globals/colors';

export default function useStyles() {
    const isMd = useIsMediumScreen();

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

            rememberMeContainer: {
                display: 'flex',
                alignItems: 'center',
                flexWrap: 'wrap',
                justifyContent: 'flex-end',
                marginTop: '10px',
            },

            rememberMe: {
                marignLeft: '10px',
            },
        }),
        [isMd],
    );
}
