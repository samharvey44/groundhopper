import { Box, Grid, Paper } from '@mui/material';
import React from 'react';

import { IProps } from './interfaces';
import useStyles from './styles';

const Container: React.FC<IProps> = ({ children }): JSX.Element => {
    const styles = useStyles();

    return (
        <Grid container spacing={3}>
            <Grid item xs={12}>
                <Box sx={styles.mainContainer}>
                    <Box sx={styles.innerMainContainer}>
                        <Paper sx={styles.mainPaper}>{children}</Paper>
                    </Box>
                </Box>
            </Grid>
        </Grid>
    );
};

export default Container;
