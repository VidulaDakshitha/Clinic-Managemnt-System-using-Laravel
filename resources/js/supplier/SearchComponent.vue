<template>
  <div>
    <form action :onsubmit="onSubmit">
      <div class="form-group" title="You can use natural language to search information">
        <label for="searchInput" class="ml-1">Search suppliers</label>
        <div class="row m-1">
          <input
            type="text"
            v-model="searchQuery"
            class="form-control col-md-9"
            id="searchInput"
            placeholder="Search using natural language"
          />
          <div class="col-md-3 p-0 pl-md-2">
            <button @click="onSubmit" class="btn btn-primary col-12 mt-1 mt-md-0">Search</button>
          </div>
        </div>
      </div>
    </form>
    <hr />
    <h3 v-if="suppliers.length === 0">No results found for "{{ searchQuery }}"</h3>
    <div v-if="suppliers.length > 0">
      <!-- printing content -->
      <div id="printContainer">
        <div v-if="showLogo">
          <div class="row">
            <div class="col-md-10">
              <img src="/images/main/mainlayout/logo_dark_long.png" />
            </div>
            <div class="col-md-2">{{ date }}</div>
          </div>
          <hr />
        </div>
        <h2 class="mb-4">{{ title }}</h2>

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
                <p>{{ supplier.name }}</p>
              </td>
              <td>{{ supplier.location }}</td>
              <td>
                <p v-for="product in supplier.products" :key="product.product_id">{{ product.name }}</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <Button class="btn btn-primary" v-on:click="print">Generate Report</Button>
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
    return {
      title: "Suppliers",
      searchQuery: "",
      column: "",
      suppliers: [],
      showLogo: false,
      date: ""
    };
  },
  watch: {
    searchQuery(after, before) {
      this.search();
    }
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
      this.search();
    },
    print() {
      this.showLogo = true;
      this.date = new Date();
      setTimeout(() => {
        console.log("object");
        this.$htmlToPaper("printContainer");
        this.showLogo = false;
      }, 500);
    },
    search() {
      if (this.searchQuery.length > 0) {
        let words = this.searchQuery.trim().split(" ");
        let query = this.searchQuery;
        if (words.length > 1) {
          // check if the word "in" contains in the query
          words.forEach(element => {
            if (
              element.toLowerCase() === "in" ||
              element.toLowerCase() === "from"
            ) {
              this.column = "location";
              query = words[words.length - 1];
              this.title = "Suppliers that are located in " + query + " area";
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
        } else {
          this.column = "name";
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