<template>
    <div>
        <div class="search">
            <h4 class="search-text">Search</h4>
            <div class="row">
                <div>
                    <i class="material-icons prefix">Price-min</i>
                    <input @input="loadData" v-model="data.minPrice" type="text" id="price" class="autocomplete">
                </div>

                <div>
                    <i class="material-icons prefix">Price-max</i>
                    <input @input="loadData" v-model="data.maxPrice" type="text" id="price" class="autocomplete">
                </div>

                <div>
                    <i class="material-icons prefix">Available</i>
                    <input @input="loadData" v-model="data.available" type="text" id="price" class="autocomplete">
                </div>

                <div>
                    <i class="material-icons prefix">Category</i>
                    <input @input="loadData" v-model="data.category" type="text" id="price" class="autocomplete">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            data: {
                minPrice: '',
                maxPrice: '',
                available: '',
                category: ''
            }
        }
    },
    methods: {
        loadData(page) {
            let url = this.url + '/api/search?page=' + page;
            this.axios.post(url, {data: this.data
            }).then(response => this.$emit('sendData', response.data, this.data))
        }
    }
}
</script>

<style>
    .search {
        margin-top:15px;
        float: right;
        width: 25%;
        border-left: solid #07874c 1px
    }
    .search {
        text-align: center;
        font-family: fantasy;
        color: grey
    }
</style>
