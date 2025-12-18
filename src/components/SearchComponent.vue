<script>
import dropdown from './DropdownMenu.vue'
export default{
    nam: 'search',
    components:{
        dropdown
    },
    data(){
        return {
            list:[
                {title:'me',link:'#'},
                {title:'me1',link:'#'},
                {title:'me2',link:'#'},
                {title:'me3',link:'#'},
            ],
        }
    }
}
</script>

<template>
                <!-- search -->
            <div class="border-2 border-[#BCE3C9] rounded-lg w-[700px] h-[50px] flex flex-cols items-center p-[20px]">
                <div class="flex items-center gap-5">
                    <dropdown title="All Categories" :items ="list" />
                </div>
                    
                <div class="flex items-center  rounded-lg px-3 py-2 w-full max-w-md">
                    <img src="/Line1.png" alt="line icon" class="mr-2">
                    <input 
                        type="text" 
                        placeholder="Search for items" 
                        class="flex-1 outline-none text-gray-600"
                    >
                    <img src="/search.png" alt="search icon" class="ml-[300px]">
                </div>


            </div>
</template>