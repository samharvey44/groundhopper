import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    return useMemo(
        () => ({
            mainContainer: {
                width: '100%',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
            },

            innerMainContainer: {
                width: isMd ? '80%' : '50%',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                marginTop: '100px',
            },

            mainPaper: {
                width: '100%',
            },
        }),
        [isMd],
    );
}
