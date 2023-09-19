import * as React from 'react';
import { HomeRounded as HomeRoundedIcon } from '@mui/icons-material';
import { ChevronRightRounded as ChevronRightRoundedIcon } from '@mui/icons-material';
import useScript from './useScript';
import SecondSidebar from './components/SecondSidebar';
import Header from './components/Header';
import ColorSchemeToggle from './components/ColorSchemeToggle';
import { Box, Breadcrumbs, CssBaseline, CssVarsProvider, Link, Typography } from '@mui/joy';

const useEnhancedEffect = typeof window !== 'undefined' ? React.useLayoutEffect : React.useEffect;

export default function JoyOrderDashboardTemplate({ children }: { children: React.ReactNode }) {
  const status = useScript(`https://unpkg.com/feather-icons`);

  useEnhancedEffect(() => {
    // Feather icon setup: https://github.com/feathericons/feather#4-replace
    // @ts-ignore
    if (typeof feather !== 'undefined') {
      // @ts-ignore
      feather.replace();
    }
  }, [status]);

  return (
    <CssVarsProvider disableTransitionOnChange>
      <CssBaseline />
      <Box sx={{ display: 'flex', minHeight: '100dvh' }}>
        <Header />
        <SecondSidebar />
        <Box
          component="main"
          className="MainContent"
          sx={{
            px: {
              xs: 2,
              md: 6,
            },
            pt: {
              xs: 'calc(12px + var(--Header-height))',
              sm: 'calc(12px + var(--Header-height))',
              md: 3,
            },
            pb: {
              xs: 2,
              sm: 2,
              md: 3,
            },
            flex: 1,
            display: 'flex',
            flexDirection: 'column',
            minWidth: 0,
            height: '100dvh',
            gap: 1,
          }}
        >
          <Box sx={{ display: 'flex', alignItems: 'center' }}>
            <Breadcrumbs size="sm" aria-label="breadcrumbs" separator={<ChevronRightRoundedIcon fontSize="sm" />}>
              <Link underline="none" color="neutral" href="#some-link" aria-label="Home">
                <HomeRoundedIcon />
              </Link>
              <Link underline="hover" color="neutral" href="#some-link" fontSize={12} fontWeight={500}>
                Dashboard
              </Link>
              <Typography color="primary" fontWeight={500} fontSize={12}>
                TODO
              </Typography>
            </Breadcrumbs>
            <ColorSchemeToggle sx={{ ml: 'auto', display: { xs: 'none', md: 'inline-flex' } }} />
          </Box>
          {children}
        </Box>
      </Box>
    </CssVarsProvider>
  );
}
