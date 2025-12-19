<script>
export default {
  name: 'NewsletterBanner',
  data() {
    return {
      email: ''
    };
  },
  methods: {
    handleSubscribe() {
      if (this.email) {
        console.log('Subscribing email:', this.email);
        alert('Thank you for subscribing!');
        this.email = '';
      }
    }
  }
}
</script>

<template>
  <div class="w-full rounded-lg overflow-hidden m-5">
    <div class="relative w-full h-[540px] 
  bg-[url('/bg.png'),linear-gradient(#FFF3E0,#FFF3E0)] 
  bg-no-repeat bg-cover rounded-lg flex items-center">
      <!-- Left Content Section -->
      <div class="w-1/2 pl-20 pr-10 z-10">
        <h1 class="text-6xl font-bold text-[#2C3E50] mb-6 leading-tight">
          Don't miss amazing<br>grocery deals
        </h1>
        
        <p class="text-xl text-gray-500 mb-8">
          Sign up for the daily newsletter
        </p>
        
        <!-- Email Input Form -->
        <div class="flex items-center gap-2 max-w-md">
          <div class="relative flex-1">
            <svg 
              class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
              fill="none" 
              stroke="currentColor" 
              viewBox="0 0 24 24"
            >
              <path 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2" 
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
              />
            </svg>
            <input 
              v-model="email"
              type="email" 
              placeholder="Your email address"
              class="w-full pl-12 pr-4 py-4 rounded-full bg-white border-0 focus:outline-none focus:ring-2 focus:ring-green-400 text-gray-700"
              @keyup.enter="handleSubscribe"
            />
          </div>
          
          <button 
            @click="handleSubscribe"
            class="px-8 py-4 bg-[#3BB77E] text-white font-semibold rounded-full hover:bg-[#2fa968] transition-colors"
          >
            Subscribe
          </button>
        </div>
      </div>
      
      <!-- Right Image Section -->
      <div class="absolute right-0 top-0 w-1/2 h-full flex items-center justify-end pr-20">
        <img 
          src="/fru.png" 
          alt="Fresh fruits and vegetables" 
          class="h-full object-contain"
        />
      </div>
      
      <!-- Decorative Background Pattern (Optional) -->
      <div class="absolute inset-0 opacity-5 pointer-events-none">
        <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
              <circle cx="20" cy="20" r="1" fill="currentColor"/>
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#grid)"/>
        </svg>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Additional custom styles if needed */
</style>