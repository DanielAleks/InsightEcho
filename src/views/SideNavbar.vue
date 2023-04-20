<template>
  <button
    data-drawer-target="default-sidebar"
    data-drawer-toggle="default-sidebar"
    aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
  >
    <span class="sr-only">Open sidebar</span>
    <svg
      class="w-6 h-6"
      aria-hidden="true"
      fill="currentColor"
      viewBox="0 0 20 20"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        clip-rule="evenodd"
        fill-rule="evenodd"
        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
      ></path>
    </svg>
  </button>

  <aside
    id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar"
  >
    <div
      style="background: #0e0f14"
      class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800"
    >
      <div class="flex flex-col items-center mt-10">
        <img
          src="https://deadline.com/wp-content/uploads/2020/09/Gugu-Mbatha-Raw-e1610021013129.jpg"
          alt="girl"
          class="w-28 h-28 rounded-full object-cover"
        />
        <p class="text-white text-lg mt-2">Sara</p>
        <p class="text-white text-lg mt-0 text-slate-500">Premium Member</p>
        <p>{{ state.value }}</p>
      </div>

      <ul class="space-y-2 font-medium mt-20">
        <div v-for="item in routeLinks">
          <li>
            <a
              href="#"
              class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
            >
              <span class="ml-3 text-white">{{ item.name }}</span>
            </a>
          </li>
        </div>
      </ul>
    </div>
  </aside>
</template>

<script>
import { defineComponent, reactive } from "vue";

export default defineComponent({
  setup() {
    const state = reactive({
      value: "daniell this is state",
    });

    const routeLinks = [
      {
        name: "New Movies",
        link: "/new-movies",
        icon: "",
      },
      {
        name: "Genre",
        link: "/genre",
        icon: "",
      },
      {
        name: "Favorites",
        link: "/favorites",
        icon: "",
      },
      {
        name: "Downloaded",
        link: "/downloaded",
        icon: "",
      },
      {
        name: "Logout",
        link: "/login",
        icon: "",
      },
    ];

    return { state, routeLinks };
  },
});
</script>
