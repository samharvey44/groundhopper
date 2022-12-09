import { ErrorBag, Errors, Page, PageProps } from '@inertiajs/inertia';

import { ERole } from './enums';

export interface IRole {
    id: number;
    name: ERole;
}
export interface IUser {
    id: number;
    email?: string;
    role: IRole;
}

export interface IProfile {
    displayName: string;
}

export interface IBreadcrumb {
    name: string;
    url: string;
    isActive: boolean;
}

export interface IInertiaProps extends Page<PageProps> {
    props: {
        errors: Errors & ErrorBag;
        auth: {
            user: IUser | null;
        };
        successMessage?: string;
        breadcrumbs: IBreadcrumb[];
    };
}
