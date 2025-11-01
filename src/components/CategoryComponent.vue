<script lang="ts" setup>
interface Category {
  name: string
  items: number
  image: string
  bgColor: string
}

interface Banner {
  title: string
  buttonText: string
  image: string
  bgColor: string
  buttonColor: string
}

// Props from parent (App.vue)
const props = defineProps<{
  categories: Category[]
  banners: Banner[]
}>()
</script>

<template>
  <section class="category-section">
    <!-- Category Cards -->
    <div class="categories">
      <div
        v-for="(cat, index) in props.categories"
        :key="index"
        class="category-card"
        :style="{ backgroundColor: cat.bgColor }"
      >
        <img :src="cat.image" :alt="cat.name" />
        <h4>{{ cat.name }}</h4>
        <p>{{ cat.items }} items</p>
      </div>
    </div>

    <!-- Banners -->
    <div class="banners">
      <div
        v-for="(banner, index) in props.banners"
        :key="index"
        class="banner"
        :style="{ backgroundColor: banner.bgColor }"
      >
        <div class="banner-content">
          <h3>{{ banner.title }}</h3>
          <!-- Dynamic button color -->
          <button :style="{ backgroundColor: banner.buttonColor }">
            {{ banner.buttonText }}
          </button>
        </div>
        <img :src="banner.image" :alt="banner.title" />
      </div>
    </div>
  </section>
</template>

<style scoped>
.category-section {
 
}

/* Category cards */
.categories {
  display: flex;
  gap: 20px;
  justify-content: center;
  margin-bottom: 50px;
}

.category-card {
  width: 120px;
  text-align: center;
  padding: 15px;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  transition: 0.3s;
}

.category-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

.category-card img {
  width: 70px;
  height: 70px;
  object-fit: contain;
  margin-bottom: 10px;
}

.category-card h4 {
  font-size: 14px;
  margin: 5px 0;
  color: #222;
}

.category-card p {
  font-size: 12px;
  color: #888;
}

/* Banners */
.banners {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
}

.banner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-radius: 15px;
  padding: 30px;
  min-height: 160px;
  overflow: hidden;
}

.banner-content h3 {
  color: #1c1c1c;
  font-size: 18px;
  margin-bottom: 10px;
}

.banner-content button {
  border: none;
  color: #fff;
  padding: 8px 16px;
  border-radius: 25px;
  cursor: pointer;
  font-size: 13px;
  transition: 0.3s;
}

.banner-content button:hover {
  filter: brightness(0.9);
}

.banner img {
  width: 120px;
  height: auto;
  object-fit: contain;
}

/* Responsive */
@media (max-width: 768px) {
  .categories {
    overflow-x: auto;
    flex-wrap: nowrap;
    justify-content: flex-start;
  }
  .category-card {
    flex: 0 0 auto;
  }
  .banners {
    grid-template-columns: 1fr;
  }
}
</style>
