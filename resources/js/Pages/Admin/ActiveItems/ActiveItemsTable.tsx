'use client';

/* eslint-disable jsx-a11y/anchor-is-valid */
// icons
import { FilterAlt as FilterAltIcon } from '@mui/icons-material';
import { Search as SearchIcon } from '@mui/icons-material';
import { ArrowDropDown as ArrowDropDownIcon } from '@mui/icons-material';
import { KeyboardArrowRight as KeyboardArrowRightIcon } from '@mui/icons-material';
import { KeyboardArrowLeft as KeyboardArrowLeftIcon } from '@mui/icons-material';
import { Sell as SellIcon } from '@mui/icons-material';
import { Gavel as GavelIcon } from '@mui/icons-material';
import { ChangeEvent, SyntheticEvent, useCallback, useEffect, useState } from 'react';
import { formatCurrency } from '@/utils/formatCurrency';
import Item from '@/types/Item';
import { ItemFormat, ItemFormatName } from '@/enums/ItemFormat';
import { router, usePage } from '@inertiajs/react';
import {
  Box,
  Button,
  Checkbox,
  Chip,
  Divider,
  FormControl,
  FormLabel,
  IconButton,
  Input,
  Link,
  Modal,
  Select,
  Table,
  Typography,
  iconButtonClasses,
  Sheet,
  ModalDialog,
  ModalClose,
  Option,
  ColorPaletteProp,
} from '@mui/joy';
import { PaginatedData } from '@/types/PaginatedData';
import SortableColumnHeader from '@/Components/SortableColumnHeader';

type Order = 'asc' | 'desc';

