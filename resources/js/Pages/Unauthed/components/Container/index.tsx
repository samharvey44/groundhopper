import { Box, Grid, Grow, Paper } from '@mui/material';
import React from 'react';

import useHandleInertiaMessages from 'app/hooks/handleInertiaMessages';
import { IProps } from './interfaces';
import useStyles from './styles';

const Container: React.FC<IProps> = ({ children }): JSX.Element => {
    useHandleInertiaMessages();
    const styles = useStyles();

    return (
        <Grow in>
            <Grid container spacing={3}>
                <Grid item xs={12}>
                    <Box sx={styles.mainContainer}>
                        <Box sx={styles.innerMainContainer}>
                            <Paper sx={styles.mainPaper}>{children}</Paper>
                        </Box>
                    </Box>
                </Grid>
            </Grid>
        </Grow>
    );
};

export default Container;
