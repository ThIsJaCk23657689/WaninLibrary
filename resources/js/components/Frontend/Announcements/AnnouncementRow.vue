<template>
<div class="row announcement-row">
    <a :href="announcement.detailURL" class="announcement-link">
        <div class="announcement-new-container">
            <span class="announcement-new" v-if="announcement.isNew">NEW</span>
        </div>
        <div class="announcement-info-container">
            <div class="announcement-date">{{ announcement.created_at }}</div>
            <div class="announcement-title">{{ announcement.showTitle }}</div>
        </div>
        <div class="announcement-readmore">
            <span>閱讀更多</span>
        </div>
    </a>
</div>
</template>

<script>
export default {
    props: ['announcement'],
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
