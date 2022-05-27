<template>
    <div>
        <Search @sendData="sendData"/>
     <div class="table">
        <Table :rows="rows" />
         <pagination v-if="prods" :data="prods" @pagination-change-page="loadData"></pagination>
         <pagination  v-if="searchProds" :data="searchProds" @pagination-change-page="loadSearchData"></pagination>
      </div>
    </div>
</template>
<script>
import Table from "./components/Table";
import Search from "./components/Search";
export default {
    components: {Search, Table},
    data() {
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            rows: [],
            prods: {},
            args: {},
            searchProds: {}
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData(page=1) {
            let url = this.url + '/api/products?page=' + page;
            this.axios.get(url).then((response) => {
                this.rows = response.data.data
                this.prods = response.data
            })
        },
        sendData(data, args) {
            this.rows = data.data
            this.args = args
            this.searchProds = data
            this.prods = {}
        },
        loadSearchData(page) {
            let url = this.url + '/api/search?page=' + page;
            this.axios.post(url, {data: this.args
            }).then(response =>  {
                this.searchProds = response.data
            })
        }
    },
}
</script>
<style>
    .table {
    float: left;
    width: 75%;
    }
</style>
