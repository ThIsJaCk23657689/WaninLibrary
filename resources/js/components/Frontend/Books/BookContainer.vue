<template>
<div class="row book-container">
    <book-card v-for="book in books" :book="book" :key="book.id"></book-card>
    <span class="not-found-message" v-if="books.length == 0">
        很抱歉，無法找到您所查詢的資料，請重新查詢謝謝。
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