<template>
  <div
    class="z-10 py-4 lg:px-4 fixed bottom-10 right-1/3 p-2 bg-indigo-800 items-center text-indigo-100 h-16 w-96 leading-none lg:rounded-full flex lg:inline-flex"
    role="alert"
  >
    <span
      class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3"
      >New</span
    >
    <span class="font-semibold mr-2 text-left flex-auto">{{ message }}</span>
    <button class="cursor-pointer hover:bg-indigo-700 p-3 rounded-full">
    <svg
      class="fill-current opacity-75 h-4 w-4"
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 20 20"
    >
      <path
        d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"
      />
    </svg>
    </button>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  name: "Notification",
  props: { message: String },
  setup() {},
});
</script>
