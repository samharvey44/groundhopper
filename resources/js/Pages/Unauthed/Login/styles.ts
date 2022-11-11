import { PRIMARY } from 'app/globals/colors';
import { useMemo } from 'react';

export default function useStyles() {
    return useMemo(
        () => ({
            innerContainer: {
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                padding: '20px',
                flexDirection: 'column',
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

            signupLink: {
                marginLeft: 'auto',
                cursor: 'pointer',
                color: PRIMARY,
                fontStyle: 'italic',
            },
        }),
        [],
    );
}
