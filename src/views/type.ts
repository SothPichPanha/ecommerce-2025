export interface Group {
  id: number;
  name: string;
  image: string;
}

export interface Category {
  id: number;
  name: string;
  image: string;
  color: string;
  productCount: number;
}

export interface Promotion {
  id: number;
  title: string;
  url: string;
  image: string;
  color: string;
  buttonColor: string;
}

export interface Product {
  id: number;
  name: string;              // backend uses "name"
  rating: number;
  size: string;
  image: string;
  price: number;
  promotionAsPercentage: number;
  categoryId: number;
  instock: number;
  countSold: number;
  group: string;
  createdAt: string;
  updatedAt: string;
}
