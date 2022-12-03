import { ReceiptLong, Stadium, Stars } from '@mui/icons-material';
import { Grid, Paper, Typography } from '@mui/material';
import React from 'react';

import Container from '../components/Container';
import useStyles from './styles';

const Home: React.FC = (): JSX.Element => {
    const styles = useStyles();

    return (
        <Container>
            <Grid container spacing={3}>
                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.statisticPaper}>
                        <Stadium color="primary" sx={styles.homeIcon} />

                        <Typography variant="h4" sx={styles.homeText}>
                            <b>41</b> of 92 Visited
                        </Typography>
                    </Paper>
                </Grid>

                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.statisticPaper}>
                        <Stars color="primary" sx={styles.homeIcon} />

                        <Typography variant="h4" sx={styles.homeText}>
                            <b>4.24</b> Average Visit Rating
                        </Typography>
                    </Paper>
                </Grid>

                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.statisticPaper}>
                        <ReceiptLong color="primary" sx={styles.homeIcon} />

                        <Typography variant="h4" sx={styles.homeText}>
                            <b>67</b> Total Visits Recorded
                        </Typography>
                    </Paper>
                </Grid>
            </Grid>
        </Container>
    );
};

export default Home;
