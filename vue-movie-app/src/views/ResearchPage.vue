<template>
  <div
    class="mt-16 flex flex-col items-center justify-center w-[100vw] overflow-x-hidden"
  >
    <!-- Card List Section -->
    <section
      class="bg-gray-100 dark:bg-gray-900 py-10 px-4 w-[90%] overflow-x-hidden"
    >
      <div class="flex justify-end">
        <button
          @click="state.isModalOpen = true"
          class="button bg-blue-500 h-10 w-40 text-white rounded flex justify-center items-center"
        >
          Research Docs <Eye class="ml-2" />
        </button>
      </div>

      <!-- Card Grid -->
      <div
        class="grid grid-flow-row gap-8 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
      >
        <!-- Card Item -->
        <div
          class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1"
          v-for="(post, index) in posts"
          :key="index"
        >
          <!-- Clickable Area -->
          <a :href="'/research/' + index" class="cursor-pointer">
            <figure>
              <img
                :src="post.image + '?auto=format&fit=crop&w=400&q=50'"
                class="rounded-t h-72 w-full object-cover"
              />

              <figcaption class="p-4">
                Title
                <p
                  class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300"
                  x-text="post.title"
                >
                  The Product Name
                </p>

                Description
                <small
                  class="leading-5 text-gray-500 dark:text-gray-400"
                  x-text="post.description"
                >
                  Post Description
                </small>
              </figcaption>
            </figure>
          </a>
          <div class="px-4 mb-2">
            <p>Target Market: N/A</p>
            <p>Avatar: N/A</p>
            <p>Current State: N/A</p>
            <p>Dream State: N/A</p>
            <p>Road Blocks: N/A</p>
            <p>Solution: N/A</p>
            <p>Product: N/A</p>
            <p>Updated At: N/A</p>
            <p>Created At: N/A</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal toggle -->

    <!-- Main modal -->
    <div
      v-if="state.isModalOpen"
      id="default-modal"
      class="overflow-y-auto overflow-x-hidden fixed flex z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
      <div
        class="bg-gray-800 opacity-75 backdrop-blur-2xl h-full w-full pb-5 mt-4 fixed"
      ></div>
      <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
          >
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              The Product Name
            </h3>
            <button
              @click="state.isModalOpen = false"
              type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-hide="default-modal"
            >
              <svg
                class="w-3 h-3"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 14"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5 space-y-0">
            <div
              @click="toggleResearchTab(item)"
              id="accordion-collapse"
              data-accordion="collapse"
              v-for="item in researchTypes"
            >
              <h2 id="accordion-collapse-heading-1">
                <button
                  @click=""
                  type="button"
                  class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                  data-accordion-target="#accordion-collapse-body-1"
                  aria-expanded="true"
                  aria-controls="accordion-collapse-body-1"
                >
                  <span>{{ item.title }}</span>
                  <svg
                    data-accordion-icon
                    class="w-3 h-3 rotate-180 shrink-0"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                  >
                    <path
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 5 5 1 1 5"
                    />
                  </svg>
                </button>
              </h2>
              <div
                v-if="state.viewResearchTab === item.title"
                id="accordion-collapse-body-1"
                aria-labelledby="accordion-collapse-heading-1  border border-b-0"
              >
                <div
                  class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900"
                >
                  <ul class="list-decimal">
                    <li
                      v-for="(section, id) in getSections(item.description)"
                      v-if="id !== 0"
                    >
                      {{ section }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="css">
.favorite-bg {
  background: rgb(0, 0, 0, 0.6);
}
.favorite-bg:hover {
  background: rgb(0, 0, 0, 0.4);
}
.favorite-bg:active {
  background: #c63022ae;
}
</style>

<script>
import { defineComponent, reactive, onMounted, ref, inject } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import { Heart, Eye } from "lucide-vue-next";

export default defineComponent({
  components: {
    Heart,
    Eye,
  },
  props: {
    setNotification: Function,
  },
  setup() {
    const state = reactive({
      movieSearch: "",
      movies: [],
      loading: false,
      error: null,
      movie_genre_id: null,
      isGenreChange: false,
      genre_name: "",
      isModalOpen: false,
      viewResearchTab: "",
    });

    // const setNotification = inject("setNotification");

    function setFavorite(item) {
      console.log(item, "setFavorite");
      props.setNotification("Favorite Added");

      // send database response to backend
      // create a page for all favorite movies
    }

    function setMovieGenre({ item: item }) {
      console.log(item, "item");
      state.movie_genre_id = item.id;
      state.isGenreChange = true;
      state.genre_name = item.name;
      setTimeout(() => {
        state.isGenreChange = false;
      }, 3000);
    }

    const thisResponseWorksOnGoogle =
      "https://api.themoviedb.org/3/movie/550?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5";

    const movie_list = ref([]);

    onMounted(() => {
      // axios.get(get_genres).then((response) => {
      //   posts.value = response.data;
      // });
      axios.get(get_movie_list_discover).then((response) => {
        movie_list.value = response.data;
      });
      setTimeout(() => {
        console.log(movie_list, "movie_list");
        // console.log(get_movie_list_discover, "get_movie_list_discover");
      }, 5000);
    });

    const get_movie_list_discover =
      "https://api.themoviedb.org/3/discover/movie?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate";

    const get_movie_list =
      "https://api.themoviedb.org/3/movie/550?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5";

    const get_discover_movies =
      "https://api.themoviedb.org/3/discover/movie?api_key=<<api_key>>&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate";

    const storedItems = ref([
      {
        title: "The Title",
        setting: "In the Park",
        avg_time: 3,
        hook: "Hello there",
        transitions: 5,
        lighting: "Bright",
        music: "Uplifting",
      },
    ]);

    const checklistInputs = ref([
      {
        name: "Title",
        input: ref(""),
      },
      {
        name: "Setting",
        input: ref(""),
      },
      {
        name: "Average Time",
        input: ref(0),
      },
      {
        name: "Hook",
        input: ref(""),
      },
      {
        name: "Transitions",
        input: ref(0),
      },
      {
        name: "Lighting",
        input: ref(""),
      },
      {
        name: "Music",
        input: ref(""),
      },
    ]);

    function createChecklist() {
      console.log(checklistInputs, "checklistInputs");
      storedItems.value.push({
        title: checklistInputs.value[0].input,
        setting: checklistInputs.value[1].input,
        avg_time: checklistInputs.value[2].input,
        hook: checklistInputs.value[3].input,
        transitions: checklistInputs.value[4].input,
        lighting: checklistInputs.value[5].input,
        music: checklistInputs.value[6].input,
      });
    }

    const posts = [
      {
        image: "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085",
        title: "5 Easy Tips That Will Make Your Latte Art Flourish",
        description:
          "Latte art is quite often the most attractive thing for a new barista, and latte art is an excellent gateway to the exciting world of coffee. Latte art easy to start with, but to master latte art patterns, you need a lot practice and determination. Here are my tips that helped me to improve my latte art a few years ago!",
      },
      {
        image: "https://images.unsplash.com/photo-1512034400317-de97d7d6c3ed",
        title: "Coffee Roasting Basics: Developing Flavour by Roasting",
        description:
          "Caffé latte and flat white are definitely the most ordered espresso based drinks in cafés around the world but what are they really? Have you ever wondered the difference between caffé latte vs. flat white? Let's see what makes caffé latte and flat white different from each other!",
      },
      {
        image: "https://images.unsplash.com/photo-1445077100181-a33e9ac94db0",
        title: "Latte vs. Flat White - What is the Difference?",
        description:
          "I bet roasting is the thing that every barista wants to know about! We can develop flavour by roasting coffee. How can we achieve the best tasting coffee? What actually happens when roasting?",
      },
      {
        image: "https://images.unsplash.com/photo-1459257868276-5e65389e2722",
        title: "Creating the Perfect Espresso Recipe",
        description:
          "Espresso recipes are important in cafés in terms of consistency and flavour. How and why are the espresso recipes made and what are the things you should consider when making a recipe for espresso? Let’s dig deeper into the world of espresso!",
      },
    ];

    const researchTypes = [
      {
        title: "Target Market",
        description:
          "What kind of person is going to get the most out of this product? - Who are the best current customers, with the highest LTV? - What attributes do they have in common?",
      },
      {
        title: "Avatar",
        description:
          "Name, age and face. This makes it much easier for you to imagine them as a real, individual person.  - Background and mini life history. You need to understand the general context of their life and previous experience. - Day-in-the-life. If you can get a rough idea of what the average day in their life looks like you will be able to relate more easily to them. - Values. What do they believe is most important? What do they despise? - Outside forces. What outside forces or people does the Avatar feel influences their life?",
      },
      {
        title: "Current State",
        description:
          "What is painful or frustrating in the current life of my avatar? - What annoys them? - What do they fear? - What do they lie awake at night worrying about? - How do other people perceive them? - What lack of status do they feel? - What words do THEY use to describe their pains and frustrations?",
      },
      {
        title: "Dream State",
        description:
          "If they could wave a magic wand at their life and fix everything, what would their life look like? - What enjoyable new experiences would they have? - How would others perceive them in a positive light? - How would they feel about themselves if they made that change?  - What words do THEY use to describe their dream outcome?",
      },
      {
        title: "Road Blocks",
        description:
          "What is keeping them from living their dream state today? - What mistakes are they making that are keeping them from getting what they want in life? - What part of the obstacle does the avatar not understand or know about? - What is the one key roadblock that once fixed will allow them to move forward toward their dream outcome?",
      },
      {
        title: "Solution",
        description:
          "What does the avatar need to do to overcome the key roadblock? - 'If they <insert solution>, then they will be able to <insert dream outcome>'",
      },
      {
        title: "Product",
        description:
          "How does the product help the avatar implement the Solution? - How does the product help the reader increase their chances of success? - How does the product help the reader get the result faster? - How does the product help the reader get the result with less effort or sacrifice? - What makes the product fun? - What does your target market like about related products? - What does your target market hate about related products?",
      },
    ];

    function toggleResearchTab(item) {
      if (item.title !== state.viewResearchTab) {
        state.viewResearchTab = item.title;
      } else {
        state.viewResearchTab = "";
      }
    }

    return {
      state,
      setMovieGenre,
      movie_list,
      setFavorite,
      storedItems,
      checklistInputs,
      createChecklist,
      posts,
      researchTypes,
      toggleResearchTab,
      getSections(longString) {
        return longString.split(" - ");
      },
    };
  },
  mixins: [VueAxios],
});
</script>
