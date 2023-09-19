import { Box, Typography } from '@mui/joy';
import { ReactNode } from 'react';

export default function PageTitle({ title, rightSideContent }: { title: string; rightSideContent?: ReactNode }) {
  return (
    <Box
      sx={{
        display: 'flex',
        my: 1,
        gap: 1,
        flexDirection: { xs: 'column', sm: 'row' },
        alignItems: { xs: 'start', sm: 'center' },
        flexWrap: 'wrap',
        justifyContent: 'space-between',
      }}
    >
      <Typography level="h2">{title}</Typography>
      {rightSideContent}
    </Box>
  );
}
