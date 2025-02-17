export interface Column {
  name: string,
  label: string,
  field: string,
  align?: "left" | "right" | "center",
  required?: boolean,
  sortable?: boolean,
}

export interface Order {
  id: bigint,
  title: string,
  description: string,
  deadline: string,
}
