<script>
import dropdown from './MenuItem.vue'
import search from './SearchComponent.vue'
export default{
    name:Headers,
    components: {
        dropdown,
        search
    },
    data(){
        return {
            list:[
                {title:'me',link:'#'},
                {title:'me1',link:'#'},
                {title:'me2',link:'#'},
                {title:'me3',link:'#'},
            ],
            cate:[
                {title:'me',link:'#'},
                {title:'me1',link:'#'},
                {title:'me2',link:'#'},
                {title:'me3cc',link:'#'},
            ],
            food:[
                {title:'me',link:'#'},
                {title:'me1',link:'#'},
                {title:'me2',link:'#'},
                {title:'me3cc',link:'#'},
        ]
        }
    }
}
</script>

<template>
    <div class="">
        <!-- section1 -->
        <div class="flex justify-between mt-[15px] mb-[15px]">
            <!-- logo -->
            <div>
                <img src="/Logo.png" alt="">
            </div>

            <!-- search -->
            <search/>
            <!-- profile -->
            <div class="flex flex-cols gap-10 items-center">
                <img src="/account.png" alt="" class="w-[87px] h-[27px]">
                <img src="/compare.png" alt=""  class="w-[87px] h-[27px]">
                <img src="/wishlist.png" alt="" class="w-[87px] h-[27px]">
                <img src="/cart.png" alt=""  class="w-[87px] h-[27px]">
            </div>
        </div>

        <!-- section2 -->
         <hr>
        <div class="flex flex-cols  items-center ">
             
            <div class="bg-[#3BB77E] w-[250px] h-[45px] rounded-lg flex flex-cols items-center justify-center gap-5 mt-3 mb-3">
            <img src="/01 align center.png" alt="">
            <dropdown title="Browse All Categories " :items ="cate" color = "text-white"/>
            </div>
            <router-link to="/"><span class="flex flex-cols gap-2 pr-[50px] pl-[50px]">
                    <img src="/02 align center.png" alt="">
                        Hot Deals
                </span></router-link>
                
                <div>
                    <ul class="flex flex-cols gap-10">
                        <dropdown title="Home"/>
                        <dropdown title="Food" :items="food" />
                        <dropdown title="Vegetables" :items="food"/>
                        <dropdown title="Drink"/>
                        <dropdown title="Cookies"/>
                        <dropdown title="Meat & Seafood" :items="food"/>
                        <dropdown title="Bakery"/>
                        
                    </ul>
                </div>

            <div class="flex flex-cols gap-5 pl-[386px]">
                <span class="flex items-center justify-center"><img src="/03align center.png" alt="" ></span>
                <div class="flex flex-col">
                    <span class="text-[#3BB77E] text-[20px]">099 777 888</span>
                    <span class="text-[#7E7E7E] text-[12px]">24/7 Support Center</span>
                </div>
            </div>
        </div>
        
        <hr>
    </div>
</template>

<style>
.ol{
    color: red;
}
</style>