<template>
    <div>
        <Search @sendData="sendData"/>
     <div class="table">
        <Table :rows="rows" />
         <pagination  :data="prods" @pagination-change-page="loadData"></pagination>
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
            prods: {}
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
        sendData(data) {
            this.rows = data
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
