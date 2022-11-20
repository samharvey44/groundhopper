import * as Yup from 'yup';

export default Yup.object().shape({
    email: Yup.string()
        .email('Email must be in valid format.')
        .required('Email is required.'),
    password: Yup.string()
        .min(8, 'Password must be a minimum of 8 characters.')
        .required('Password is required.'),
    confirmPassword: Yup.string()
        .required('Please retype your password.')
        .oneOf([Yup.ref('password')], 'Passwords do not match!'),
});