export default function ActiveItemsTable({ items }: { items: PaginatedData<Item> }) {
  const page = usePage();
  const [, paramString] = page.url.split('?');
  const searchParams = new URLSearchParams(paramString);

  const search = searchParams.get('search') || '';
  const format = searchParams.get('format');
  const sortBy = searchParams.get('sort_by') || 'name';
  const sortDirection = searchParams.get('sort_direction') || 'asc';

  const [selected, setSelected] = useState<readonly number[]>([]);
  const [open, setOpen] = useState(false);
  const [searchInput, setSearchInput] = useState(search);
  const [formatInput, setFormatInput] = useState<string | null>(format);

  useEffect(() => {
    setSearchInput(search);
  }, [search]);

  useEffect(() => {
    setFormatInput(format);
  }, [format]);

  // Get a new searchParams string by merging the current
  // searchParams with a provided key/value pair
  const createQueryString = useCallback(
    (values: { [key: string]: string }) => {
      const params = new URLSearchParams(searchParams);

      for (let key of Object.keys(values)) {
        if (values[key]) {
          params.set(key, values[key]);
        } else {
          params.delete(key);
        }
      }

      params.delete('page');

      return params.toString();
    },
    [searchParams],
  );

  const updateFilter = useCallback(
    (values: { [key: string]: string }) => {
      router.get(`/admin/active-items?${createQueryString(values)}`, undefined, { preserveState: true });
    },
    [router, createQueryString],
  );

  const handleSearchInputChange = (e: ChangeEvent<HTMLInputElement>) => {
    setSearchInput(e.target.value);
    updateFilter({ search: e.target.value });
  };

  const handleFormatChange = (_e: SyntheticEvent | null, value: string | null) => {
    setFormatInput(value);
    updateFilter({ format: value || '' });
  };

  const updateSort = (column: string) => {
    const newSortDirection = sortBy === column ? (sortDirection === 'asc' ? 'desc' : 'asc') : 'asc';

    updateFilter({ sort_by: column, sort_direction: newSortDirection });
  };

  const renderFilters = () => (
    <>
      <FormControl size="sm">
        <FormLabel>Format</FormLabel>
        <Select size="sm" placeholder="All" value={formatInput} onChange={handleFormatChange}>
          <Option value={ItemFormat.auction}>{ItemFormatName[ItemFormat.auction]}</Option>
          <Option value={ItemFormat.fixed}>{ItemFormatName[ItemFormat.fixed]}</Option>
        </Select>
      </FormControl>
    </>
  );

  return (
    <>
      <Sheet
        className="SearchAndFilters-mobile"
        sx={{
          display: {
            xs: 'flex',
            sm: 'none',
          },
          my: 1,
          gap: 1,
        }}
      >
        <Input
          size="sm"
          placeholder="Search"
          startDecorator={<SearchIcon />}
          sx={{ flexGrow: 1 }}
          value={searchInput}
          onChange={handleSearchInputChange}
        />
        <IconButton size="sm" variant="outlined" color="neutral" onClick={() => setOpen(true)}>
          <FilterAltIcon />
        </IconButton>
        <Modal open={open} onClose={() => setOpen(false)}>
          <ModalDialog aria-labelledby="filter-modal" layout="fullscreen">
            <ModalClose />
            <Typography id="filter-modal" level="h2">
              Filters
            </Typography>
            <Divider sx={{ my: 2 }} />
            <Sheet sx={{ display: 'flex', flexDirection: 'column', gap: 2 }}>
              {renderFilters()}
              <Button color="primary" onClick={() => setOpen(false)}>
                Submit
              </Button>
            </Sheet>
          </ModalDialog>
        </Modal>
      </Sheet>
      <Box
        className="SearchAndFilters-tabletUp"
        sx={{
          borderRadius: 'sm',
          py: 2,
          display: {
            xs: 'none',
            sm: 'flex',
          },
          flexWrap: 'wrap',
          gap: 1.5,
          '& > *': {
            minWidth: {
              xs: '120px',
              md: '160px',
            },
          },
        }}
      >
        <FormControl sx={{ flex: 1 }} size="sm">
          <FormLabel>Search for order</FormLabel>
          <Input
            size="sm"
            placeholder="Search"
            startDecorator={<SearchIcon />}
            value={searchInput}
            onChange={handleSearchInputChange}
          />
        </FormControl>
        {renderFilters()}
      </Box>
      <Sheet
        className="OrderTableContainer"
        variant="outlined"
        sx={{
          width: '100%',
          borderRadius: 'sm',
          flexShrink: 1,
          overflow: 'auto',
          minHeight: 0,
        }}
      >
        <Table
          aria-labelledby="tableTitle"
          stickyHeader
          hoverRow
          sx={{
            '--TableCell-headBackground': 'var(--joy-palette-background-level1)',
            '--Table-headerUnderlineThickness': '1px',
            '--TableRow-hoverBackground': 'var(--joy-palette-background-level1)',
            '--TableCell-paddingY': '4px',
            '--TableCell-paddingX': '8px',
          }}
        >
          <thead>
            <tr>
              <th style={{ width: 48, textAlign: 'center', padding: '12px 6px' }}>
                <Checkbox
                  size="sm"
                  indeterminate={selected.length > 0 && selected.length !== items.data.length}
                  checked={selected.length === items.data.length}
                  onChange={(event) => {
                    setSelected(event.target.checked ? items.data.map((row) => row.id) : []);
                  }}
                  color={selected.length > 0 || selected.length === items.data.length ? 'primary' : undefined}
                  sx={{ verticalAlign: 'text-bottom' }}
                />
              </th>
              <th style={{ width: 120, padding: '12px 6px' }}></th>
              <th style={{ width: 300, padding: '12px 6px' }}>
                <SortableColumnHeader
                  name="name"
                  label="Name"
                  sortBy={sortBy}
                  sortDirection={sortDirection}
                  onClick={() => updateSort('name')}
                />
              </th>
              <th style={{ width: 100, padding: '12px 6px' }}>Format</th>
              <th style={{ width: 240, padding: '12px 6px' }}>Consignor</th>
              <th style={{ width: 120, padding: '12px 6px' }}>
                <SortableColumnHeader
                  name="current_price"
                  label="Current Price"
                  sortBy={sortBy}
                  sortDirection={sortDirection}
                  onClick={() => updateSort('current_price')}
                />
              </th>
              <th style={{ width: 120, padding: '12px 6px' }}>
                <SortableColumnHeader
                  name="available_quantity"
                  label="Available Qty"
                  sortBy={sortBy}
                  sortDirection={sortDirection}
                  onClick={() => updateSort('available_quantity')}
                />
              </th>
              <th style={{ width: 100, padding: '12px 6px' }}>
                <SortableColumnHeader
                  name="views"
                  label="Views"
                  sortBy={sortBy}
                  sortDirection={sortDirection}
                  onClick={() => updateSort('views')}
                />
              </th>
              <th style={{ width: 100, padding: '12px 6px' }}>
                <SortableColumnHeader
                  name="bids"
                  label="Bids"
                  sortBy={sortBy}
                  sortDirection={sortDirection}
                  onClick={() => updateSort('bids')}
                />
              </th>
              <th style={{ width: 150, padding: '12px 6px' }}>
                <SortableColumnHeader
                  name="ends_at"
                  label="Time Left"
                  sortBy={sortBy}
                  sortDirection={sortDirection}
                  onClick={() => updateSort('ends_at')}
                />
              </th>
            </tr>
          </thead>
          <tbody>
            {items.data.map((row) => (
              <tr key={row.id}>
                <td style={{ textAlign: 'center', width: 120 }}>
                  <Checkbox
                    size="sm"
                    checked={selected.includes(row.id)}
                    color={selected.includes(row.id) ? 'primary' : undefined}
                    onChange={(event) => {
                      setSelected((ids) =>
                        event.target.checked ? ids.concat(row.id) : ids.filter((itemId) => itemId !== row.id),
                      );
                    }}
                    slotProps={{ checkbox: { sx: { textAlign: 'left' } } }}
                    sx={{ verticalAlign: 'text-bottom' }}
                  />
                </td>
                <td>
                  <img src={row.image_url} width="100" />
                </td>
                <td>
                  <Typography level="body-xs">{row.name}</Typography>
                </td>
                <td>
                  <Chip
                    variant="soft"
                    size="sm"
                    startDecorator={
                      {
                        fixed: <SellIcon />,
                        auction: <GavelIcon />,
                      }[row.format]
                    }
                    color={
                      {
                        fixed: 'success',
                        auction: 'danger',
                      }[row.format] as ColorPaletteProp
                    }
                  >
                    {ItemFormatName[row.format]}
                  </Chip>
                </td>
                <td>
                  {/* <Box sx={{ display: 'flex', gap: 2, alignItems: 'center' }}>
                    <Avatar size="sm">{row.consignor.name[0]}</Avatar>
                    <div>
                      <Typography level="body-xs">
                        {row.consignor.name}
                      </Typography>
                    </div>
                  </Box> */}
                </td>
                <td>{formatCurrency(row.current_price)}</td>
                <td>{row.available_quantity}</td>
                <td>{row.views}</td>
                <td>{row.bids}</td>
                <td>{row.ends_at}</td>
              </tr>
            ))}
          </tbody>
        </Table>
      </Sheet>
      <Box
        className="Pagination-laptopUp"
        sx={{
          pt: 2,
          gap: 1,
          [`& .${iconButtonClasses.root}`]: { borderRadius: '50%' },
          display: {
            xs: 'none',
            md: 'flex',
          },
        }}
      >
        {items.prev_page_url && (
          <Button
            size="sm"
            variant="outlined"
            color="neutral"
            startDecorator={<KeyboardArrowLeftIcon />}
            onClick={() => router.get(items.prev_page_url)}
          >
            Previous
          </Button>
        )}

        <Box sx={{ flex: 1 }} />
        {items.links.map(
          (link, index) =>
            index !== 0 &&
            index !== items.links.length - 1 && (
              <IconButton
                key={index}
                size="sm"
                variant={link.url ? 'outlined' : 'plain'}
                color="neutral"
                onClick={() => {
                  router.get(link.url);
                }}
              >
                {link.label}
              </IconButton>
            ),
        )}
        <Box sx={{ flex: 1 }} />

        {items.next_page_url && (
          <Button
            size="sm"
            variant="outlined"
            color="neutral"
            endDecorator={<KeyboardArrowRightIcon />}
            onClick={() => router.get(items.next_page_url)}
          >
            Next
          </Button>
        )}
      </Box>
    </>
  );
}
