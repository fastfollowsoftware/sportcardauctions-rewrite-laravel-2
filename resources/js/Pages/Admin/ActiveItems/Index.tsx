import AdminLayout from '@/Layouts/AdminLayout/AdminLayout';
import PageTitle from '@/Layouts/AdminLayout/components/PageTitle';
import Item from '@/types/Item';
import ActiveItemsTable from './ActiveItemsTable';
import { PaginatedData } from '@/types/PaginatedData';

export default function ActiveItemsIndex({ items }: { items: PaginatedData<Item> }) {
  return (
    <AdminLayout>
      <PageTitle title="Active Items" />
      <ActiveItemsTable items={items} />
    </AdminLayout>
  );
}
