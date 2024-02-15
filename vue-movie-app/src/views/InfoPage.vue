<template>
  <div class="flex flex-col items-center justify-center w-full bg-red">
    <div class="grid grid-cols-2 mt-[-5rem]">
      <div
        class="bg-white w-80 p-5 my-5 rounded-lg flex flex-col shadow-lg ml-20"
      >
        <p class="text-lg font-bold">Info Page</p>
        <hr class="mb-5" />
        <div class="grid grid-cols-2 gap-4">
          <div v-for="item in checklistInputs">
            <label
              for="first_name"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >{{ item.name }}</label
            >
            <input
              v-model="item.input"
              type="text"
              id="first_name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="John"
              required
            />
          </div>
        </div>

        <div class="grid grid-cols-2 gap-5 mt-3">
          <button
            disabled
            class="btn bg-indigo-400 text-white rounded mt-3 px-5 py-2 cursor-not-allowed"
          >
            Add item
          </button>
          <button
            @click="createChecklist"
            class="btn bg-gray-700 text-white rounded mt-3 px-5 py-2"
          >
            Submit
          </button>
        </div>
      </div>

      <div class="grid grid-cols-1 w-[60vw] h-56 mt-5 ml-32">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th scope="col" class="px-6 py-3">Product name</th>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Color
                    <a href="#"
                      ><svg
                        class="w-3 h-3 ms-1.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                        /></svg
                    ></a>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Category
                    <a href="#"
                      ><svg
                        class="w-3 h-3 ms-1.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                        /></svg
                    ></a>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Price
                    <a href="#"
                      ><svg
                        class="w-3 h-3 ms-1.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                        /></svg
                    ></a>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">Silver</td>
                <td class="px-6 py-4">Laptop</td>
                <td class="px-6 py-4">$2999</td>
                <td class="px-6 py-4 text-right">
                  <a
                    href="#"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    >Edit</a
                  >
                </td>
              </tr>
              <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
              >
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">White</td>
                <td class="px-6 py-4">Laptop PC</td>
                <td class="px-6 py-4">$1999</td>
                <td class="px-6 py-4 text-right">
                  <a
                    href="#"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    >Edit</a
                  >
                </td>
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                <th
                  scope="row"
                  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                >
                  Magic Mouse 2
                </th>
                <td class="px-6 py-4">Black</td>
                <td class="px-6 py-4">Accessories</td>
                <td class="px-6 py-4">$99</td>
                <td class="px-6 py-4 text-right">
                  <a
                    href="#"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                    >Edit</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
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
import { Heart } from "lucide-vue-next";

export default defineComponent({
  components: {
    Heart,
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

    // const customTool

    const thisResponseWorksOnGoogle =
      "https://api.themoviedb.org/3/movie/550?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5";

    // const api_key = "ef9dda51b2c7b29d237fab7aa1cf81e5";
    // const apiReadAccessToken =
    //   "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjlkZGE1MWIyYzdiMjlkMjM3ZmFiN2FhMWNmODFlNSIsInN1YiI6IjY0Mzc3YTIxMzdiM2E5MDBiNWU2M2U2YyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ickn8ZQYO56bQbH1mXc3ZrbsY1xQ0n-5sqYanRTJVP0";
    // const getMovies = async () => { sdfsd
    //   try {
    //     state.loading = true;
    //     const response = await axios.get(thisResponseWorksOnGoogle);
    //     state.movies = response.state;
    //   } catch (error) {
    //     state.error = error.message;
    //   } finally {
    //     state.loading = false;
    //   }
    // };
    // onMounted(() => {
    //   getMovies();
    // });

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
        name: "Suppliers",
        input: ref(""),
      },
      {
        name: "Selling Price",
        input: ref(0),
      },
      {
        name: "Costs",
        input: ref(0),
      },
      {
        name: "Links",
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

    return {
      state,
      setMovieGenre,
      movie_list,
      setFavorite,
      storedItems,
      checklistInputs,
      createChecklist,
    };
  },
  mixins: [VueAxios],
});
</script>
