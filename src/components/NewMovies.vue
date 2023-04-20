<template>
  <div class="ml-30" style="width: 78vw">
    <div class="ml-10">
      <div class="mt-10">
        <button class="btn bg-blue-500 rounded p-2 text-white">Sort By</button>
        <input type="text" placeholder="Search Movie..." />
        <button>Notification</button>
        <button>Location</button>
      </div>
          <!-- {{ posts }} -->

      <div class="grid grid-cols-4 gap-5" v-for="item in posts">
        <div>
          <!-- <img
            style="border-radius: 15px"
            src="https://m.media-amazon.com/images/M/MV5BYzFhM2M1MDUtNDhmNC00YzEzLThiMzctYWYxZTc0MGJhNWYyXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg"
            alt=""
          /> -->
          <!-- <input type="text" /> -->
          
          {{ item }}
          <p>{{ item && item.backdrop_path }}</p>
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive, onMounted, ref } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";

export default defineComponent({
  setup() {
    const state = reactive({
      movieSearch: "",
      movies: [],
      loading: false,
      error: null,
    });

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

    const posts = ref([]);

    onMounted(() => {
      axios.get(thisResponseWorksOnGoogle).then((response) => {
        posts.value = response.data;
      });
      setTimeout(() => {
      console.log(posts, "posts")
      console.log(posts.backdrop_path, "posts.backdrop_path")
      console.log(posts.value, "posts.value")
      }, 5000)
    });

    const get_discover_movies =
      "https://api.themoviedb.org/3/discover/movie?api_key=<<api_key>>&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate";

    return { state, posts };
  },
  mixins: [VueAxios],
});
</script>
