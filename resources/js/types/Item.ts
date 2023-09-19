import { ItemFormat } from '@/enums/ItemFormat';

export default interface Item {
  id: number;

  created_at: string;

  updated_at: string;

  ebay_id: string;

  image_url: string;

  name: string;

  format: ItemFormat;

  current_price: number;

  available_quantity: number;

  views: number;

  bids: number;

  ends_at: string;

  sold_at?: string;

  sold_price?: number;

  fee_amount?: number;

  fee_adjustment_amount: number;
}
