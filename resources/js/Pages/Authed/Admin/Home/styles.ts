import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    return useMemo(
        () => ({
            gridItem: {
                display: 'flex',
            },

            headerPaper: {
                display: 'flex',
                alignItems: 'center',
                padding: '20px',
                flex: 1,
            },
        }),
        [isMd],
    );
}
