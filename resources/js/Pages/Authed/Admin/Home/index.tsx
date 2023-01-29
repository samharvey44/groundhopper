import { Grid, Paper } from '@mui/material';
import React from 'react';

import Container from '../../components/Container';
import useStyles from './styles';

const AdminHome: React.FC = (): JSX.Element => {
    const styles = useStyles();

    return (
        <Container>
            <Grid container spacing={3}>
                <Grid item xs={12} sx={styles.gridItem}>
                    <Paper sx={styles.headerPaper}></Paper>
                </Grid>
            </Grid>
        </Container>
    );
};

export default AdminHome;
