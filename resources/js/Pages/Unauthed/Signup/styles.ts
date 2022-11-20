import { useMemo } from 'react';

import { PRIMARY } from 'app/globals/colors';

export default function useStyles() {
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
                width: '70%',
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
        [],
    );
}
