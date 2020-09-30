<template>
  <editor
    api-key="no-api-key"
    v-model="mutableValue"
    :init="{
      height: 500,
      menubar: true,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount',
      ],
      toolbar:
        'undo redo | formatselect | bold italic backcolor | \
           alignleft aligncenter alignright alignjustify | \
           bullist numlist outdent indent table | removeformat | help',
    }"
  />
</template>

<script>
import Editor from "@tinymce/tinymce-vue";

export default {
  props: {
    value: {
      type: String,
    },
  },
  mounted() {
    this.mutableValue = this.value;
    setTimeout(() => (this.loaded = true), 250);
  },
  data() {
    return {
      loaded: false,
      mutableValue: "",
    };
  },
  watch: {
    mutableValue(newValue, oldValue) {
      if (this.loaded) {
        this.$emit("input", newValue);
      }
    },
    value(newValue, oldValue) {
      setTimeout(() => (this.mutableValue = this.value), 250);
    },
  },
  components: {
    editor: Editor,
  },
};
</script>