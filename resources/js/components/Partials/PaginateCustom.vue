<template>
    <paginate
        :value="pageNum"
        :page-count="totalPage"
        :click-handler="chagePage"
        :page-range="5"
        :margin-pages="2"
        :prev-text="'上一頁'"
        :next-text="'下一頁'"
        :container-class="'pagination justify-content-center'"
        :page-class="'page-item'"
        :page-link-class="'page-link'"
        :prev-class="'page-item'"
        :next-class="'page-item'"
        :prev-link-class="'page-link'"
        :next-link-class="'page-link'"
        :active-class="'active'">
    </paginate>
</template>

<script>
export default {
    props: {
        pageNum: {
            type: Number,
            default: 1,
        },
        totalPage: {
            type: Number
        }
    },
    data(){
        return {
            currentPageNum: this.pageNum,
        }
    },
    methods: {
        chagePage(num) {
            // this.pageNum = num;
            this.$emit('updatePage', num);
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
