Vue.component('borrow-logs-table', require('./../components/BorrowLogs/BorrowLogsTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#borrowLog',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            borrowLogs: [],
            DataTotalCount: 0,
            status: 4,
            keywords: '',
            start_date: '',
            end_date: '',

        }
    },
    methods: {
        changeStatus(status) {
            this.status = status;
            this.updateBorrowLog(this.pageNum, true)
        },
        changeKeywords(keywords) {
            this.keywords = keywords;
            this.updateBorrowLog(this.pageNum, true)
        },
        changeRange(start_date, end_date) {
            this.start_date = start_date;
            this.end_date = end_date;
            this.updateBorrowLog(this.pageNum, true)
        },
        updateBorrowLog(pageNum, first_page) {
            if (first_page) {
                this.pageNum = 1;
            } else {
                this.pageNum = pageNum;
            }
            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;
            let status = this.status;
            let keywords = this.keywords;
            let start_date = this.start_date;
            let end_date = this.end_date;

            let BorrowLogsGetList = $('#BorrowLogsGetList').html();
            $('.dataTables_processing', $('#BorrowLogsDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(BorrowLogsGetList, {
                params: {
                    skip: skip,
                    take: take,
                    status: status,
                    keywords: keywords,
                    start_date: start_date,
                    end_date: end_date
                }
            }).then(response => {
                console.log(response);
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
            this.DataTotalCount = response.data.DataTotalCount;
            this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
            this.borrowLogs = response.data.logs;

            $('#BorrowLogsDataTable').on('draw.dt', function() {
                console.log('drawing a table');
            }).on('init.dt', function() {
                console.log('intial a table');
            }).dataTable({
                data: this.borrowLogs,
                columns: [
                    { data: 'id' },
                    { data: 'borrower_name' },
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

    }
});