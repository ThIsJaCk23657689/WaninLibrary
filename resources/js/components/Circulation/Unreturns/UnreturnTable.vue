<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>目前已出借和逾期列表
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="BooksDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>標題</th>
                            <th>借閱次數</th>
                            <th>狀態</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getUnreturnsList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['unreturns', 'totalPage'],
    data(){
        return {
            pageNum: 1,
        }
    },
    methods: {
        getUnreturnsList(value){

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