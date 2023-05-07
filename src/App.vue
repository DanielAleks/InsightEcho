<template>
  <!-- <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header> -->

  <nav
    style="width: 100vw"
    class="fixed top-0 z-10 border-gray-200 dark:bg-gray-900 dark:border-gray-700"
  >
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-0">
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul
          class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
        >
          <li>
            <a
              href="#"
              class="block py-2 pl-3 text-white pr-4 bg-blue-700 rounded md:bg-transparent md:p-0 dark:bg-blue-600 md:dark:bg-transparent"
              aria-current="page"
              >Movies</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
              >Series</a
            >
          </li>
          <li>
            <a
              href="#"
              class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
              >TV Shows</a
            >
          </li>
        </ul>
      </div>
      <div class="absolute top-0 right-16 flex">
        <button
          id="dropdownNavbarLink"
          data-dropdown-toggle="dropdownNavbar"
          @click="state.showGenreModal = !state.showGenreModal"
          class="flex items-center justify-between w-full py-2 mr-10 mt-[-.5rem] pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
        >
          Genres
          <svg
            class="w-5 h-5 ml-1"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
        <div v-if="state.showGenreModal">
          <div v-if="posts" class="grid grid-cols-6 bg-red w-2/3 mt-10 pt-16">
            <div
              class="grid grid-cols-4 gap-5 ml-40 text-slate-500"
              v-for="item in posts.genres"
            >
              <div>
                <button
                  class="bg-gray-900 hover:bg-blue-950 active:bg-blue-900 p-5 m-2 rounded"
                  @click="setMovieGenre({ item: item })"
                >
                  {{ item.name }}
                  <!-- {{ item.id }} -->
                </button>
              </div>
            </div>
          </div>
        </div>
        <input
          class="p-2 h-10 mr-10"
          style="border-radius: 4px 4px 4px 4px"
          type="text"
          placeholder="Search Movie..."
        />
        <img
          src="https://deadline.com/wp-content/uploads/2020/09/Gugu-Mbatha-Raw-e1610021013129.jpg"
          alt="girl"
          class="w-14 h-14 rounded-full object-cover mt-[-.5rem]"
        />
      </div>
    </div>
  </nav>

  <RouterView />
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>

<script>
import { defineComponent, ref, reactive, onMounted } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import HelloWorld from "./components/HelloWorld.vue";
import NewMovies from "./components/NewMovies.vue";

export default defineComponent({
  name: "App",
  components: {
    HelloWorld,
    NewMovies,
  },
  setup() {
    const state = ref({
      showGenreModal: false,
    });

    const posts = ref([]);

    const get_genres =
      "https://api.themoviedb.org/3/genre/movie/list?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5&language=en-US            ";

    onMounted(() => {
      axios.get(get_genres).then((response) => {
        posts.value = response.data;
      });
    });

    return { state, posts };
  },
  mixins: [VueAxios],
});
</script>
