Vue.component('books-table', require('./../components/Books/BooksTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#book',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            books: []
        }
    },
    methods: {
        updateBook(pageNum) {
            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            let BooksGetList = $('#BooksGetList').html();
            $('.dataTables_processing', $('#BooksDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(BooksGetList, {
                params: {
                    skip: skip,
                    take: take
                }
            }).then(response => {
                this.books = response.data.books;
                $('.dataTables_processing', $('#BooksDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#BooksDataTable').dataTable().fnClearTable();
                if (this.books.length != 0) {
                    $('#BooksDataTable').dataTable().fnAddData(this.books);
                }
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created(){
        let BooksGetList = $('#BooksGetList').html();
        axios.get(BooksGetList).then(response => {
            this.books = response.data.books;

            $('#BooksDataTable').on('draw.dt', function () {
                console.log('Loading' );
            }).on('init.dt', function () {
                console.log('Loaded');
            }).dataTable({
                data: this.books,
                columns: [
                    { data: 'id' },
                    { data: 'showTitle' },
                    { data: 'borrowCounts' },
                    { data: 'showStatus' },
                    { data: 'action' },
                ],
                lengthChange: false,
                searching: false,
                pageLength: this.rowsPerPage,
                info: false,
                paging: false,
                processing: true
            });
        });
    },
    mounted(){
        this.totalPage = Math.ceil($('#DataTotalCount').html() / this.rowsPerPage);
    }
});