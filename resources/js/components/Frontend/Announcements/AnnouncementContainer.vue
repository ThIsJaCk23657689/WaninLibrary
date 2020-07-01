<template>
<div class="row announcement-container">
    <div class="col-md-12">
        <announcement-row v-for="announcement in announcements" :announcement="announcement" :key="announcement.id"></announcement-row>
        <span class="not-found-message" v-if="announcements.length == 0">
            很抱歉，無法找到您所查詢的資料，請重新查詢謝謝。
        </span>
    </div>
</div>
</template>

<script>
export default {
    props: ['announcements'],
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