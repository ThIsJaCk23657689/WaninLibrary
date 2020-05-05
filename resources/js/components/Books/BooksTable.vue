<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>書本列表
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
                    <!-- <tbody>
                        <tr v-for="book in books" :key="book.id">
                            <td>{{ book.id }}</td>
                            <td>{{ book.showTitle }}</td>
                            <td>0</td>
                            <td>{{ book.showStatus }}</td>
                            <td>
                                <a href="#" class="btn btn-md btn-info">
									<i class="fas fa-info-circle"></i>
								</a>
								<a href="#" class="btn btn-md btn-success">
									<i class="fas fa-pencil-alt"></i>
								</a>
								<a href="#" class="btn btn-md btn-danger">
									<i class="far fa-trash-alt"></i>
								</a>
                            </td>
                        </tr>
                    </tbody> -->
                </table>
            </div>
        </div>
        <div class="card-footer">
            <paginate-custom @updatePage="getBookList" :pageNum="pageNum" :totalPage="totalPage"></paginate-custom>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['books', 'rowsPerPage', 'pageNum' ,'totalPage'],
    data(){
        return {
            
        }
    },
    methods: {
        getBookList (pageNum){
            this.$emit('update-book', pageNum);
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