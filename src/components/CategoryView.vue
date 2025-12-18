<script>
import { useProductStore } from "@/stores/productStore";
 
import Header from "../components/HeaderComponent.vue"
export default {
  name: 'categoryview',
  components:{
    Header,
  },
  data() {
    return {
      category: null,
      products: [],
      loading: true,
      error: null,
    };
  },
  async mounted() {
      const store = useProductStore();
      
      if (!store.loaded) {
        await store.loadAll();
      }
      
      const categoryId = this.$route.params.id;
      this.category = store.getCategoriesById(categoryId);
      if (!categoryId) {
        this.error = "No category ID provided";
        this.loading = false;
        return;
      }
    }
  
}
</script>

<template>
  <Header/>
  <div class="w-[1830px] h-[240px] bg-[url(/figure.png)] rounded-lg mt-5 bg-cover">
    <div class="p-[50px]">
          <span class="text-[50px] text-[#253D4E] font-[Quicksand] font-bold">{{ category ? category.name : '' }}</span>
      <div class="flex flex-cols gap-5 items-center">
        <span class="text-[#7E7E7E]">Home</span>
      <img src="/down.png" alt="" class="rotate-270 w-[6px] h-[10px]">
      <span class="text-[#7E7E7E]">Categories</span>
      <img src="/down.png" alt="" class="rotate-270 w-[6px] h-[10px]">
      <span class="text-[#7E7E7E]">{{ category?.name }}</span>
      </div>
    </div>

    
    
  </div>
</template>