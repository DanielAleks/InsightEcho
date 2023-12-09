<template>
    <div class="mt-16 flex flex-col items-center justify-center" >
      <div class="grid grid-cols-4">
      <div class="bg-white w-80 p-5 my-5 rounded-lg flex flex-col shadow-lg ml-20">
      <p class="text-lg font-bold">Research Page</p>
      <hr class="mb-5"/>
      <div class="grid grid-cols-2 gap-4">
      <div v-for="item in checklistInputs">
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ item.name }}</label>
            <input v-model="item.input" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
        </div>
      </div>
      
      <div class="grid grid-cols-2 gap-5 mt-3">
        <button disabled class="btn bg-indigo-400 text-white rounded mt-3 px-5 py-2 cursor-not-allowed">
        Add item
      </button>
      <button @click="createChecklist" class="btn bg-gray-700 text-white rounded mt-3 px-5 py-2">
        Submit
      </button>
    </div>

    </div>

    <div class="grid grid-cols-2 w-[60vw] ml-28" >
    <div
    v-for="item in storedItems"
    class="bg-white shadow-lg w-80 p-5 my-5 rounded-lg justify-self-center">
      <p class="text-lg font-bold">{{ item.title }}</p>
      <hr class="mb-5"/>
      <div>
        <p>Title</p>
        <p>Target Market</p>
        <p>Avatar</p>
        <p>Current State</p>
        <p>Dream State</p>
        <p>Road Blocks</p>
        <p>Solution</p>
        <p>Product</p>
        <p>Updated At</p>
        <p>Created At</p>
      </div>
    </div>
  </div>
  </div>

asdf
<!-- Card List Section -->
<section  class="bg-gray-100 dark:bg-gray-900 py-10 px-12">
    <!-- Card Grid -->
    <div
        class="grid grid-flow-row gap-8 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <!-- Card Item -->
            <div
                class="my-8 rounded shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-300 hover:-translate-y-1"
                v-for="(post, index) in posts"
                :key="index"
                >
                <!-- Clickable Area -->
                <a _href="link" class="cursor-pointer">
                    <figure>
                        <img
                            :src="post.image + '?auto=format&fit=crop&w=400&q=50'"
                            class="rounded-t h-72 w-full object-cover" />

                        <figcaption class="p-4">
                            Title
                            <p
                                class="text-lg mb-4 font-bold leading-relaxed text-gray-800 dark:text-gray-300"
                                x-text="post.title">
                                Post Title
                            </p>

                            Description
                            <small
                                class="leading-5 text-gray-500 dark:text-gray-400"
                                x-text="post.description">
                                Post Description
                            </small>
                        </figcaption>
                    </figure>
                </a>
            </div>
    </div>
</section>
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
  ])

    const checklistInputs = ref([
      {
        name: "Title",
        input: ref("")
      },
      {
        name: "Setting",
        input: ref("")
      },
      {
        name: "Average Time",
        input: ref(0)
      },
      {
        name: "Hook",
        input: ref("")
      },
      {
        name: "Transitions",
        input: ref(0)
      },
      {
        name: "Lighting",
        input: ref("")
      },
      {
        name: "Music",
        input: ref("")
      },
    ])

    function createChecklist() {
      console.log(checklistInputs, "checklistInputs")
      storedItems.value.push({
            title: checklistInputs.value[0].input,
            setting: checklistInputs.value[1].input,
            avg_time: checklistInputs.value[2].input, 
            hook: checklistInputs.value[3].input,
            transitions: checklistInputs.value[4].input,
            lighting: checklistInputs.value[5].input,
            music: checklistInputs.value[6].input,
    })
    }

        const posts = [
            {
                image:
                    "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085",
                title: "5 Easy Tips That Will Make Your Latte Art Flourish",
                description:
                    "Latte art is quite often the most attractive thing for a new barista, and latte art is an excellent gateway to the exciting world of coffee. Latte art easy to start with, but to master latte art patterns, you need a lot practice and determination. Here are my tips that helped me to improve my latte art a few years ago!",
            },
            {
                image:
                    "https://images.unsplash.com/photo-1512034400317-de97d7d6c3ed",
                title: "Coffee Roasting Basics: Developing Flavour by Roasting",
                description:
                    "Caffé latte and flat white are definitely the most ordered espresso based drinks in cafés around the world but what are they really? Have you ever wondered the difference between caffé latte vs. flat white? Let's see what makes caffé latte and flat white different from each other!",
            },
            {
                image:
                    "https://images.unsplash.com/photo-1445077100181-a33e9ac94db0",
                title: "Latte vs. Flat White - What is the Difference?",
                description:
                    "I bet roasting is the thing that every barista wants to know about! We can develop flavour by roasting coffee. How can we achieve the best tasting coffee? What actually happens when roasting?",
            },
            {
                image:
                    "https://images.unsplash.com/photo-1459257868276-5e65389e2722",
                title: "Creating the Perfect Espresso Recipe",
                description:
                    "Espresso recipes are important in cafés in terms of consistency and flavour. How and why are the espresso recipes made and what are the things you should consider when making a recipe for espresso? Let’s dig deeper into the world of espresso!",
            },
        ];


      return { state, setMovieGenre, movie_list, setFavorite, storedItems, checklistInputs, createChecklist,
        posts
      };
    },
    mixins: [VueAxios],
  });
  </script>
  