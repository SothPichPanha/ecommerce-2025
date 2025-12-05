<template>
  <div class="home ml-[50px] mr-[50px]">
    <MenuComponent />
    <CategoryListLocal :categories="categories" />
    <PromotionListLocal :promotions="promotions" />
    <GroupProductslocal :product="product" />
  </div>
</template>

<script>
import axios from "axios";
import CategoryList from "./components/CategoryList.vue";
import PromotionList from "./components/PromotionList.vue";
import MenuComponent from "./components/MenuComponent.vue";
import GroupProducts from "./components/GroupProducts.vue";

export default {
  name: "Home",
  components: {
    MenuComponent,
    CategoryListLocal: CategoryList,
    PromotionListLocal: PromotionList,
    GroupProductslocal: GroupProducts,
  },
  data() {
    return {
      categories: [], 
      promotions: [],
      product: []
    };
  },
  methods: {
    async fetchCategories() {
      try {
        const res = await axios.get("http://localhost:3000/api/categories");
        this.categories = res.data;   
        console.log("Loaded categories:", this.categories);
      } catch (err) {
        console.error("Error loading categories:", err);
      }
    },
    async fetchPromotions() {
      try {
        const res = await axios.get("http://localhost:3000/api/promotions");
        this.promotions = res.data;
        console.log("Loaded promotions:", this.promotions);
      } catch (err) {
        console.error("Error loading promotions:", err);
      }
    },
    async fetchProducts() {
      try {
        const res = await axios.get("http://localhost:3000/api/products");
        console.log("API Response:", res);
        console.log("Response data:", res.data);
        this.product = res.data;
        console.log("Loaded products:", this.product);
        console.log("Product count:", this.product.length);
      } catch (err) {
        console.error("Error loading products:", err);
        console.error("Error details:", err.response);
      }
    },
  },
  mounted() {
    this.fetchCategories();
    this.fetchPromotions();
    this.fetchProducts();
  }
};
</script>

<style scoped>
</style>