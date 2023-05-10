<template>
  <div
    class="overflow-y-hidden fixed right-0 top-0 z-10"
    style="background: #0e0f14; width: 20rem"
    :style="state.showSearchModal ? 'height: 100vh' : 'height: 8.25rem'"
  >
    <div class="flex items-center mt-5">
      <img
        src="https://deadline.com/wp-content/uploads/2020/09/Gugu-Mbatha-Raw-e1610021013129.jpg"
        alt="girl"
        class="w-14 h-14 rounded-full object-cover mt-[-.5rem]"
      />
      <div class="ml-4 mb-2">
        <p class="text-white text-lg mt-2">Sara</p>
        <p class="text-gray-500 text-md mt-0">saraliger@gmail.com</p>
      </div>
    </div>

    <div class="relative flex items-center">
      <input
        @click="toggleSearchModal"
        class="p-2 h-10 mx-5 w-full relative z-1"
        style="border-radius: 4px 4px 4px 4px"
        type="text"
        placeholder="Search Movie..."
      />
      <Search class="absolute right-12 h-5 w-5 text-gray-700 z-10" />
    </div>

    <!-- Search Modal - START -->
    <div class="">
      <div class="h-90 text-white">
        <hr class="mx-5 border-gray-700 mt-0" />
        <p class="text-center text-gray-300 mt-3">Movie 1</p>
        <hr class="mx-5 border-gray-700 mt-3" />
        <p class="text-center text-gray-300 mt-3">Movie 2</p>
        <hr class="mx-5 border-gray-700 mt-3" />
        <p class="text-center text-gray-300 mt-3">Movie 2</p>
        <!-- <hr class="mx-5 border-gray-700 mt-3" /> -->
        <div class="mt-5">
          <p class="ml-3">Genres</p>
          <div
            v-if="posts"
            class="grid grid-cols-2 bg-red items-center justify-center flex mt-2 ml-0 pt-2"
          >
            <div class="text-slate-500 mx-auto" v-for="(item, id) in posts.genres">
              <div>
                <button
                  :class="id === 3 || id === 6 ? 'bg-blue-900 text-gray-300' : ''"
                  class="bg-gray-900 hover:bg-blue-950 w-32 active:bg-blue-900 py-2 my-2 rounded-xl relative flex justify-start items-center"
                  @click="setMovieGenre({ item: item })"
                >
                  <p class="ml-2 text-sm">{{ item.name }}</p>
                  <Plus v-if="id !== 3 && id !== 6" class="absolute right-2 w-4 h-4" />
                  <Check v-if="id === 3 || id === 6" class="absolute right-2 w-4 h-4" />
                  <!-- <Check v-else class="absolute right-5 w-4 h-4" /> -->
                  <!-- {{ item.id }} -->
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive, ref, onMounted } from "vue";
import { Search, Plus, Check } from "lucide-vue-next";
import axios from "axios";
import VueAxios from "vue-axios";

export default defineComponent({
  components: {
    Search,
    Plus,
    Check,
  },
  setup() {
    const state = reactive({
      showSearchModal: false,
    });

    function toggleSearchModal() {
      console.log("toggleSearchModal");
      state.showSearchModal = !state.showSearchModal;
    }

    const posts = ref([]);

    const get_genres =
      "https://api.themoviedb.org/3/genre/movie/list?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5&language=en-US            ";

    onMounted(() => {
      axios.get(get_genres).then((response) => {
        posts.value = response.data;
      });
    });

    return {
      state,
      toggleSearchModal,
      posts,
    };
  },
  mixins: [VueAxios],
});
</script>
