<script>
export default {
  name: 'MenuItem',
  props: {
    title: {
      type: String,
      required: true,
    },
    items: {
      type: Array,
      default: () => [],
    },
    color: {
      type: String,
      default: 'text-[#253D4E]',
    },
  },
  data() {
    return {
      open: false,
      closeTimer: null,
    }
  },
  computed: {
    hasItems() {
      return this.items && this.items.length > 0
    },
  },
  methods: {
    onEnter() {
      if (!this.hasItems) return
      clearTimeout(this.closeTimer)
      this.open = true
    },
    onLeave() {
      if (!this.hasItems) return
      this.closeTimer = setTimeout(() => {
        this.open = false
      }, 300)
    },
  },
}
</script>

<template>
  <div
    class="relative"
    @mouseenter="onEnter"
    @mouseleave="onLeave"
  >
    <!-- TITLE -->
    <div
      class="flex items-center gap-2 font-bold cursor-pointer transition-colors duration-200"
      :class="color"
    >
      {{ title }}

      <!-- Arrow only if items exist -->
      <img
        v-if="hasItems"
        src="/down.png"
        class="w-[11px] h-[6px] transition-transform duration-200 hover:rotate-180"
      />
    </div>

    <!-- DROPDOWN -->
    <div
      v-if="open && hasItems"
      class="absolute top-full mt-2 bg-white border rounded shadow w-40 z-50"
    >
      <div
        v-for="(item, i) in items"
        :key="i"
        class="px-4 py-2 hover:bg-blue-100"
      >
        <a :href="item.link" class="block">
          {{ item.title }}
        </a>
      </div>
    </div>
  </div>
</template>
