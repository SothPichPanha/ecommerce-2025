import { useProductStore } from "@/stores/product";
import { mapState } from "pinia";

export default {
  data() {
    return {
      currentGroupName: "Group A"
    };
  },

  computed: {
    // Direct getters (not depending on parameters)
    ...mapState(useProductStore, {
      popularProducts: "getPopularProducts"
    }),

    // Getter that depends on "currentGroupName"
    categories() {
      const store = useProductStore();
      return store.getCategoriesByGroup(this.currentGroupName);
    },

    // Getter that depends on "currentGroupName"
    productsByGroup() {
      const store = useProductStore();
      return store.getProductsByGroup(this.currentGroupName);
    }
  }
};
