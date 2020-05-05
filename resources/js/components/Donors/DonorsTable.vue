<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>借閱人列表
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="DonorsDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
							<th>名稱</th>
							<th>聯絡方式</th>
							<th>曝光程度</th>
							<th>捐贈數量</th>
							<th>操作</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getDonorList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['donors', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {
            
        }
    },
    methods: {
        getDonorList (pageNum){
            this.$emit('update-donors', pageNum);
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