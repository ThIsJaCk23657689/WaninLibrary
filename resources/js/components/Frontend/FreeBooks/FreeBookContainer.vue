<template>
<div class="row freebook-container">
    <freebook-card v-for="book in books" :book="book" :key="book.id"></freebook-card>
    <span class="not-found-message" v-if="books.length == 0">
        很抱歉，在您的查詢條件下無法找尋任何免費索取書本，請重新查詢。
    </span>
</div>
</template>

<script>
export default {
    props: ['books'],
    data(){
        return {

        }
    },
    methods: {

    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>