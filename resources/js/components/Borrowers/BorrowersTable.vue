<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>借閱人列表
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="BorrowersDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>名稱</th>
                            <th>電話</th>
                            <th>隸屬單位</th>
                            <th>借閱數量</th>
                            <th>逾期數量</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getBorrowerList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['borrowers', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {
            
        }
    },
    methods: {
        getBorrowerList (pageNum){
            this.$emit('update-borrowers', pageNum);
        }
    },
    created() {

    },
    mounted() {
        
    }
}
</script>

<style>

</style>