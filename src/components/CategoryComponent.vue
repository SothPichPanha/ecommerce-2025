<template>
  <div class="w-full" 
  
  >
    <div class="grid  xl:grid-cols-10 gap-4 ">
      <div
        class="flex flex-col items-center justify-center p-6 rounded-2xl cursor-pointer transition-all duration-300 hover:shadow-lg hover:scale-105 border border-gray-100"
        v-for="(cat, index) in categories"
        :key="index"
        :style="{ backgroundColor: cat.color }"
        @click="viewCategory(cat)"
      >
        <div class="w-24 h-32 mb-3 flex items-center justify-center">
          <img 
            :src="`http://localhost:3000/${cat.image}`" 
            :alt="cat.name"
            class="w-full h-full object-contain"
          />
        </div>
        <h4 class="text-base font-semibold text-gray-800 text-center mb-1">
          {{ cat.name }}
        </h4>
        <p class="text-sm text-gray-500">
          {{ cat.productCount }} items
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CategoryList",
    props: {
    categories: {
      type: Array,
      default: () => []
    }
  },
   methods: {
    viewCategory(cat) {
      this.$router.push({ 
        name: 'categoryview', 
        params: { id: cat.id }
      });
    },
  }
};
</script>

<style scoped>
 
</style>