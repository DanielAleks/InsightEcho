<template>
    <div>
        Trix Input
        <input
          ref="inputElement"
          :id="id"
          type="hidden"
          name="content"
          :value="trixText"
          @keydown.enter="fireFunction"
        />
        <trix-editor
          :input="id"
          :placeholder="trixTextComputed"
          @keydown.enter="fireFunction"
        ></trix-editor>
  
      <!-- {{ trixText }} -->
    </div>
  </template>
  
  <script>
import Trix from "trix";
import "trix/dist/trix.css";

  export default {
    components: {Trix},
    props: {
      id: { type: String, required: true },
      setValue: { type: Function, default: () => {} },
      type: { type: String, default: "" },
      defaultValue: { type: String, default: "" },
    },
    data() {
      return {
        trixText: "",
        inputElement: null, // Declare the ref
      };
    },
    computed: {
      trixTextComputed() {
        // this is the placeholder, should not include html tags
  
        const formattedValue = this.defaultValue
          .replace(/(<([^>]+)>)/gi, " ")
          .replace(/&nbsp;/g, " ");
        return formattedValue;
  
        // return this.trixText;
      },
    },
    watch: {
      defaultValue: {
        immediate: true,
        handler(newVal) {
          this.trixText = newVal;
        },
      },
    },
    mounted() {
      document.addEventListener("trix-change", this.setTextToTrix);
      console.log(this.defaultValue);
      // this.trixText = this.defaultValue;
      // this.inputElement = this.$refs.inputElement; // Assign the ref to inputElement
    },
    beforeUnmount: function () {
      document.removeEventListener("trix-change", this.setTextToTrix);
    },
    updated() {
      this.emitDataBackToComponent();
    },
  
    methods: {
      setTextToTrix(e) {
        // this.trixText = this.inputElement.value;
        this.trixText = document.getElementById(this.id).value;
        this.setValue(this.trixText, this.type);
      },
      emitDataBackToComponent() {
        this.$emit("dataFromTrix", this.defaultValue);
      },
      fireFunction() {
        console.log("something");
          // GO TO THE NEXT LINE
          // how do I access element.editor.insertLineBreak() from here?
          // I tried this.$refs.trixEditor.editor.insertLineBreak() but it doesn't work
          
          // setTimeout(() => {
          //     if (this.$refs.trixEditor && this.$refs.trixEditor.editor) {
          //         this.$refs.trixEditor.editor.insertLineBreak();
          //         console.log("EVER FIRE?")
          //     }
          //     console.log("OIUT EVER FIRE?")
  
          // }, 1000);
  
  
  
  
  
          //   const element = this.$refs.trixEditor;
  
  
        
          //     //   element.editor.insertString("Hello");
          // element.editor.insertLineBreak();
      },
    },
  };
  </script>
  