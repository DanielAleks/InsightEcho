<script setup lang="ts">
import TheWelcome from "../components/TheWelcome.vue";
import NewMovies from "../components/NewMovies.vue";
import SideNavbar from "./SideNavbar.vue";
</script>

<template>
  <main >
    <div>
    <SideNavbar />
    <div class="ml-10"></div>
    <NewMovies />
    </div>
  </main>
</template>
