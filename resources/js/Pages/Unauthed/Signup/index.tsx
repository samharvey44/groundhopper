import { Button, TextField, Typography } from '@mui/material';
import { PermIdentity } from '@mui/icons-material';
import { Link } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import { useFormik } from 'formik';
import { Box } from '@mui/system';
import React from 'react';

import initialValues from './form/initialValues';
import Container from '../components/Container';
import schema from './form/schema';
import useStyles from './styles';

const Signup: React.FC = (): JSX.Element => {
    const styles = useStyles();

    const form = useFormik({
        initialValues,
        validationSchema: schema,
        onSubmit: (values) => {
            const { email, password, confirmPassword } = values;

            Inertia.post('/signup', {
                email,
                password,
                password_confirmation: confirmPassword,
            });
        },
    });

    return (
        <Container>
            <Box sx={styles.innerContainer}>
                <Typography variant="h3">Sign up</Typography>
                <Typography variant="subtitle1">
                    Start tracking your stadium visits now.
                </Typography>

                <Box sx={styles.formContainer}>
                    <form onSubmit={form.handleSubmit}>
                        <TextField
                            fullWidth
                            label="Enter your email..."
                            variant="filled"
                            name="email"
                            value={form.values.email}
                            onChange={form.handleChange}
                            error={form.touched.email && !!form.errors.email}
                            helperText={form.touched.email && form.errors.email}
                        />

                        <TextField
                            fullWidth
                            label="Enter your password..."
                            variant="filled"
                            name="password"
                            type="password"
                            sx={styles.password}
                            value={form.values.password}
                            onChange={form.handleChange}
                            error={
                                form.touched.password && !!form.errors.password
                            }
                            helperText={
                                form.touched.password && form.errors.password
                            }
                        />

                        <TextField
                            fullWidth
                            label="Confirm your password..."
                            variant="filled"
                            name="confirmPassword"
                            type="password"
                            sx={styles.password}
                            value={form.values.confirmPassword}
                            onChange={form.handleChange}
                            error={
                                form.touched.confirmPassword &&
                                !!form.errors.confirmPassword
                            }
                            helperText={
                                form.touched.confirmPassword &&
                                form.errors.confirmPassword
                            }
                        />

                        <Box sx={styles.loginButtonContainer}>
                            <Button
                                sx={styles.loginButton}
                                variant="contained"
                                startIcon={<PermIdentity />}
                                type="submit"
                            >
                                Sign Up
                            </Button>
                        </Box>
                    </form>

                    <Box sx={styles.signupLinkContainer}>
                        <Link href="/login" style={styles.inertiaLink}>
                            <Typography variant="subtitle1">
                                Already got an account? Sign up here!
                            </Typography>
                        </Link>
                    </Box>
                </Box>
            </Box>
        </Container>
    );
};

export default Signup;
