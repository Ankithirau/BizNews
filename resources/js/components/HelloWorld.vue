<template>
  <div>
    <h1>Hello, {{ name }}! menu</h1>
    <button @click="changeName">Change Name</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "John",
    };
  },
  methods: {
    changeName() {
      this.name = "Jane";
    },
  },
};
</script>