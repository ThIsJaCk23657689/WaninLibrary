Vue.component('books-table', require('./../components/Books/BooksTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#book',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            DataTotalCount: 0,

            books: [],

            status: 0,
            category: 13,
            type: 0,
            keywords: '',
        }
    },
    methods: {
        changeStatus(status) {
            this.status = status;
            this.updateBook(this.pageNum, true)
        },
        changeKeywordsType(keywords, type, status, category) {
            this.category = category;
            this.keywords = keywords;
            this.type = type;
            this.status = status;
            this.updateBook(this.pageNum, true)
        },
        changeCategory: function(category) {
            this.category = category;
            this.updateBook(this.pageNum, true)

        },
        updateBook(pageNum, first_page) {
            if (first_page) {
                this.pageNum = 1;
            } else {
                this.pageNum = pageNum;
            }

            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;
            let status = this.status;
            let keywords = this.keywords;
            let type = this.type;
            let category = this.category;

            let BooksGetList = $('#BooksGetList').html();
            $('.dataTables_processing', $('#BooksDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(BooksGetList, {
                params: {
                    skip: skip,
                    take: take,
                    status: status,
                    keywords: keywords,
                    type: type,
                    category: category,
                }
            }).then(response => {
                this.books = response.data.books;
                this.DataTotalCount = response.data.DataTotalCount;
                this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
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
    created() {
        let BooksGetList = $('#BooksGetList').html();
        axios.get(BooksGetList).then(response => {
            this.DataTotalCount = response.data.DataTotalCount;
            this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
            this.books = response.data.books;

            $('#BooksDataTable').on('draw.dt', function() {
                console.log('drawing a table');
            }).on('init.dt', function() {
                console.log('intial a table');
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
    mounted() {
        // this.totalPage = Math.ceil($('#DataTotalCount').html() / this.rowsPerPage);
    }
});