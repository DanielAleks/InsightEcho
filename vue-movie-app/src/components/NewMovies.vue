<template>
  <div style="margin-left: 10rem; width: 78vw; margin-top: 7rem">
    <div class="ml-10">
      <!-- movie_list -->
      <!-- {{ movie_list && movie_list }} -->
      <div v-if="movie_list" class="grid grid-cols-4 gap-5">
        <div v-for="item in movie_list.results" class="text-slate-500 rounded relative">
          <!-- <div
            v-for="item in movie_list"
            :key="item.id"
            class="bg-gray-900 hover:bg-blue-950 active:bg-blue-900 p-5 m-2 rounded"
          >
            {{ item.adult }}
          </div> -->
          <!-- <div
            v-for="item in movie_list"
            :key="item.id"
            class="bg-gray-900 hover:bg-blue-950 active:bg-blue-900 p-5 m-2 rounded"
          > -->
          <!-- <img :src="'http://image.tmdb.org/t/p/w500/' + item.backdrop_path" /> -->
          <img :src="'http://image.tmdb.org/t/p/w500/' + item.poster_path" />
          <div
            @click="setFavorite(item)"
            class="absolute bottom-3 w-16 h-16 rounded-full right-3 flex justify-center items-center text-xl cursor-pointer favorite-bg"
          >
            <Heart class="w-8 h-8 text-white"/>
          </div>
          <!-- <p>{{ item.adult }}</p> -->
          <!-- <p>{{ item.genres }} </p>
          <p>{{ item.overview }} </p> -->
          <!-- <p>{{ item.popularity }}</p>
          <p>{{ item.release_date }}</p>
          <p>{{ item.title }}</p>
          <p>{{ item.video }}</p>
          <p>{{ item.vote_average }}</p>
          <p>{{ item.vote_count }}</p> -->
          <!-- </div> -->
        </div>
      </div>

      <div
        v-if="state.isGenreChange"
        class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 fixed bottom-0 justify-center ml-80 mb-10 mr-10 w-1/4 h-10 rounded"
        role="alert"
      >
        <svg
          class="fill-current w-4 h-4 mr-2"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
        >
          <path
            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
          />
        </svg>
        <p>Genre Updated: {{ state.genre_name }}</p>
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
  background: #c63022ae
}
</style>

<script>
import { defineComponent, reactive, onMounted, ref, inject } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import { Heart } from "lucide-vue-next"

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

    return { state, setMovieGenre, movie_list, setFavorite };
  },
  mixins: [VueAxios],
});
</script>
