<template>
  <div>
    <form action :onsubmit="search">
      <div class="form-group" title="You can use natural language to search information">
        <label for="searchInput" class="ml-1">Search</label>
        <div class="row m-1">
          <input
            type="text"
            v-model="searchQuery"
            class="form-control col-md-9"
            id="searchInput"
            placeholder="Search using natural language"
          />
          <button @click="search" class="btn btn-primary col-md-2 ml-2">Search</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return { searchQuery: "" };
  },
  methods: {
    search(e) {
      e.preventDefault();
      alert("Search Button Clicked");
    }
  }
};
</script>