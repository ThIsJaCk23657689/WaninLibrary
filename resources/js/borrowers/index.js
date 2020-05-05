Vue.component('borrowers-table', require('./../components/Borrowers/BorrowersTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#borrower',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            borrowers: []
        }
    },
    methods: {
        updateBorrowers(pageNum) {
            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            let BorrowersGetList = $('#BorrowersGetList').html();
            $('.dataTables_processing', $('#BorrowersDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(BorrowersGetList, {
                params: {
                    skip: skip,
                    take: take
                }
            }).then(response => {
                this.borrowers = response.data.borrowers;
                $('.dataTables_processing', $('#BorrowersDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#BorrowersDataTable').dataTable().fnClearTable();
                if (this.borrowers.length != 0) {
                    $('#BorrowersDataTable').dataTable().fnAddData(this.borrowers);
                }
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created(){
        let BorrowersGetList = $('#BorrowersGetList').html();
        axios.get(BorrowersGetList).then(response => {
            this.borrowers = response.data.borrowers;

            $('#BorrowersDataTable').on('draw.dt', function () {
                console.log('drawing a table');
            }).on('init.dt', function () {
                console.log('intial a table');
            }).dataTable({
                data: this.borrowers,
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'tel' },
                    { data: 'showAgencyName' },
                    { data: 'borrowCounts' },
                    { data: 'expiredCounts' },
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