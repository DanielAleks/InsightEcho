<template>
  <nav
    style="width: 100vw"
    class="fixed top-0 z-10 border-gray-200 dark:bg-gray-900 dark:border-gray-700"
  >
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-0">
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul
          class="flex flex-col font-medium p-4 md:p-0 mt-4 ml-32 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
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
              >TV Shows</a
            >
          </li>
        </ul>
      </div>
      <div class="absolute top-0 right-16 flex">
        <SearchMovies />
      </div>
    </div>
  </nav>
  <Notification v-if="state.showNotification" :message="dynamicMessage" />
  <RouterView :setNotification="setNotification" />
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
import { defineComponent, ref, reactive, onMounted, provide } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import HelloWorld from "./components/HelloWorld.vue";
import NewMovies from "./components/NewMovies.vue";
import SearchMovies from "./components/search/SearchMovies.vue";
import Notification from "./components/reusables/Notification.vue";

export default defineComponent({
  name: "App",
  components: {
    SearchMovies,
    HelloWorld,
    NewMovies,
    Notification,
  },
  setup() {
    const state = ref({
      showGenreModal: false,
      showNotification: false,
    });

    function setNotification(message) {
      state.showNotification = true;
      // dynamicMessage.value = message;
      setTimeout(() => {
        state.showNotification = false;
      }, 3000);
    }

    // provide("setNotification", setNotification);

    // not sure why this is not displaying the notification on load, or even calling the function... dan - 5/9/23
    onMounted(() => {
      // setTimeout(() => {
      state.showNotification = true;
      // }, 1000);
    });
    // setNotification("Movie added as favorite!");

    const dynamicMessage = ref("Movie added as favorite!");

    return { state, dynamicMessage, setNotification };
  },
});
</script>
