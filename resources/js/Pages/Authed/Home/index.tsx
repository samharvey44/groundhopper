import { ReceiptLong, Stadium, Stars } from '@mui/icons-material';
import { Grid, Paper, Typography } from '@mui/material';
import React, { Fragment } from 'react';

import Container from '../components/Container';
import { IProps } from './interfaces';
import useStyles from './styles';

const Home: React.FC<IProps> = ({
    englishVisits,
    averageVisitRating,
    totalVisits,
}): JSX.Element => {
    const styles = useStyles();

    return (
        <Container>
            <Grid container spacing={3}>
                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.statisticPaper}>
                        <Stadium color="primary" sx={styles.homeIcon} />

                        <Typography variant="h4" sx={styles.homeText}>
                            <b>{englishVisits}</b> of 92 Visited
                        </Typography>
                    </Paper>
                </Grid>

                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.statisticPaper}>
                        <Stars color="primary" sx={styles.homeIcon} />

                        <Typography variant="h4" sx={styles.homeText}>
                            {totalVisits > 0 ? (
                                <Fragment>
                                    <b>{averageVisitRating}</b> Average Visit
                                    Rating
                                </Fragment>
                            ) : (
                                <Fragment>No Average Rating Yet!</Fragment>
                            )}
                        </Typography>
                    </Paper>
                </Grid>

                <Grid item xs={12} md={4} sx={styles.gridItem}>
                    <Paper sx={styles.statisticPaper}>
                        <ReceiptLong color="primary" sx={styles.homeIcon} />

                        <Typography variant="h4" sx={styles.homeText}>
                            <b>{totalVisits}</b> Total Visits Recorded
                        </Typography>
                    </Paper>
                </Grid>
            </Grid>
        </Container>
    );
};

export default Home;
