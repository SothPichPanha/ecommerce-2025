<template>
  <div class=" ">
    <Header/>
    <Figure/>
    <MenuComponent title="Featured category" />
    <CategoryListLocal :categories="categories" />
    <PromotionListLocal :promotions="promotions" />
    <MenuComponent title="Popular Products" />
    <GroupProductslocal :product="products" />
  </div>
</template>

<script>
import { useProductStore } from "@/stores/productStore";
import CategoryComponent from "../components/CategoryComponent.vue";
import PromotionComponent from "../components/PromotionComponent.vue";
import MenuComponent from "../components/MenuComponent.vue";
import ProductComponent from "../components/ProductComponent.vue";
import Header from "../components/HeaderComponent.vue"
import Figure from "../components/FigureComponent.vue"

export default {
  name: "Home",
  components: {
    MenuComponent,
    CategoryListLocal: CategoryComponent,
    PromotionListLocal: PromotionComponent,
    GroupProductslocal: ProductComponent,
    Header,
    Figure
  },
  data() {
    return {
      store: useProductStore(),
    };
  },
  computed: {
    categories() {
      return this.store.categories || [];
    },
    promotions() {
      return this.store.promotions || [];
    },
    products() {
      // Access the getter correctly and return all products if no popular ones
      const popularProducts = this.store.products.filter(p => p.popular);
      return popularProducts.length > 0 ? popularProducts : this.store.products;
    },
  },
  async mounted() {
    if (!this.store.loaded) {
      await this.store.loadAll();
    }
    
    // Debug: Check if products are loaded
    console.log('Products loaded:', this.store.products);
    console.log('Categories:', this.store.categories);
    console.log('Promotions:', this.store.promotions);
  },
};
</script>

<style scoped>
</style>