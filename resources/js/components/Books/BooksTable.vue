<template>
<div>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table mr-2"></i>書本列表
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>標題</th>
                            <th>借閱次數</th>
                            <th>狀態</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
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
    props: ['books', 'totalcount'],
    data(){
        return {
            rowsPerPage: 20,
            pageNum: 1,
            totalPage: 0,
        }
    },
    methods: {
        getBookList (pageNum){
            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            let BooksGetList = $('#BooksGetList').html();

            axios.get(BooksGetList, {
                params: {
                    skip: skip,
                    take: take
                }
            }).then(response => {
                this.$emit('update-book', response.data.books);
            });
        }
    },
    created() {
        this.totalPage = Math.ceil(this.totalcount / this.rowsPerPage)
    },
    mounted() {
        
    }
}
</script>

<style>

</style>