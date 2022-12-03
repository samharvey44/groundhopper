import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    return useMemo(
        () => ({
            gridItem: {
                display: 'flex',
            },

            statisticPaper: {
                padding: '20px',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                flexDirection: 'column',
                flex: 1,
            },

            homeIcon: {
                width: '80px',
                height: '80px',
            },

            homeText: {
                marginTop: '20px',
                textAlign: 'center',
            },
        }),
        [isMd],
    );
}
