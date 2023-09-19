import * as React from 'react';
import { BubbleChart as BubbleChartIcon } from '@mui/icons-material';
import { closeSidebar } from '../utils';
import {
  Box,
  List,
  ListItem,
  ListItemButton,
  ListItemContent,
  ListItemDecorator,
  ListSubheader,
  Sheet,
} from '@mui/joy';
import { router } from '@inertiajs/react';

export default function SecondSidebar() {
  return (
    <React.Fragment>
      <Box
        className="SecondSidebar-overlay"
        sx={{
          position: 'fixed',
          zIndex: 9998,
          top: 0,
          left: 0,
          width: '100vw',
          height: '100vh',
          opacity: 'var(--SideNavigation-slideIn)',
          backgroundColor: 'var(--joy-palette-background-backdrop)',
          transition: 'opacity 0.4s',
          transform: {
            xs: 'translateX(calc(100% * (var(--SideNavigation-slideIn, 0) - 1) + var(--SideNavigation-slideIn, 0) * var(--FirstSidebar-width, 0px)))',
            lg: 'translateX(-100%)',
          },
        }}
        onClick={() => closeSidebar()}
      />
      <Sheet
        className="SecondSidebar"
        color="neutral"
        sx={{
          position: {
            xs: 'fixed',
            lg: 'sticky',
          },
          transform: {
            xs: 'translateX(calc(100% * (var(--SideNavigation-slideIn, 0) - 1) + var(--SideNavigation-slideIn, 0) * var(--FirstSidebar-width, 0px)))',
            lg: 'none',
          },
          transition: 'transform 0.4s',
          zIndex: 9999,
          height: '100dvh',
          top: 0,
          p: 2,
          flexShrink: 0,
          display: 'flex',
          flexDirection: 'column',
          gap: 2,
          borderRight: '1px solid',
          borderColor: 'divider',
        }}
      >
        <List
          size="sm"
          sx={{
            '--ListItem-radius': '6px',
            '--List-gap': '6px',
          }}
        >
          <ListSubheader role="presentation" sx={{ fontWeight: 'lg' }}>
            Dashboard
          </ListSubheader>
          <ListItem>
            <ListItemButton
              onClick={() => {
                router.get('/admin');
                closeSidebar();
              }}
            >
              <ListItemDecorator>
                <BubbleChartIcon />
              </ListItemDecorator>
              <ListItemContent>Overview</ListItemContent>
            </ListItemButton>
          </ListItem>
          <ListItem>
            <ListItemButton
              onClick={() => {
                router.get('/admin/active-items');
                closeSidebar();
              }}
            >
              <ListItemDecorator>
                <BubbleChartIcon />
              </ListItemDecorator>
              <ListItemContent>Active Items</ListItemContent>
            </ListItemButton>
          </ListItem>
        </List>
      </Sheet>
    </React.Fragment>
  );
}
