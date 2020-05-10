<template>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <table id="FilterTable" class="table">
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>電話</th>
                            <th>生日</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <paginate-custom @updatePage="getBorrowerList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['borrowers', 'pageNum', 'totalPage'],
    data(){
        return {

        }
    },
    methods: {
        getBorrowerList(pageNum) {
            this.$emit('update-page-num', pageNum);
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