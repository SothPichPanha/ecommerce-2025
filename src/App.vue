<script lang="ts" setup>
import CategoryComponent from './components/CategoryComponent.vue'

const categories = [
 { name: "Cake & Milk", items: 14, image: "../image/cate_13.png", bgColor: "#f4f9f4" },
  { name: "Peach", items: 17, image: "../image/cat-11 1.png", bgColor: "#fff8e1" },
  { name: "Organic Kiwi", items: 21, image: "../image/cat-12.png", bgColor: "#f3fff3" },
  { name: "Red Apple", items: 68, image: "../image/cat-4.png", bgColor: "#fff0ed" },
  { name: "Snack", items: 34, image: "../image/cat-5.png", bgColor: "#fff8e6" },
  { name: "Black Plum", items: 25, image: "../image/cat-6.png", bgColor: "#fdefff" },
  { name: "Vegetables", items: 65, image: "../image/cat-7.png", bgColor: "#e7f9e7" },
  { name: "Headphone", items: 33, image: "../image/cat-8.png", bgColor: "#fff8e1" },
  { name: "Orange", items: 63, image: "../image/cat-10.png", bgColor: "#fff0f4" },
]

const banners = [
  {
    title: "Everyday Fresh & Clean with Our Products",
    buttonText: "Shop Now →",
    image: "../image/Cms-1.png",
    bgColor: "#f0f3e8",
    buttonColor: "#3BB77E"
  },
  {
    title: "Make your Breakfast Healthy and Easy",
    buttonText: "Shop Now →",
    image: "../image/Cms-2.png",
    bgColor: "#f5eff7",
    buttonColor: "#3BB77E"
  },
  {
    title: "The best Organic Products Online",
    buttonText: "Shop Now →",
    image: "../image/Cms-3.png",
    bgColor: "#e8f0f8",
    buttonColor: "#FDC040"
  },
]
</script>

<template>
  <div class="category-list">
    <CategoryComponent :categories="categories" :banners="banners" />
  </div>
</template>

<style scoped>
.category-list {
  max-width: 1200px;
  margin: auto;
  padding: 40px 20px;
}
</style>
