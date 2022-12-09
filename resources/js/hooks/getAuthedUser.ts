import { usePage } from '@inertiajs/inertia-react';
import { useMemo } from 'react';

import { IInertiaProps } from 'app/interfaces';

export default function useGetAuthedUser() {
    const {
        props: {
            auth: { user },
        },
    }: IInertiaProps = usePage();

    return useMemo(() => user, [user]);
}
