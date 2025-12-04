<script lang="ts">
import { list as ListItem , content as ContentItem } from "../views/type";
export default {
  name: "MenuComponent",
  data() {
    return {
        content: [
            {id: 0, name: "Home"},
            {id: 1, name: "Shop"},   
        ] as ContentItem[],
        lists: [
            { id: 0, name: "All Categories" },
            { id: 1, name: "Milks & Dairies" },
            { id: 2, name: "Coffees & Teas" },
            { id: 3, name: "Pet Foods" },
            { id: 4, name: "Meats" },
        ] as ListItem[],
    };
  },
};
</script>

<template>
  <div class="w-full">
    <h1>{{ content[0]?.name }}</h1>
  </div>

  <div class="w-full">
    <ul class="flex justify-end gap-5 m-0 p-0 list-none hover:cursor-pointer">
      <li
        v-for="item in lists"
        :key="item.id"
        class="hover:text-blue-500"
      >
        {{ item.name }}
      </li>
    </ul>
  </div>
</template>

<style>
ul li {
  font-size: 18px;
}
</style>
