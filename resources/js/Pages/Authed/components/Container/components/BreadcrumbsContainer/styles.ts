import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';
import { PRIMARY } from 'app/globals/colors';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    return useMemo(
        () => ({
            mainContainer: {
                display: 'flex',
                alignItems: 'center',
                marginBottom: '20px',
            },

            inertiaLink: {
                textDecoration: 'none',
                color: PRIMARY,
            },

            breadcrumbNoLink: {
                color: PRIMARY,
            },

            breadcrumbSeperator: {
                marginLeft: '5px',
                marginRight: '5px',
            },
        }),
        [isMd],
    );
}
