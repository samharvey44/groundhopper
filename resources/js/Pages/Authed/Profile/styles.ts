import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';
import { PRIMARY } from 'app/globals/colors';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    return useMemo(
        () => ({
            gridItem: {
                display: 'flex',
            },

            paper: {
                flex: 1,
                padding: '20px',
            },

            profilePictureContainer: {
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                flexDirection: 'column',
            },

            profilePicture: {
                height: '130px',
                width: '130px',
                border: `3px solid ${PRIMARY}`,
            },

            displayName: {
                marginTop: '10px',
            },
        }),
        [isMd],
    );
}
