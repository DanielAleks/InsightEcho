<template>
    <div class="flex flex-col items-center mt-40">
        <h2 class="text-2xl mb-5 font-medium">Make Unique DIY Projects In Less Than <span class="text-orange-400">5 Minutes</span></h2>
        <div class=" p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex">

                <div class="w-1/2" >
            <img  src="https://thumbor.bigedition.com/a-proboscis-monkey-in-a-lush-exotic-forest/y_ORD8Ms2TpaHKZ_tEfPMFXi7Qo=/30x0:1145x836/800x0/filters:quality(80)/granite-web-prod/06/e4/06e41ba2dea9480f9f3543caa8223e31.jpeg"/>
    <div class="grid grid-cols-4 gap-3 mt-3">
        <img src="https://thumbor.bigedition.com/a-proboscis-monkey-in-a-lush-exotic-forest/y_ORD8Ms2TpaHKZ_tEfPMFXi7Qo=/30x0:1145x836/800x0/filters:quality(80)/granite-web-prod/06/e4/06e41ba2dea9480f9f3543caa8223e31.jpeg"/>
        <img src="https://thumbor.bigedition.com/a-proboscis-monkey-in-a-lush-exotic-forest/y_ORD8Ms2TpaHKZ_tEfPMFXi7Qo=/30x0:1145x836/800x0/filters:quality(80)/granite-web-prod/06/e4/06e41ba2dea9480f9f3543caa8223e31.jpeg"/>
        <img src="https://thumbor.bigedition.com/a-proboscis-monkey-in-a-lush-exotic-forest/y_ORD8Ms2TpaHKZ_tEfPMFXi7Qo=/30x0:1145x836/800x0/filters:quality(80)/granite-web-prod/06/e4/06e41ba2dea9480f9f3543caa8223e31.jpeg"/>
        <img src="https://thumbor.bigedition.com/a-proboscis-monkey-in-a-lush-exotic-forest/y_ORD8Ms2TpaHKZ_tEfPMFXi7Qo=/30x0:1145x836/800x0/filters:quality(80)/granite-web-prod/06/e4/06e41ba2dea9480f9f3543caa8223e31.jpeg"/>
    </div>
</div>


            <div class="mx-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Customizer Engraving Pen Made For DIYers</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Info</p>
    <button class="btn bg-blue-400 py-3 px-7 rounded text-lg text-white w-full">Add To Cart 
      <font-awesome-icon :icon="['fas', 'cart-shopping']" />d


    </button>
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
  