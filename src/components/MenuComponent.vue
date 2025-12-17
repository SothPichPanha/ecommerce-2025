<script lang="ts">
import type { list as ListItem} from "../views/type";

export default {
  name: "MenuComponent",
  props: {
    title: {
      type: String,
      required: true,
      default: ''
    }
  },
  data() {
    return {
      lists: [
        { id: 0, name: "All" },
        { id: 1, name: "Milks & Dairies" },
        { id: 2, name: "Coffees & Teas" },
        { id: 3, name: "Pet Foods" },
        { id: 4, name: "Meats" },
        { id: 5, name: "Vegetables" },
        { id: 6, name: "Fruits" },
      ] as ListItem[],
      activeId:0,
    };
  },
  methods: {
    selectItem(id: number) {
      this.activeId = id;
      this.$emit('item-selected', id);
    }
  }
};
</script>

<template>
  <div class="w-full flex items-center justify-between py-4">
    <div>
      <h1 class="text-2xl font-semibold text-gray-800 m-0">{{ title }}</h1>
    </div>
    <nav>
      <ul class="flex items-center gap-6 m-0 p-0 list-none">
        <li
          v-for="item in lists"
          :key="item.id"
          :class="[
            'cursor-pointer transition-colors duration-200 text-base font-medium',
            activeId === item.id ? 'text-green-500' : 'text-gray-600 hover:text-green-500'
          ]"
          @click="selectItem(item.id)"
          >
          {{ item.name }}
        </li>
      </ul>
    </nav>
  </div>
</template>

<style scoped>
ul li {
  font-size: 15px;
}


</style>