import { Box, Button, TextField, Typography } from '@mui/material';
import { LoginTwoTone } from '@mui/icons-material';
import { Link } from '@inertiajs/inertia-react';
import React from 'react';

import Container from '../components/Container';
import useStyles from './styles';

const Login: React.FC = (): JSX.Element => {
    const styles = useStyles();

    return (
        <Container>
            <Box sx={styles.innerContainer}>
                <Typography variant="h3">Groundhopper</Typography>
                <Typography variant="subtitle1">
                    Track your journey to reaching the 92.
                </Typography>

                <Box sx={styles.formContainer}>
                    <TextField
                        fullWidth
                        label="Enter your email..."
                        variant="filled"
                    />

                    <TextField
                        fullWidth
                        label="Enter your password..."
                        variant="filled"
                        type="password"
                        sx={styles.password}
                    />

                    <Box sx={styles.loginButtonContainer}>
                        <Button
                            sx={styles.loginButton}
                            variant="contained"
                            startIcon={<LoginTwoTone />}
                        >
                            Login
                        </Button>
                    </Box>

                    <Box sx={styles.signupLinkContainer}>
                        <Link href="/signup" style={styles.inertiaLink}>
                            <Typography variant="subtitle1">
                                {"Haven't got an account yet? Sign up now!"}
                            </Typography>
                        </Link>
                    </Box>
                </Box>
            </Box>
        </Container>
    );
};

export default Login;
