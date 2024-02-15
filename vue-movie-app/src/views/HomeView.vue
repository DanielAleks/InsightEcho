<template>
  <div class="">
    <HomePage />
    <a href="/post/create"
      ><button
        class="h-10 w-40 btn bg-indigo-500 rounded shadow-lg text-slate-200 mt-20 ml-40"
      >
        Create a Post
      </button></a
    >

    <div
      style="
        background: #292929;
        width: 70rem;
        min-height: 100%;
        margin-left: 10rem;
        margin-top: 1rem;
        padding: 2rem;
        padding-top: 2rem;
        border-radius: 10px;
      "
    >
      <p class="text-slate-300 text-xl">Generated Posts:</p>
      <hr class="w-40 mt-2 mb-5" />
      <div class="">
        <div v-if="posts" class="grid grid-cols-4 gap-x-10 mr-12">
          <div
            v-for="item in posts"
            class="text-slate-300 my-5 rounded p-3 bg-indigo-500 shadow-xl"
          >
            <div
              class="text-slate-400 hover:text-red-400 active:text-red-600 cursor-pointer absolute bottom-3 right-2 ml-2 z-10"
              @click="state.showPopup = true"
            >
              <Trash class="  " />
            </div>
            <p class="text-2xl">{{ item.title }}</p>
            <p v-if="item.avg_video_length">
              avg_video_length: {{ item.avg_video_length }}
            </p>
            <p v-if="item.setting">setting: {{ item.setting }}</p>
            <p v-if="item.hook">hook: {{ item.hook }}</p>
            <p v-if="item.transitions">transitions: {{ item.transitions }}</p>
            <p v-if="item.lighting">lighting: {{ item.lighting }}</p>
            <p v-if="item.music">music: {{ item.music }}</p>
          </div>
        </div>
      </div>
    </div>
    <DeleteConfirmationModal v-if="state.showPopup" :closeModal="closeModal" />
  </div>
</template>

<script>
// import {router, useForm} rom '@inertiajs/vue3'
import { ref, onMounted, defineComponent, watchEffect, reactive } from "vue";
import TheWelcome from "../components/TheWelcome.vue";
import NewMovies from "../components/NewMovies.vue";
import HomePage from "../components/commerce/HomePage.vue";
import Footer from "../components/commerce/Footer.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import gql from "graphql-tag";
import { useQuery } from "@vue/apollo-composable";
import { useApolloClient } from "@vue/apollo-composable";
import { Heart, Trash } from "lucide-vue-next";
import DeleteConfirmationModal from "../components/modal/DeleteConfirmationModal.vue";

export default defineComponent({
  name: "HomeView",
  components: { Trash, DeleteConfirmationModal },
  setup() {
    // console.log(props.posts, "POSTS")
    // return {dan: 'hi'}

    const thisResponseWorksOnGoogle =
      "https://api.themoviedb.org/3/movie/550?api_key=ef9dda51b2c7b29d237fab7aa1cf81e5";

    const postsRef = ref([]);
    const hi = "klasjdflkajdf";
    const postsQuery = gql`
      query posts {
        posts {
          title
          setting
          avg_video_length
          hook
          lighting
          music
        }
      }
    `;

    const state = reactive({
      showPopup: false,
    });

    const { result: postsData } = useQuery(postsQuery);

    const posts = ref([]);
    watchEffect(() => {
      if (postsData.value) {
        console.log(postsData.value, "postsData.value");
        posts.value = postsData.value.posts;
      }
    });

    function createNewPost() {
      try {
        axios({
          url: "http://127.0.0.1:8000/graphql",
          method: "post",
          data: {
            query: `
    mutation createPost {
  createPost (title: "New Post in Vue in other") {
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
          posts.value = result.data;
        });
      } catch (error) {
        console.error(error, "AXIOS GQL ERROR");
      }
    }

    onMounted(async () => {
      try {
        axios({
          url: "http://127.0.0.1:8000/",
          method: "post",
          data: {
            query: `
      query posts {
        posts {
          title
          setting
          avg_video_length
          hook
          transitions
          lighting
          music
          }
        }
        mutation createPost {
  createPost (title: "New Post in Vue 3", avg_video_length: 3) {
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
          posts.value = result.data;
        });
      } catch (error) {
        console.error(error, "AXIOS GQL ERROR");
      }
    });

    const localAPI = "http://127.0.0.1:8000/graphql";

    function closeModal() {
      state.showPopup = false;
    }

    // FINISH MAKING THE DELETE for a Post
    function deletePost() {
      try {
        axios({
          url: "http://127.0.0.1:8000/graphql",
          method: "delete",
          data: {
            query: `
    mutation deletePost {
      deletePost (title: "New Post in Vue in other", setting: "The Jungle", hook: "The big main", avg_video_length: 20, transitions: 3, lighting: "light", music: "Welcome to the Jungle!") {
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

    return { state, postsRef, posts, createNewPost, closeModal, deletePost };
  },
  mixins: [VueAxios],
});
</script>
