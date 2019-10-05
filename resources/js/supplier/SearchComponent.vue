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
          <div class="col-md-3 p-0 pl-2">
            <button @click="search" class="btn btn-primary col-12">Search</button>
          </div>
        </div>
      </div>
    </form>
    <hr />

    <div id="printContainer">
      <h1 class="mb-4">{{ title }} report</h1>

      <table class="table">
        <col width="20%" />
        <col width="20%" />
        <col width="40%" />
        <col width="20%" />
        <thead class="thead-dark">
          <tr>
            <th scope="col">Supplier ID</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Products</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="supplier in suppliers" :key="supplier.supplier_id">
            <th scope="row">{{ supplier.supplier_id }}</th>
            <td>
              <a :href="`/supplier/${supplier.supplier_id}`">{{ supplier.name }}</a>
            </td>
            <td>{{ supplier.location }}</td>
            <td>
              <p v-for="product in supplier.products" :key="product.product_id">{{ product.name }}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios.get("/api/search", { params: { keywords: "all" } }).then(response => {
      this.suppliers = response.data;
    });
  },
  data() {
    return { title: "Suppliers", searchQuery: "", column: "", suppliers: [] };
  },
  methods: {
    search(e) {
      e.preventDefault();
      if (this.searchQuery.length > 0) {
        let words = this.searchQuery.trim().split(" ");
        let query = this.searchQuery;
        if (words.length > 1) {
          // check if the word "in" contains in the query
          words.forEach(element => {
            if (element.toLowerCase() === "in") {
              this.column = "location";
              query = words[words.length - 1];
              this.title = "Suppliers that are located in " + query;
              return;
            } else if (
              element.toLowerCase() === "sells" ||
              element.toLowerCase() === "sell" ||
              element.toLowerCase() === "supply" ||
              element.toLowerCase() === "supplies" ||
              element.toLowerCase() === "produce" ||
              element.toLowerCase() === "produces"
            ) {
              this.column = "products";
              query = words[words.length - 1];
              this.title = "Suppliers that supply " + query;
              return;
            }
          });
        }
        axios
          .get("/api/search", {
            params: { keywords: query, column: this.column }
          })
          .then(response => {
            this.suppliers = response.data;
          })
          .catch(error => {});
      } else {
        axios
          .get("/api/search", { params: { keywords: "all" } })
          .then(response => {
            this.suppliers = response.data;
          });
      }
    }
  }
};
</script>