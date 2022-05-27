<template>
    <div>
        <vue-good-table
            :columns="columns"
            :rows="rows"
          >
 </vue-good-table>
    </div>

</template>

<script>
export default {
    name: 'Table',
    props: ['rows'],
    data(){
        return {
            columns: [
                {
                    label: 'Name',
                    field: 'name',
                },
                {
                    label: 'Price',
                    field: 'price',
                    type: 'text',
                },
                {
                    label: 'Description',
                    field: 'description',
                    type: 'text',
                },
                {
                    label: 'Available',
                    field: 'available',
                    type: 'text',
                },

                {
                    label: 'Category',
                    field: 'category',
                    type: 'text',
                },
            ],

        };
    },
};

</script>

<style>

</style>




