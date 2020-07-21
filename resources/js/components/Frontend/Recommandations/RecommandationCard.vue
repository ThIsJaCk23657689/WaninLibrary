<template>
<div class="recommandation-card">
    <div class="recommandation-card-date">
        <h3>{{ recommandation.showDay }}</h3>
        <span>{{ recommandation.showMonth }}<br>{{ recommandation.showYear }}</span>
    </div>
    <div class="recommandation-card-image">
        <a :href="recommandation.detailURL" class="image-link">
            <div class="cover-image">
                <img :src="recommandation.showCoverImage" alt="活動圖片">
                <div class="image-gray"></div>
            </div>
        </a>
    </div>
    <div class="recommandation-card-title">
        <a :href="recommandation.detailURL" class="title-link">
           {{ recommandation.showTitle }}
        </a>
    </div>
</div>
</template>

<script>
export default {
    props: ['recommandation'],
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
