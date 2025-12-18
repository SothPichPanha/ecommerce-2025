import { defineStore } from "pinia";
import axios from "axios";

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: [],
    loaded: false,
  }),
  
  actions: {
    async loadGroups() {
      try {
        const res = await axios.get("http://localhost:3000/api/groups");
        this.groups = res.data;
        console.log('Groups loaded:', this.groups.length);
      } catch (error) {
        console.error('Error loading groups:', error);
      }
    },
    
    async loadPromotions() {
      try {
        const res = await axios.get("http://localhost:3000/api/promotions");
        this.promotions = res.data;
        console.log('Promotions loaded:', this.promotions.length);
      } catch (error) {
        console.error('Error loading promotions:', error);
      }
    },
    
    async loadCategories() {
      try {
        const res = await axios.get("http://localhost:3000/api/categories");
        this.categories = res.data;
        console.log('Categories loaded:', this.categories.length);
      } catch (error) {
        console.error('Error loading categories:', error);
      }
    },
    
    async loadProducts() {
      try {
        const res = await axios.get("http://localhost:3000/api/products");
        this.products = res.data;
        console.log('Products loaded:', this.products.length);
      } catch (error) {
        console.error('Error loading products:', error);
      }
    },
    
    async loadAll() {
      if (this.loaded) return;
      await Promise.all([
        this.loadGroups(),
        this.loadPromotions(),
        this.loadCategories(),
        this.loadProducts(),
      ]);
      this.loaded = true;
    },
  },
  
  getters: {
    getProductById: (state) => {
      return (id) => state.products.find((p) => String(p.id) === String(id));
    },
    getCategoriesById: (state) => {
      return (id) => state.categories.find((c) => String(c.id) === String(id));
    },
    
    allCategories: (state) => {
      return state.categories;
    },
    
    allPromotions: (state) => {
      return state.promotions;
    },
    
    getPopularProducts: (state) => {
      // Return products marked as popular, or all products if none are popular
      const popularProducts = state.products.filter(p => p.popular === true);
      return popularProducts.length > 0 ? popularProducts : state.products;
    },
  },
});