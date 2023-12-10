<template>
  <main class="overflow-x-hidden ml-[-2rem] w-[96vw]">
    <SideNavbar />
  <Notification v-if="state.showNotification" :message="dynamicMessage" />
  <RouterView :setNotification="setNotification" />
  </main>
</template>


<script>
import { defineComponent, ref, reactive, onMounted, provide } from "vue";
import axios from "axios";
import VueAxios from "vue-axios";
import HelloWorld from "./components/HelloWorld.vue";
import NewMovies from "./components/NewMovies.vue";
import SearchMovies from "./components/search/SearchMovies.vue";
import Notification from "./components/reusables/Notification.vue";
import SideNavbar from "./views/SideNavbar.vue";

export default defineComponent({
  name: "App",
  components: {
    SearchMovies,
    HelloWorld,
    NewMovies,
    Notification,
    SideNavbar
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