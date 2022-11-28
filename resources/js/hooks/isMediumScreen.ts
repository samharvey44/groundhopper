import { useMediaQuery, useTheme } from '@mui/material';
import { useMemo } from 'react';

export default function useIsMediumScreen() {
    const theme = useTheme();
    const isMd = useMediaQuery(theme.breakpoints.down('md'));

    return useMemo(() => isMd, [isMd]);
}
