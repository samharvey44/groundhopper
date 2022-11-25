import * as Yup from 'yup';

export default Yup.object().shape({
    email: Yup.string()
        .email('Email must be in valid format.')
        .required('Email is required.'),
    password: Yup.string().required('Password is required.'),
    rememberMe: Yup.bool().required(),
});
