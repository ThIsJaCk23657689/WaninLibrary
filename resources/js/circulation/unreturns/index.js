Vue.component('unreturns-table', require('./../../components/Circulation/Unreturns/UnreturnTable.vue').default);
Vue.component('paginate-custom', require('./../../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#unreturn',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            unreturns: [],
            DataTotalCount: 0,
        }
    },
    methods: {
        updateUnreturns(pageNum, filter, keyword, order, first_page) {
            let UnreturnsGetList = $('#UnreturnsGetList').html();

            if (first_page) {
                this.pageNum = 1;
            } else {
                this.pageNum = pageNum;
            }

            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            $('.dataTables_processing', $('#UnreturnsDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(UnreturnsGetList, {
                params: {
                    skip: skip,
                    take: take,

                    filter_status: filter.status,
                    filter_noticed: filter.noticed,
                    keyword_column: keyword.column,
                    keyword_content: keyword.content,
                    order_column: order.column,
                    order_dir: order.dir,

                    first_page: first_page,
                }
            }).then(response => {
                this.unreturns = response.data.unreturns;
                this.DataTotalCount = response.data.DataTotalCount;
                this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
                $('.dataTables_processing', $('#UnreturnsDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#UnreturnsDataTable').dataTable().fnClearTable();
                if (this.unreturns.length != 0) {
                    $('#UnreturnsDataTable').dataTable().fnAddData(this.unreturns);
                }
            }).catch(error => {
                console.log(error);
                $.showErrorModal(error);
            });
        },
    },
    created() {
        let UnreturnsGetList = $('#UnreturnsGetList').html();

        $.showLoadingModal();
        axios.get(UnreturnsGetList).then(response => {
            this.unreturns = response.data.unreturns;
            this.DataTotalCount = response.data.DataTotalCount;
            this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);

            $('#UnreturnsDataTable').on('draw.dt', function() {
                console.log('drawing a table');
            }).on('init.dt', function() {
                console.log('intial a table');
            }).dataTable({
                data: this.unreturns,
                columns: [
                    { data: 'index' },
                    { data: 'borrowerLink' },
                    { data: 'bookLink' },
                    { data: 'showStatus' },
                    { data: 'borrow_date' },
                    { data: 'return_date' },
                    { data: 'showNoticed' },
                    { data: 'action' },
                ],
                lengthChange: false,
                searching: false,
                pageLength: this.rowsPerPage,
                info: false,
                paging: false,
                processing: true,
                "ordering": false
            });
            $.closeModal();
        });
    },
    mounted() {

    }
});