import { KeyboardDoubleArrowRight } from '@mui/icons-material';
import { Link, usePage } from '@inertiajs/inertia-react';
import { Typography } from '@mui/material';
import { Box } from '@mui/system';
import React, { Fragment } from 'react';

import { IInertiaProps } from 'app/interfaces';
import useStyles from './styles';

const BreadcrumbsContainer: React.FC = (): JSX.Element => {
    const {
        props: { breadcrumbs },
    } = usePage<IInertiaProps>();

    const styles = useStyles();

    return (
        <Box sx={styles.mainContainer}>
            {breadcrumbs.map(({ name, url, isActive }, index, self) => (
                <Fragment key={url}>
                    {isActive ? (
                        <Typography
                            variant="subtitle1"
                            sx={styles.breadcrumbNoLink}
                        >
                            {name}
                        </Typography>
                    ) : (
                        <Link key={url} style={styles.inertiaLink} href={url}>
                            <Typography variant="subtitle1">{name}</Typography>
                        </Link>
                    )}

                    {index !== self.length - 1 && (
                        <KeyboardDoubleArrowRight
                            color="secondary"
                            sx={styles.breadcrumbSeperator}
                        />
                    )}
                </Fragment>
            ))}
        </Box>
    );
};

export default BreadcrumbsContainer;
