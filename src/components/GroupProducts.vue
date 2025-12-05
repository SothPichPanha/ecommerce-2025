<script>
import cat from "@/assets/image/cat-4.png";
  export default {
    name: "GroupProducts",
    props:{
      product: Array
    },
    data() {
    return {
      cat,
      p
    };
    
  },


  };
  

</script>
<template>
  <div class="grid xl:grid-cols-4 gap-4 p-4">
    <div class="bg-white  rounded-lg shadow-md w-[320px] h-[450px] flex flex-col gap-4 border-1 border-[#BCE3C9] transition-all duration-300  hover:border-black"
      v-for = "(pro,index) in product"
      :key="inde"
    >
      <div class="bg-[#3BB77E] w-[60px] h-[35px] mt-6 rounded-r-full  flex justify-center items-center">
          <h3 class="text-white" >-17%</h3>
      </div>
      <!-- image -->
      <div class="w-[250px] h-[150px] object-cover bg-white-500   mx-auto   ">
        <img 
          :src="`http://localhost:3000/${pro.image}`" 
          :alt= "cat.name" 
          class="w-full h-full object-cover">        
      </div>

      <!-- content -->
      <div class="ml-8 mr-8">  
          <!-- type --> 
          <div class="text-[#7E7E7E]">
            <h4>Hodo Foods</h4>
          </div>
            <!-- title -->
          <div class="text-black font-[Quicksand]"> 
            <h2 ></h2>
          </div>
          <!-- star -->
           <div class="flex flex-row gap-5">
              <div>
                  <h4>star</h4>
              </div>
              <div>
                <h4>rating</h4>
              </div>
           </div>
           <!-- kg -->
            <div class="text-[#7E7E7E]">
              <h7>1kg</h7>
            </div>
            <!-- price -->
             <div class="flex flex-row mt-10 mb-3">
                <div class="text-[20px] text-fit flex items-end text-[#3BB77E] font-[Quicksand]">
                  <h1>$2.51</h1>
                </div>
                <div class="text-[13px] flex  items-end  ml-3  line-through text-[#7E7E7E]">
                  <h1>$2.80</h1>
                </div>
              <div class="ml-auto ">
                <div class="counter-container gap-3 flex items-center justify-center bg-[#DEF9EC]  rounded-lg h-[30px] w-[80px]">
                     <h1 class="text-[#3BB77E]">add</h1>   
                     <img :src="p" alt="" class="w-[10px]">            
                </div>
              </div>
             </div>
             
            
      </div>
  </div>
  </div>
  

</template>

<style scoped>
.counter-container button {
  cursor: pointer;
  transition: background-color 0.2s;
}

.counter-container button:active {
  background-color: #e0e0e0;
}
</style>