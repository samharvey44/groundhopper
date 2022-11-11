import { useMediaQuery } from '@mui/material';
import { useTheme } from '@mui/system';
import { useMemo } from 'react';

export default function useStyles() {
    const theme = useTheme();

    const isMd = useMediaQuery(theme.breakpoints.down('md'));

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
