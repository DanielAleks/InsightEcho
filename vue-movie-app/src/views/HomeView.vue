<template>
    <HomePage />
    <div style="background: lightblue">
    These are my Posts: {{ posts }}
</div>
</template>

<script setup>
// 
import TheWelcome from "../components/TheWelcome.vue";
import NewMovies from "../components/NewMovies.vue";
import HomePage from "../components/commerce/HomePage.vue";
import Footer from "../components/commerce/Footer.vue";

// export default {
    props: {
        posts: Object
    }
    // setup() {
    //     return {dan: 'hi'}
    // }
// }

</script>