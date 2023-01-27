import { usePage } from '@inertiajs/react';
import { useMemo } from 'react';

import { IInertiaProps } from 'app/interfaces';

export default function useGetAuthedUser() {
    const {
        props: {
            auth: { user },
        },
    } = usePage() as IInertiaProps;

    return useMemo(() => user, [user]);
}
