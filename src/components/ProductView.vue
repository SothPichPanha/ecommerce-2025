<script>
import axios from 'axios';

export default {
  name: "ProductView",
  data() {
    return {
      product: null,
      loading: true,
      error: null,
      quantity: 1,
      selectedImage: null,
      activeTab: 'description'
    };
  },
  computed: {
    finalPrice() {
      if (!this.product) return 0;
      if (typeof this.product.promotionAsPercentage === "number" && this.product.promotionAsPercentage > 0) {
        return (this.product.price - (this.product.price * this.product.promotionAsPercentage) / 100).toFixed(2);
      }
      return this.product.price.toFixed(2);
    },
    productImages() {
      if (!this.product || !this.product.image) return [];
      try {
        const arr = JSON.parse(this.product.image);
        return Array.isArray(arr) ? arr : [this.product.image];
      } catch (e) {
        return [this.product.image];
      }
    },
    stars() {
      if (!this.product) return "";
      const rating = this.product.rating || 0;
      const fullStars = Math.floor(rating);
      const emptyStars = 5 - fullStars;
      return "⭐".repeat(fullStars) + "☆".repeat(emptyStars);
    }
  },
  methods: {
    async fetchProduct() {
      try {
        const productId = this.$route.params.id;
        if (productId) {
          // Fetch all products and find the one with matching ID
          const res = await axios.get(`http://localhost:3000/api/products`);
          const products = res.data;
          
          // Find product by ID (convert both to string for comparison)
          this.product = products.find(p => String(p.id) === String(productId));
          
          if (!this.product) {
            this.error = "Product not found";
          } else {
            this.selectedImage = this.productImages[0];
          }
        }
      } catch (err) {
        console.error("Error loading product:", err);
        this.error = "Failed to load product details";
      } finally {
        this.loading = false;
      }
    },
    goBack() {
      this.$router.push('/');
    },
    selectImage(image) {
      this.selectedImage = image;
    },
    decreaseQuantity() {
      if (this.quantity > 1) {
        this.quantity--;
      }
    },
    increaseQuantity() {
      this.quantity++;
    },
    addToCart() {
      alert(`Added ${this.quantity} x ${this.product.name} to cart`);
    },
    addToWishlist() {
      alert(`Added ${this.product.name} to wishlist`);
    },
    compareProduct() {
      alert(`Added ${this.product.name} to compare list`);
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    }
  },
  mounted() {
    this.fetchProduct();
  }
}
</script>

<template>
    <!-- Product Content -->
              <div 
                v-for="(image, index) in productImages.slice(0, 4)" 
                :key="index"
                @click="selectImage(image)"
                :class="[
                  'w-[250px] h-[250px] border-2 rounded-lg p-2 cursor-pointer transition ',
                  selectedImage === image ? 'border-[#3BB77E]' : 'border-gray-200 hover:border-[#3BB77E]' 
                ]"
              >
                <img 
                  :src="`http://localhost:3000/${image}`"
                  :alt="`${product.name} ${index + 1}`"
                  class="w-full h-full object-contain flex justify-center items-center"
                >
              </div>
</template>

<style scoped>
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield;
}
</style>