<template>
<div class="col-md-6 pd-25">
    <div class="freebook-card">
        <a :href="book.showURL" class="freebook-card-link">
            <div class="freebook-cover-image">
                <img :src="book.showCoverImage" :alt="book.title">
            </div>
            <div class="freebook-info">
                <div class="freebook-title">
                    <h4>{{ book.showTitle }}</h4>
                </div>
                <span class="freebook-small">作者：{{ book.author }}著</span>
                <span class="freebook-small">出版商：{{ book.publisher }}</span>
                <div class="check-detail">
                    查看詳細資料
                    <i class="fas fa-arrow-right"></i>
                </div>
            </div>
        </a>
    </div>
</div>
</template>

<script>
export default {
    props: ['book'],
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