Vue.component('borrow-logs-table', require('./../components/BorrowLogs/BorrowLogsTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#borrowLog',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            borrowLogs: []
        }
    },
    methods: {
        updateBorrowLog(pageNum) {
            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            let BorrowLogsGetList = $('#BorrowLogsGetList').html();
            $('.dataTables_processing', $('#BorrowLogsDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(BorrowLogsGetList, {
                params: {
                    skip: skip,
                    take: take
                }
            }).then(response => {
                this.borrowLogs = response.data.logs;
                $('.dataTables_processing', $('#BorrowLogsDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#BorrowLogsDataTable').dataTable().fnClearTable();
                if (this.borrowLogs.length != 0) {
                    $('#BorrowLogsDataTable').dataTable().fnAddData(this.borrowLogs);
                }
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created() {
        let BorrowLogsGetList = $('#BorrowLogsGetList').html();
        axios.get(BorrowLogsGetList).then(response => {
            this.borrowLogs = response.data.logs;

            $('#BorrowLogsDataTable').on('draw.dt', function() {
                console.log('drawing a table');
            }).on('init.dt', function() {
                console.log('intial a table');
            }).dataTable({
                data: this.borrowLogs,
                columns: [
                    { data: 'id' },
                    { data: 'borrower_id' },
                    { data: 'borrower_name' },
                    { data: 'book_id' },
                    { data: 'showTitle' },
                    { data: 'callnum' },
                    { data: 'showStatus' },
                    { data: 'created_at' },
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
        this.totalPage = Math.ceil($('#DataTotalCount').html() / this.rowsPerPage);
    }
});
