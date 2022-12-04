import {
    AppBar,
    Box,
    Button,
    Drawer,
    IconButton,
    List,
    ListItem,
    ListItemButton,
    ListItemIcon,
    ListItemText,
    Toolbar,
    Typography,
} from '@mui/material';
import React, { Fragment, useEffect, useMemo, useState } from 'react';
import { Home, Logout, Menu } from '@mui/icons-material';
import { Inertia } from '@inertiajs/inertia';
import { useSnackbar } from 'notistack';
import axios from 'axios';

import useHandleInertiaMessages from 'app/hooks/handleInertiaMessages';
import BreadcrumbsContainer from './components/BreadcrumbsContainer';
import useIsMediumScreen from 'app/hooks/isMediumScreen';
import { IProps } from './interfaces';
import useStyles from './styles';

const Container: React.FC<IProps> = ({
    hideBreadcrumbs,
    children,
}): JSX.Element => {
    const [drawerOpen, setDrawerOpen] = useState(false);

    useHandleInertiaMessages();
    const styles = useStyles();
    const isMd = useIsMediumScreen();

    const { enqueueSnackbar } = useSnackbar();

    const handleLogout = () => {
        axios
            .post('/logout')
            .then(() => {
                enqueueSnackbar('Logged out successfully.', {
                    variant: 'success',
                });

                Inertia.visit('/login');
            })
            .catch(() => {
                enqueueSnackbar('Failed to logout!', {
                    variant: 'error',
                });
            });
    };

    const handleToggleDrawer = () => {
        setDrawerOpen((curr) => !curr);
    };

    const drawerMap = useMemo(
        () => ({
            Home: Home,
        }),
        [],
    );

    const drawerList = useMemo(
        () => (
            <Fragment>
                {!isMd && (
                    <Box sx={styles.drawerHeader}>
                        <Typography variant="h5" sx={styles.appbarTitle}>
                            Groundhopper
                        </Typography>
                    </Box>
                )}

                <Box sx={styles.drawerListContainer}>
                    <List sx={styles.drawerList}>
                        {Object.entries(drawerMap).map(([itemName, Icon]) => (
                            <ListItem key={itemName} disablePadding>
                                <ListItemButton sx={styles.listItemButton}>
                                    <ListItemIcon>
                                        <Icon color="secondary" />
                                    </ListItemIcon>

                                    <ListItemText
                                        primary={
                                            <Typography
                                                variant="h6"
                                                sx={styles.drawerItemText}
                                            >
                                                Home
                                            </Typography>
                                        }
                                    />
                                </ListItemButton>
                            </ListItem>
                        ))}
                    </List>
                </Box>
            </Fragment>
        ),
        [
            drawerMap,
            isMd,
            styles.appbarTitle,
            styles.drawerHeader,
            styles.drawerItemText,
            styles.drawerList,
            styles.drawerListContainer,
            styles.listItemButton,
        ],
    );

    useEffect(() => {
        setDrawerOpen(false);
    }, [isMd]);

    return (
        <Box sx={styles.root}>
            <AppBar
                position="fixed"
                sx={isMd ? styles.appBarMd : styles.appBar}
            >
                <Toolbar>
                    <Box sx={styles.innerAppbarContainer}>
                        <Box sx={styles.appbarStartContainer}>
                            {isMd && (
                                <IconButton onClick={handleToggleDrawer}>
                                    <Menu sx={styles.appbarToggleButton} />
                                </IconButton>
                            )}
                        </Box>

                        <Box sx={styles.logoutContainer}>
                            <Button
                                color="secondary"
                                variant="contained"
                                startIcon={isMd ? undefined : <Logout />}
                                onClick={handleLogout}
                            >
                                {isMd ? <Logout /> : 'Logout'}
                            </Button>
                        </Box>
                    </Box>
                </Toolbar>
            </AppBar>

            <Drawer
                variant={isMd ? 'temporary' : 'permanent'}
                PaperProps={{
                    sx: styles.drawer,
                }}
                ModalProps={{
                    keepMounted: true,
                }}
                open={drawerOpen}
                onClose={handleToggleDrawer}
            >
                {drawerList}
            </Drawer>

            <Box sx={styles.pageContentContainer}>
                {!hideBreadcrumbs && <BreadcrumbsContainer />}

                <Box sx={styles.innerContentContainer}>{children}</Box>
            </Box>
        </Box>
    );
};

export default Container;
