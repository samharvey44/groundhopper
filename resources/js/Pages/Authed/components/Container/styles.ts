import { useMemo } from 'react';

import useIsMediumScreen from 'app/hooks/isMediumScreen';
import { PRIMARY, SECONDARY } from 'app/globals/colors';

export default function useStyles() {
    const isMd = useIsMediumScreen();

    const drawerWidth = 230;
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
                boxShadow: '0px 3px 20px 0px rgba(0,0,0,0.2)',
            },

            appBarMd: {
                width: '100%',
                boxShadow: '0px 3px 20px 0px rgba(0,0,0,0.2)',
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
                overflow: 'visible',
            },

            drawerListContainer: {
                width: '100%',
                display: 'flex',
                flex: 1,
                boxShadow: '3px 0px 20px 0px rgba(0,0,0,0.1)',
                flexDirection: 'column',
                alignItems: 'center',
            },

            drawerList: {
                width: '100%',
            },

            listItemButton: {
                paddingLeft: '30px',
                paddingRight: '30px',
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

            pageContentContainer: {
                marginLeft: isMd ? '0px' : `${drawerWidth}px`,
                padding: '25px 40px 0px 40px',
                overflowY: 'scroll',
                marginTop: `${appbarHeight}px`,
                height: `calc(100vh - ${appbarHeight}px - 25px)`,
                display: 'flex',
                flexDirection: 'column',
            },

            drawerItemText: {
                color: SECONDARY,
            },

            innerContentContainer: {
                flex: 1,
            },
        }),
        [isMd],
    );
}
