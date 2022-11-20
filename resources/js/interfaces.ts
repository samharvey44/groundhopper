import { ErrorBag, Errors, Page, PageProps } from '@inertiajs/inertia';

export interface IUser {
    id: number;
    email?: string;
}

export interface IInertiaProps extends Page<PageProps> {
    props: {
        errors: Errors & ErrorBag;
        auth: {
            user?: IUser;
        };
        successMessage?: string;
    };
}
