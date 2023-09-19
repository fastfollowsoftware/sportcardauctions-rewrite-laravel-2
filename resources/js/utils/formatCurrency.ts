export function formatCurrency(value: number) {
  const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
  });
  const formatted = formatter.format(value / 100);
  return formatted.toString();
}
