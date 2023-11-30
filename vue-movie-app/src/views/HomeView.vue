<script setup lang="ts">
import TheWelcome from "../components/TheWelcome.vue";
import NewMovies from "../components/NewMovies.vue";
import SideNavbar from "./SideNavbar.vue";
import HomePage from "../components/commerce/HomePage.vue"
import Footer from "../components/commerce/Footer.vue"
</script>

<template>
  <main class="overflow-x-hidden ml-[-2rem] w-[100vw]">
    <div>
    <SideNavbar />
    <HomePage />
    <!-- <Footer /> -->
    </div>
  </main>
</template>
