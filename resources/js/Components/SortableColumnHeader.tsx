import { Link } from '@mui/joy';
import { ArrowDropDown as ArrowDropDownIcon } from '@mui/icons-material';

export default function SortableColumnHeader({
  name,
  label,
  sortBy,
  sortDirection,
  onClick,
}: {
  name: string;
  label: string;
  sortBy: string;
  sortDirection: string;
  onClick: () => void;
}) {
  return (
    <Link
      underline="none"
      color="primary"
      component="button"
      onClick={onClick}
      fontWeight="lg"
      endDecorator={sortBy === name && <ArrowDropDownIcon />}
      sx={{
        '& svg': {
          transition: '0.2s',
          transform: sortDirection === 'desc' ? 'rotate(0deg)' : 'rotate(180deg)',
        },
      }}
    >
      {label}
    </Link>
  );
}
