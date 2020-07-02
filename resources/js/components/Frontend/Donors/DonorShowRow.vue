<template>
<div class="row book-row">
    <a :href="book.bookURL" class="book-link">
        <div class="book-info-container" v-if="isSearched === 1">
            <div class="book-index">{{ book.index }}</div>
            <div class="book-date">{{ book.updated_at }}</div>
            <div class="book-title-status">{{ book.showTitle }}</div>
            <div class="book-status">{{ book.showStatus }}</div>
        </div>
        <div class="book-info-container" v-if="isSearched === 0">
            <div class="book-index">{{ book.index }}</div>
            <div class="book-date">{{ book.updated_at }}</div>
            <div class="book-title">{{ book.showTitle }}</div>
        </div>
        <div class="book-readmore">
            <span><i class="fas fa-info-circle"></i></span>
        </div>
    </a>
</div>
</template>

<script>
export default {
    props: ['book', 'isSearched'],
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
