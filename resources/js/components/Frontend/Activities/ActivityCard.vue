<template>
<div class="activity-card">
    <div class="activity-card-date">
        <h3>{{ activity.showDay }}</h3>
        <span>{{ activity.showMonth }}<br>{{ activity.showYear }}</span>
    </div>
    <div class="activity-card-image">
        <a :href="activity.detailURL" class="image-link">
            <div class="cover-image">
                <img :src="activity.showCoverImage" alt="活動圖片">
                <div class="image-gray"></div>
            </div>
        </a>
    </div>
    <div class="activity-card-title">
        <a :href="activity.detailURL" class="title-link">
           {{ activity.showTitle }}
        </a>
    </div>
</div>
</template>

<script>
export default {
    props: ['activity'],
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
