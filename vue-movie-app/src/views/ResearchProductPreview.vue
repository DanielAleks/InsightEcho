<template>
  <div class="flex">
    <button
      type="submit"
      @click="state.editMode = !state.editMode"
      class="absolute right-0 top-24 rounded-full bg-blue-600 button h-10 w-10 text-gray-200 flex justify-center border-b-4 border-blue-400 hover:border-blue-500 hover:bg-blue-700 active:bg-blue-600 items-center shadow-3xl cursor-pointer shadow-black z-10"
    >
      <Pencil class="h-5" style="cursor: pointer" />
    </button>
    <img
      src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085"
      class="w-[55vw] h-[95vh] mt-10"
    />

    <div class="p-4 md:p-5 space-y-0 mt-28 w-[40vw]">
      <div></div>

      <div>
        <div class="flex justify-center">
          <p class="text-xl mb-2 text-center">
            {{
              researchTypes.filter(
                (item) => item.title === state.viewResearchTab
              )[0].title
            }}
          </p>
          <button
            @click="state.showSectionInfo = !state.showSectionInfo"
            class="bg-sky-200 hover:bg-sky-400 active:bg-sky-300 rounded-full h-6 mt-1 ml-3"
          >
            <Info />
          </button>
        </div>

        <div class="-mr-10 pl-10 mb-10">
          <ul class="list-decimal" v-if="state.showSectionInfo">
            <li
              v-for="(section, id) in getSections(
                researchTypes.filter(
                  (item) => item.title === state.viewResearchTab
                )[0].description
              )"
              v-if="id !== 0"
            >
              {{ section }}
            </li>
          </ul>

          <TrixComponent v-if="state.editMode" id="1" class="mt-10" />
          <!-- :setValue="setTrixData" -->

          <div class="my-7">
            Here is my Information and there should be Trix if editmode is on
          </div>
        </div>
      </div>

      <div
        class="flex justify-center mb-20 ml-10"
        @click="toggleResearchTab(item)"
        v-for="item in researchTypes"
      >
        <button
          :class="item.title === state.viewResearchTab ? 'bg-indigo-500' : ''"
          class="bg-gray-600 my-3 button h-10 w-80 rounded-md text-gray-200 flex justify-center border-b-4 border-gray-700 hover:border-indigo-400 hover:bg-indigo-500 active:bg-indigo-600 items-center shadow-3xl cursor-pointer shadow-black z-10"
        >
          {{ item.title }}
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive } from "vue";
import { Pencil, Eye, Plus, Info } from "lucide-vue-next";
import TrixComponent from "../components/reusables/TrixComponent.vue";
export default {
  components: {
    Pencil,
    TrixComponent,
    Eye,
    Plus,
    Info,
  },
  setup() {
    const state = reactive({
      viewResearchTab: "Target Market",
      editMode: false,
      showSectionInfo: false,
    });

    const researchTypes = [
      {
        title: "Target Market",
        description:
          "What kind of person is going to get the most out of this product? - Who are the best current customers, with the highest LTV? - What attributes do they have in common?",
      },
      {
        title: "Avatar",
        description:
          "Name, age and face. This makes it much easier for you to imagine them as a real, individual person.  - Background and mini life history. You need to understand the general context of their life and previous experience. - Day-in-the-life. If you can get a rough idea of what the average day in their life looks like you will be able to relate more easily to them. - Values. What do they believe is most important? What do they despise? - Outside forces. What outside forces or people does the Avatar feel influences their life?",
      },
      {
        title: "Current State",
        description:
          "What is painful or frustrating in the current life of my avatar? - What annoys them? - What do they fear? - What do they lie awake at night worrying about? - How do other people perceive them? - What lack of status do they feel? - What words do THEY use to describe their pains and frustrations?",
      },
      {
        title: "Dream State",
        description:
          "If they could wave a magic wand at their life and fix everything, what would their life look like? - What enjoyable new experiences would they have? - How would others perceive them in a positive light? - How would they feel about themselves if they made that change?  - What words do THEY use to describe their dream outcome?",
      },
      {
        title: "Road Blocks",
        description:
          "What is keeping them from living their dream state today? - What mistakes are they making that are keeping them from getting what they want in life? - What part of the obstacle does the avatar not understand or know about? - What is the one key roadblock that once fixed will allow them to move forward toward their dream outcome?",
      },
      {
        title: "Solution",
        description:
          "What does the avatar need to do to overcome the key roadblock? - 'If they <insert solution>, then they will be able to <insert dream outcome>'",
      },
      {
        title: "Product",
        description:
          "How does the product help the avatar implement the Solution? - How does the product help the reader increase their chances of success? - How does the product help the reader get the result faster? - How does the product help the reader get the result with less effort or sacrifice? - What makes the product fun? - What does your target market like about related products? - What does your target market hate about related products?",
      },
    ];

    function toggleResearchTab(item) {
      if (item.title !== state.viewResearchTab) {
        state.viewResearchTab = item.title;
      } else {
        state.viewResearchTab = "";
      }
    }

    return {
      toggleResearchTab,
      researchTypes,
      state,
      getSections(longString) {
        return longString.split(" - ");
      },
    };
  },
};
</script>
