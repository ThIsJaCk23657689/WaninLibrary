<template>
<div class="row filter-row">
    <div class="col-md-3 col-6 d-flex">
        <div class="filter-dropbox-container">
            <select id="filter-column" name="column" class="form-control filter-dropbox" v-model="filter.type" @change="changeType">
                <option value="0">依條件</option>
                <option value="1">書名</option>
                <option value="2">作者</option>
                <option value="3">出版商</option>
                <option value="4">出版年份</option>
                <option value="5">譯者</option>
                <option value="6">ISBN</option>
                <option value="7">總類</option>
                <option value="8">哲學類</option>
                <option value="9">宗教類</option>
                <option value="10">科學類</option>
                <option value="11">應用科學類</option>
                <option value="12">社會科學類</option>
                <option value="13">史地類</option>
                <option value="14">中國史地類</option>
                <option value="15">世界史地類</option>
                <option value="16">語文文學類</option>
                <option value="17">藝術類</option>
                <option value="18">論文</option>
                <option value="19">期刊雜誌</option>
                <option value="20">非中文圖書</option>
                <!-- <option value="21">可借閱</option> -->
            </select>
        </div>
    </div>
    <div class="col-md-6 col-12 d-flex search-div">
        <div class="filter-search">
            <div class="search-icon">
                <i class="fas fa-search"></i>
            </div>
            <input type="text" id="search-input" name="keyword" class="form-control search-input" placeholder="請輸入書名、出版商、作者、捐贈人等關鍵字" v-model="filter.keyword" @keypress.enter="search">
            <a href="#" class="search-button" @click.prevent="search">
                搜尋
            </a>
        </div>
    </div>
    <div class="col-md-3 col-6 d-flex order-2">
        <select id="filter-order" name="order" class="form-control filter-dropbox" v-model="filter.order" @change="changeOrder">
            <option value="0">排序方式</option>
            <option value="1">最新 -> 最舊</option>
            <option value="2">最舊 -> 最新</option>
        </select>
    </div>
</div>
</template>

<script>
export default {
    props: ['filter'],
    data(){
        return {

        }
    },
    methods: {
        changeType(){
            this.$emit('refresh-book', 1);
        },
        search(){
            this.$emit('refresh-book', 1);
        },
        changeOrder(){
            this.$emit('refresh-book');
        }
    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>
