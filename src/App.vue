<template>
  <div class="home ml-[50px] mr-[50px] ">
    <MenuComponent />
    <CategoryListLocal :categories="categories" />
    <PromotionListLocal :promotions="promotions" />
  <div class="grid xl:grid-cols-5 gap-4 p-4">
    <GroupProducts/>
    <GroupProducts/>
    <GroupProducts/>
      <GroupProducts/>
    <GroupProducts/>
      <GroupProducts/>
    <GroupProducts/>
      <GroupProducts/>
    <GroupProducts/>
    <GroupProducts/>
      <GroupProducts/>
    <GroupProducts/>
      <GroupProducts/>
    <GroupProducts/>
  </div>
    
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
/*  */
  components: {
    MenuComponent: MenuComponent ,
    CategoryListLocal: CategoryList,
    PromotionListLocal: PromotionList,
    GroupProducts: GroupProducts,
    
  },

  data() {
    return {
      categories: [], 
      promotions: []  
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
  },

  mounted() {
   
    this.fetchCategories();
    this.fetchPromotions();
  }
};
</script>

<style scoped>
  
</style>
