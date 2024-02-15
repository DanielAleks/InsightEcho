<template>
  <div class="flex justify-center">
    <div
      class="h-full bg-white text-slate-600 shadow-lg rounded-lg p-4 text-slate-200 text-lg pl-5 pt-5 w-[80vw]"
    >
      <p class="p-3 ml-2 text-slate-600 text-lg"><b>Create a New Post</b></p>
      <hr class="mr-36 mt-2 ml-5 mb-5" />
      <div class="grid grid-cols-2 gap-x-10 gap-y-2">
        <div class="mb-4 mx-5" v-for="item in valueTypes">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="Title">
            {{ item.title }}
          </label>
          <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="Title"
            type="text"
            placeholder="Title"
          />
        </div>
        <button
          class="btn bg-indigo-500 h-10 w-40 rounded shadow-md text-slate-100 ml-5"
          @click="createNewPost"
        >
          Create Post
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, defineComponent, watchEffect } from "vue";
import TheWelcome from "../components/TheWelcome.vue";
import NewMovies from "../components/NewMovies.vue";
import HomePage from "../components/commerce/HomePage.vue";
import Footer from "../components/commerce/Footer.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import gql from "graphql-tag";
import { useQuery } from "@vue/apollo-composable";
import { useApolloClient } from "@vue/apollo-composable";

export default defineComponent({
  setup() {
    const valueTypes = [
      {
        title: "Title",
        value: "",
      },
      {
        title: "Setting",
        value: "",
      },
      {
        title: "Hook",
        value: "",
      },
      {
        title: "Music",
        value: "",
      },
      {
        title: "Avg Video Length",
        value: "",
      },
      {
        title: "Transitions",
        value: "",
      },
    ];

    function createNewPost() {
      try {
        axios({
          url: "http://127.0.0.1:8000/graphql",
          method: "post",
          data: {
            query: `
    mutation createPost {
  createPost (title: "New Post in Vue in other", setting: "The Jungle", hook: "The big main", avg_video_length: 20, transitions: 3, lighting: "light", music: "Welcome to the Jungle!") {
          title
          setting
          avg_video_length
          hook
          transitions
          lighting
          music
          }
        }
      `,
          },
        }).then((result) => {
          console.log(result.data, "AXIOS GQL DATA");
          window.location = "/";
        });
      } catch (error) {
        console.error(error, "AXIOS GQL ERROR");
      }
    }
    return { valueTypes, createNewPost };
  },
});
</script>
