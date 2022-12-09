import { Avatar, Box, Grid, Paper, Typography } from '@mui/material';
import React from 'react';

import Container from '../components/Container';
import { IProps } from './interfaces';
import useStyles from './styles';

const Profile: React.FC<IProps> = ({ profile }): JSX.Element => {
    const styles = useStyles();

    return (
        <Container>
            <Grid container spacing={3}>
                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.paper}>
                        <Box sx={styles.profilePictureContainer}>
                            <Avatar sx={styles.profilePicture} />

                            <Typography variant="h4" sx={styles.displayName}>
                                <b>{profile.displayName}</b>
                            </Typography>
                        </Box>
                    </Paper>
                </Grid>

                <Grid item xs={12} md={8} sx={styles.gridItem}>
                    <Paper sx={styles.paper}></Paper>
                </Grid>
            </Grid>
        </Container>
    );
};

export default Profile;
