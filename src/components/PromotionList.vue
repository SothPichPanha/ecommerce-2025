<template>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 p-4">
    <div
      class="flex justify-between items-center p-8 rounded-2xl"
      v-for="(promo, index) in promotions"
      :key="index"
      :style="{ backgroundColor: promo.color }"
    > 
      <div class="flex flex-col">
        <h3 class="w-3/5 text-gray-900 text-lg font-semibold leading-snug mb-3">
          {{ promo.title }}
        </h3>
        <button 
          class="text-white border-0 px-5 py-2 rounded-full cursor-pointer mt-2 inline-flex items-center gap-2 hover:opacity-90 transition-opacity w-fit"
          :style="{ backgroundColor: promo.buttonColor }" 
          @click="shopnow(promo)"
        >
          Shop Now →
        </button>
      </div>
      <img 
        :src="`http://localhost:3000/${promo.image}`" 
        :alt="promo.title"
        class="w-70 h-55"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "PromotionList",
  props: { 
    promotions: Array 
  },
  methods: {
    shopnow(promo) {
      alert("let's shop from: " + promo.title);
    }
  }
};
</script>

<style scoped>

</style>