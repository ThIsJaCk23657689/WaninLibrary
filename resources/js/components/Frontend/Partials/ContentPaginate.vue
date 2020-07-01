<template>
<div class="row">
    <div class="content-paginate-container">

        <ul v-if="totalPage <= 7" class="content-paginate">
            <li>
                <span v-if="currentPage > 1" @click="prevPage">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </span>
            </li>
            <li v-for="n in totalPage" :key="n">
                <span v-if="n == currentPage" class="activated">{{ n }}</span>
                <span v-else @click="chagePage">{{ n }}</span>
            </li>
            <li>
                <span v-if="currentPage != totalPage" @click="nextPage">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
        </ul>

        <ul v-if="totalPage > 7" class="content-paginate">
            <li>
                <span v-if="currentPage != 1" @click="prevPage">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </span>
            </li>

            <!-- 前半段 -->
            <div v-if="currentPage <= 4" class="d-inline">
                <li v-for="n in 5" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
            </div>
            <div v-else-if="currentPage > (totalPage - 4)" class="d-inline">
                <li v-for="n in 3" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
            </div>
            <div v-else class="d-inline">
                <li v-for="n in 2" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
            </div>

            <li class="disabled">...</li>

            <div v-if="currentPage > 4 && currentPage < (totalPage - 3)" class="d-inline">
                <li v-for="n in range(currentPage - 1, currentPage + 1)" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
                <li class="disabled">...</li>
            </div>

            <!-- 後半段 -->
            <div v-if="currentPage > (totalPage - 4)" class="d-inline">
                <li v-for="n in range(totalPage - 4, totalPage)" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
            </div>
            <div v-else-if="currentPage <= 4" class="d-inline">
                <li v-for="n in range(totalPage - 2, totalPage)" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
            </div>
            <div v-else class="d-inline">
                <li v-for="n in range(totalPage - 1, totalPage)" :key="n">
                    <span v-if="n == currentPage" class="activated">{{ n }}</span>
                    <span v-else @click="chagePage">{{ n }}</span>
                </li>
            </div>

            <li>
                <span v-if="currentPage != totalPage" @click="nextPage">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
        </ul>

    </div>
</div>
</template>

<script>
export default {
    props: ['currentPage', 'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        range(start, end){
            let result = [];
            for(let i = start; i <= end; i++){
                result.push(i);
            }
            return result;
        },
        chagePage(e){
            let value = parseInt($(e.target).text());
            this.$emit('chage-page', value);
        },
        nextPage(){
            this.$emit('chage-page', this.currentPage + 1);
        },
        prevPage(){
            this.$emit('chage-page', this.currentPage - 1);
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
