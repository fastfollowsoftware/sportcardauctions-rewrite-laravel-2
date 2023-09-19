import AdminLayout from '@/Layouts/AdminLayout/AdminLayout';
import PageTitle from '@/Layouts/AdminLayout/components/PageTitle';
import Item from '@/types/Item';
import ActiveItemsTable from './ActiveItemsTable';

interface ItemsData {
  data: Item[];
}

export default function ActiveItemsIndex({ items }: { items: ItemsData }) {
  console.log('data', items);
  return (
    <AdminLayout>
      <PageTitle title="Active Items" />
      <ActiveItemsTable items={items.data} />
    </AdminLayout>
  );
}
