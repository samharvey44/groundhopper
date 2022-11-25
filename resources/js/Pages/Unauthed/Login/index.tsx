import { Box, Button, Checkbox, TextField, Typography } from '@mui/material';
import { LoginTwoTone } from '@mui/icons-material';
import { Link } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import { useFormik } from 'formik';
import React from 'react';

import initialValues from './form/initialValues';
import Container from '../components/Container';
import schema from './form/schema';
import useStyles from './styles';

const Login: React.FC = (): JSX.Element => {
    const styles = useStyles();

    const form = useFormik({
        initialValues,
        validationSchema: schema,
        onSubmit: (values) => {
            const { email, password, rememberMe } = values;

            Inertia.post('/login', {
                email,
                password,
                rememberMe,
            });
        },
    });

    const handleRememberMeChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        form.setFieldValue('rememberMe', e.target.checked);
    };

    return (
        <Container>
            <Box sx={styles.innerContainer}>
                <Typography variant="h3">Groundhopper</Typography>
                <Typography variant="subtitle1">
                    Track your journey to reaching the 92.
                </Typography>

                <Box sx={styles.formContainer}>
                    <form onSubmit={form.handleSubmit}>
                        <TextField
                            fullWidth
                            label="Enter your email..."
                            variant="filled"
                            name="email"
                            error={form.touched.email && !!form.errors.email}
                            helperText={form.touched.email && form.errors.email}
                            onChange={form.handleChange}
                        />

                        <TextField
                            fullWidth
                            label="Enter your password..."
                            variant="filled"
                            type="password"
                            sx={styles.password}
                            name="password"
                            error={
                                form.touched.password && !!form.errors.password
                            }
                            helperText={
                                form.touched.password && form.errors.password
                            }
                            onChange={form.handleChange}
                        />

                        <Box sx={styles.rememberMeContainer}>
                            <Typography variant="subtitle1">
                                Remember me?
                            </Typography>

                            <Checkbox
                                name="rememberMe"
                                sx={styles.rememberMe}
                                onChange={handleRememberMeChange}
                            />
                        </Box>

                        <Box sx={styles.loginButtonContainer}>
                            <Button
                                sx={styles.loginButton}
                                variant="contained"
                                startIcon={<LoginTwoTone />}
                                type="submit"
                            >
                                Login
                            </Button>
                        </Box>
                    </form>

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
