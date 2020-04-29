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
                            <td>{{ book.title }}</td>
                            <td>Hello</td>
                            <td>{{ book.status }}</td>
                            <td>Hello</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> -->
    <paginate
        :page-count="this.total_page"
        :click-handler="chagePage"
        :page-range="5"
        :margin-pages="2"
        :prev-text="'Prev'"
        :next-text="'Next'"
        :container-class="'pagination'"
        :page-class="'page-item'"
        :page-link-class="'page-link'"
        :prev-class="'page-item'"
        :next-class="'page-item'"
        :prev-link-class="'page-link'"
        :next-link-class="'page-link'"
        :active-class="'active'">
    </paginate>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['books', 'total_page'],
    data(){
        return {

        }
    },
    methods: {
        chagePage (pageNum){
            console.log(pageNum);
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