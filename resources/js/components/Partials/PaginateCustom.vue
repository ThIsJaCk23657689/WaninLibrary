<template>
    <paginate
        :value="this.currentPage"
        :page-count="this.totalPage"
        :click-handler="chagePage"
        :page-range="3"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'pagination'"
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
    props: ['currentPage', 'totalPage'],
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