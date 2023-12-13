<template>
    <div class="flex">
        <button type="submit" @click="state.editMode = !state.editMode" class="absolute right-0 top-24 rounded-full bg-blue-600 button h-10 w-10 text-gray-200 flex justify-center border-b-4 border-blue-400 hover:border-blue-500 hover:bg-blue-700 active:bg-blue-600 items-center shadow-3xl cursor-pointer shadow-black z-10"><Pencil class="h-5" style="cursor: pointer;"/></button>
    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085" class="w-[55vw] h-[95vh] mt-10"/>

    <div class="p-4 md:p-5 space-y-0 mt-28 w-[40vw]">
      <div >
</div>


<!-- v-if="item.key === 'feature' || item.key === 'benefit'" -->
<!-- <TrixComponent
                id="1"
              /> -->
              <!-- :setValue="setTrixData" -->

      <div v-if="state.editMode" v-for="item in researchTypes">
<form>
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
{{ item.title }}

            </label>
            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :placeholder="item.title" required>
        </div>
       
</form>

  </div>


              <div @click="toggleResearchTab(item)" id="accordion-collapse"  data-accordion="collapse" v-for="item in researchTypes">
  <h2 id="accordion-collapse-heading-1" >
    <button @click="" type="button" class="flex items-center justify-between w-full font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
      <span>{{ item.title }}</span>
      <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
      </svg>
      <div class="flex">
      <div class="border-l border-t border-gray-900 h-16 w-16 justify-center items-center flex">
      <Eye/>
    </div>
    <div class="border-r border-l  border-t border-gray-900 h-16 w-16 justify-center items-center flex">
      <Plus/>
      </div>
    </div>
    </button>
  </h2>



  <div v-if="state.viewResearchTab === item.title" id="accordion-collapse-body-1" aria-labelledby="accordion-collapse-heading-1  border border-b-0">
    <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">

      <ul class="list-decimal">
        <li v-for="(section, id) in getSections(item.description)" v-if="id !== 0"
        >{{ section }}</li>
      </ul>
    </div>
  </div>
</div>
</div>

            </div>
</template>

<script>
import { reactive } from 'vue'
import {Pencil, Eye, Plus} from "lucide-vue-next"
import TrixComponent from "../components/reusables/TrixComponent.vue"
export default {
    components: {
        Pencil,
        TrixComponent,
        Eye,
        Plus
    },
    setup() {
        const state = reactive({
            viewResearchTab: "",
            editMode: false
        })

        const researchTypes = [
          {
            title: "Target Market", 
            description: 
            "What kind of person is going to get the most out of this product? - Who are the best current customers, with the highest LTV? - What attributes do they have in common?"
        },
        {
            title: "Avatar", description: "Name, age and face. This makes it much easier for you to imagine them as a real, individual person.  - Background and mini life history. You need to understand the general context of their life and previous experience. - Day-in-the-life. If you can get a rough idea of what the average day in their life looks like you will be able to relate more easily to them. - Values. What do they believe is most important? What do they despise? - Outside forces. What outside forces or people does the Avatar feel influences their life?"
        },
        {
            title: "Current State", description: "What is painful or frustrating in the current life of my avatar? - What annoys them? - What do they fear? - What do they lie awake at night worrying about? - How do other people perceive them? - What lack of status do they feel? - What words do THEY use to describe their pains and frustrations?"
        },
        {
            title: "Dream State", description: "If they could wave a magic wand at their life and fix everything, what would their life look like? - What enjoyable new experiences would they have? - How would others perceive them in a positive light? - How would they feel about themselves if they made that change?  - What words do THEY use to describe their dream outcome?"
        },
        {
            title: "Road Blocks", description: "What is keeping them from living their dream state today? - What mistakes are they making that are keeping them from getting what they want in life? - What part of the obstacle does the avatar not understand or know about? - What is the one key roadblock that once fixed will allow them to move forward toward their dream outcome?"
        },
        {
            title: "Solution", description: "What does the avatar need to do to overcome the key roadblock? - 'If they <insert solution>, then they will be able to <insert dream outcome>'"
        },
        {
            title: "Product", description: "How does the product help the avatar implement the Solution? - How does the product help the reader increase their chances of success? - How does the product help the reader get the result faster? - How does the product help the reader get the result with less effort or sacrifice? - What makes the product fun? - What does your target market like about related products? - What does your target market hate about related products?"
        },
        ]

        function toggleResearchTab(item) {
          if (item.title !== state.viewResearchTab) {
          state.viewResearchTab = item.title
        } else {
          state.viewResearchTab = ""
        }
        }

        return {toggleResearchTab, researchTypes, state,
            getSections(longString) {
      return longString.split(" - ");
    },
        }
    }
}
</script>