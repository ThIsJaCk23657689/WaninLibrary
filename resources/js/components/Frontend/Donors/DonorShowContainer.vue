<template>
<div class="row donor-show-container">
    <div class="col-md-12">
        <div class="title-status-rows row" v-if="isSearched === 1">
            <!-- 有書籍狀態 -->
            <div class="col-2 status-row-col">序號</div>
            <div class="col-3 status-row-col">日期</div>
            <div class="col-3 status-col-title">書籍名稱</div>
            <div class="col-2 status-col-status">書籍狀態</div>
        </div>
        <div class="title-rows row" v-if="isSearched === 0">
            <div class="col-2 row-col">序號</div>
            <div class="col-3 row-col">日期</div>
            <div class="col-6 row-col">書籍名稱</div>
        </div>
        <donor-show-row :is-searched="isSearched" v-for="book in books" :book="book" :key="book.id"></donor-show-row>
        <span class="not-found-message" v-if="books.length == 0">
            很抱歉，無法找到您所查詢的資料，請重新查詢謝謝。
        </span>
    </div>
</div>
</template>

<script>
export default {
    props: ['books', 'isSearched'],
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
