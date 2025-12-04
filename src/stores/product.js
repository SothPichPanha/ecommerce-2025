import { defineStore } from "pinia";
import axios from "axios";

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: []
  }),

  getters: {

    // List all categories by group name
    getCategoriesByGroup: (state) => {
      return (groupName) =>
        state.categories.filter((category) => category.group === groupName);
    },

    // List all products by group name
    getProductsByGroup: (state) => {
      return (groupName) =>
        state.products.filter((product) => product.group === groupName);
    },

    // List all products by categoryId
    getProductsByCategory: (state) => {
      return (categoryId) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },

    // List all popular products
    getPopularProducts: (state) => {
      return state.products.filter((product) => product.countSold > 10);
    },
  },

  actions: {
    async fetchCategories() {
      const res = await axios.get("http://localhost:3000/api/categories");
      this.categories = res.data;
    },

    async fetchPromotions() {
      const res = await axios.get("http://localhost:3000/api/promotions");
      this.promotions = res.data;
    }
  }
});
