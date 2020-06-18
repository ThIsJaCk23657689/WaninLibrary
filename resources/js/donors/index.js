Vue.component('donors-table', require('./../components/Donors/DonorsTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#donor',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            donors: [],
            DataTotalCount: 0,
            exposure: 0,
            orderby: 2,
            type: 0,
            keywords: '',
        }
    },
    methods: {
        changeKeywordsType(keywords, type, exposure, orderby) {
            this.exposure = exposure;
            this.keywords = keywords;
            this.orderby = orderby;
            this.type = type;
            this.updateDonors(this.pageNum, true)
        },
        changeOrder(orderby) {
            this.orderby = orderby;
            this.updateDonors(this.pageNum, true)
        },
        changeExposure(exposure) {
            this.exposure = exposure;
            this.updateDonors(this.pageNum, true)
        },
        updateDonors(pageNum, first_page) {
            if (first_page) {
                this.pageNum = 1;
            } else {
                this.pageNum = pageNum;
            }

            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;
            let exposure = this.exposure;
            let keywords = this.keywords;
            let type = this.type;
            let orderby = this.orderby;

            let DonorsGetList = $('#DonorsGetList').html();
            $('.dataTables_processing', $('#DonorsDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(DonorsGetList, {
                params: {
                    skip: skip,
                    take: take,
                    keywords: keywords,
                    type: type,
                    exposure: exposure,
                    first_page: first_page,
                    orderby: orderby,
                }
            }).then(response => {
                this.donors = response.data.donors;
                this.DataTotalCount = response.data.DataTotalCount;
                this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
                $('.dataTables_processing', $('#DonorsDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#DonorsDataTable').dataTable().fnClearTable();
                if (this.donors.length != 0) {
                    $('#DonorsDataTable').dataTable().fnAddData(this.donors);
                }
                this.refreshDeleteBtn();
            }).catch(error => {
                console.log(error);
            });
        },
        refreshDeleteBtn() {
            let $vm = this;
            $('.delete-btn').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: '注意！',
                    text: "你確定要刪除此捐贈人嗎？",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '確認',
                    cancelButtonText: '取消',
                }).then((result) => {
                    if (result.value) {
                        $.showLoadingModal();
                        let $url = $(this).next().html();
                        axios.post($url, {
                            _method: 'DELETE'
                        }).then(response => {
                            console.log(response);
                            $.showSuccessModal('刪除成功！');
                            $vm.updateDonors($vm.pageNum, true);
                        }).catch(error => {
                            $.showErrorModal(error);
                        });
                    }
                });
            });
        }
    },
    created() {
        let DonorsGetList = $('#DonorsGetList').html();
        axios.get(DonorsGetList).then(response => {
            this.donors = response.data.donors;
            this.DataTotalCount = response.data.DataTotalCount;
            this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);

            $('#DonorsDataTable').on('draw.dt', function() {
                console.log('drawing a table');
            }).on('init.dt', function() {
                console.log('intial a table');
            }).dataTable({
                data: this.donors,
                columns: [
                    { data: 'index' },
                    { data: 'name' },
                    { data: 'showContact' },
                    { data: 'showExposure' },
                    { data: 'donateAmount' },
                    { data: 'created_at' },
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
            this.refreshDeleteBtn();
        });
    },
    mounted() {

    }
});