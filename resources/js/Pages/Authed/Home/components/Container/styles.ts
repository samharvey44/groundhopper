import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';
import { PRIMARY } from 'app/globals/colors';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    const drawerWidth = 250;
    const appbarHeight = 65;

    return useMemo(
        () => ({
            root: {
                display: 'flex',
                flexDirection: 'column',
            },

            appBar: {
                width: `calc(100% - ${drawerWidth}px)`,
                marginLeft: `${drawerWidth}px`,
                height: `${appbarHeight}px`,
                boxShadow: 'none',
            },

            appBarMd: {
                width: '100%',
            },

            appbarTitle: {
                color: 'white',
            },

            innerAppbarContainer: {
                display: 'flex',
                alignItems: 'center',
                width: '100%',
            },

            logoutContainer: {
                display: 'flex',
                alignItems: 'center',
                marginLeft: 'auto',
            },

            drawer: {
                width: `${drawerWidth}px`,
                display: 'flex',
                alignItems: 'center',
                flexDirection: 'column',
                borderRight: 'none',
            },

            appbarStartContainer: {
                display: 'flex',
                alignItems: 'center',
            },

            appbarToggleButton: {
                color: 'white',
            },

            drawerHeader: {
                height: appbarHeight,
                backgroundColor: PRIMARY,
                width: '100%',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
            },
        }),
        [drawerWidth],
    );
}
