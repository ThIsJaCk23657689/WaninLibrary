Vue.component('donors-table', require('./../components/Donors/DonorsTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#donor',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            donors: []
        }
    },
    methods: {
        updateDonors(pageNum) {
            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            let DonorsGetList = $('#DonorsGetList').html();
            $('.dataTables_processing', $('#DonorsDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(DonorsGetList, {
                params: {
                    skip: skip,
                    take: take
                }
            }).then(response => {
                this.donors = response.data.donors;
                $('.dataTables_processing', $('#DonorsDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#DonorsDataTable').dataTable().fnClearTable();
                if (this.donors.length != 0) {
                    $('#DonorsDataTable').dataTable().fnAddData(this.donors);
                }
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created(){
        let DonorsGetList = $('#DonorsGetList').html();
        axios.get(DonorsGetList).then(response => {
            this.donors = response.data.donors;

            $('#DonorsDataTable').on('draw.dt', function () {
                console.log('drawing a table');
            }).on('init.dt', function () {
                console.log('intial a table');
            }).dataTable({
                data: this.donors,
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'showContact' },
                    { data: 'showExposure' },
                    { data: 'donateAmount' },
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