import {
    AppBar,
    Box,
    Button,
    Drawer,
    Grow,
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
import {
    AdminPanelSettings,
    Home,
    Logout,
    Menu,
    Person,
} from '@mui/icons-material';
import { Inertia } from '@inertiajs/inertia';
import { useSnackbar } from 'notistack';
import axios from 'axios';

import useHandleInertiaMessages from 'app/hooks/handleInertiaMessages';
import BreadcrumbsContainer from './components/BreadcrumbsContainer';
import useIsMediumScreen from 'app/hooks/isMediumScreen';
import useGetAuthedUser from 'app/hooks/getAuthedUser';
import { IProps } from './interfaces';
import { ERole } from 'app/enums';
import useStyles from './styles';

const Container: React.FC<IProps> = ({
    hideBreadcrumbs,
    children,
}): JSX.Element => {
    const [drawerOpen, setDrawerOpen] = useState(false);

    useHandleInertiaMessages();
    const styles = useStyles();
    const isMd = useIsMediumScreen();
    const authedUser = useGetAuthedUser();

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
            Home: {
                Icon: Home,
                endpoint: '/home',
                roles: [],
            },

            Profile: {
                Icon: Person,
                endpoint: '/profile',
                roles: [],
            },

            Admin: {
                Icon: AdminPanelSettings,
                endpoint: '/admin',
                roles: [ERole.SUPER_ADMIN, ERole.ADMIN],
            },
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
                        {Object.entries(drawerMap).map(
                            ([itemName, { Icon, endpoint, roles }]) => {
                                const isCurrentPath =
                                    window.location.pathname === endpoint;

                                const userHasRole = Boolean(
                                    roles.length
                                        ? roles.filter(
                                              (r) =>
                                                  r === authedUser?.role.name,
                                          ).length
                                        : true,
                                );

                                return userHasRole ? (
                                    <ListItem key={itemName} disablePadding>
                                        <ListItemButton
                                            sx={styles.listItemButton}
                                            onClick={() => {
                                                if (!isCurrentPath) {
                                                    Inertia.visit(endpoint);
                                                }
                                            }}
                                        >
                                            <ListItemIcon>
                                                <Icon
                                                    color={
                                                        isCurrentPath
                                                            ? 'primary'
                                                            : 'secondary'
                                                    }
                                                />
                                            </ListItemIcon>

                                            <ListItemText
                                                primary={
                                                    <Typography
                                                        variant="h6"
                                                        sx={
                                                            isCurrentPath
                                                                ? styles.drawerItemTextActive
                                                                : styles.drawerItemText
                                                        }
                                                    >
                                                        {itemName}
                                                    </Typography>
                                                }
                                            />
                                        </ListItemButton>
                                    </ListItem>
                                ) : null;
                            },
                        )}
                    </List>
                </Box>
            </Fragment>
        ),
        [
            authedUser?.role.name,
            drawerMap,
            isMd,
            styles.appbarTitle,
            styles.drawerHeader,
            styles.drawerItemText,
            styles.drawerItemTextActive,
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

            <Grow in>
                <Box sx={styles.pageContentContainer}>
                    {!hideBreadcrumbs && <BreadcrumbsContainer />}

                    <Box sx={styles.innerContentContainer}>{children}</Box>
                </Box>
            </Grow>
        </Box>
    );
};

export default Container;
