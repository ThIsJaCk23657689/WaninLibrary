Vue.component('borrowers-table', require('./../components/Borrowers/BorrowersTable.vue').default);
Vue.component('paginate-custom', require('./../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#borrower',
    data() {
        return {
            rowsPerPage: 10,
            pageNum: 1,
            totalPage: 0,
            borrowers: [],
            DataTotalCount: 0,
            status: 2,
            orderby: 2,
            activated: 2,
            type: 0,
            keywords: '',
            order_type: 'desc'
        }
    },
    methods: {
        changeStatus(status) {
            this.status = status;
            this.updateBorrowers(this.pageNum, true)
        },
        changeOrder(orderby) {
            this.orderby = orderby;
            this.updateBorrowers(this.pageNum, true)
        },
        changeKeywordsType(keywords, type, status, activated, orderby) {
            this.activated = activated;
            this.keywords = keywords;
            this.type = type;
            this.status = status;
            this.orderby = orderby;
            this.updateBorrowers(this.pageNum, true)
        },
        changeActivated(activated) {
            this.activated = activated;
            this.updateBorrowers(this.pageNum, true)
        },
        updateBorrowers(pageNum, first_page) {
            if (first_page) {
                this.pageNum = 1;
            } else {
                this.pageNum = pageNum;
            }
            let status = this.status;
            let keywords = this.keywords;
            let type = this.type;
            let activated = this.activated;
            let orderby = this.orderby;

            let skip = (pageNum - 1) * this.rowsPerPage;
            let take = this.rowsPerPage;

            let BorrowersGetList = $('#BorrowersGetList').html();
            $('.dataTables_processing', $('#BorrowersDataTable').closest('.dataTables_wrapper')).fadeIn();
            axios.get(BorrowersGetList, {
                params: {
                    skip: skip,
                    take: take,
                    status: status,
                    keywords: keywords,
                    type: type,
                    activated: activated,
                    first_page: first_page,
                    orderby: orderby,
                }
            }).then(response => {
                this.borrowers = response.data.borrowers;
                this.DataTotalCount = response.data.DataTotalCount;
                this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
                $('.dataTables_processing', $('#BorrowersDataTable').closest('.dataTables_wrapper')).fadeOut();
                $('#BorrowersDataTable').dataTable().fnClearTable();
                if (this.borrowers.length != 0) {
                    $('#BorrowersDataTable').dataTable().fnAddData(this.borrowers);
                }
                this.refreshDeleteBtn();
                this.refreshActivateBtn();
                this.refreshUnactivateBtn();
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
                    text: "你確定要刪除此借閱人嗎？",
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
                            $.showSuccessModal('刪除成功！');
                            $vm.updateBorrowers($vm.pageNum, true);
                        }).catch(error => {
                            $.showErrorModal(error);
                        });
                    }
                });
            });
        },
        refreshActivateBtn() {
            let $vm = this;
            $('.activate-btn').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: '注意！',
                    text: "你確定要停權此借閱人嗎？",
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
                        axios.post($url).then(response => {
                            $.showSuccessModal(response.data.message);
                            $vm.updateBorrowers($vm.pageNum, true);
                        }).catch(error => {
                            $.showErrorModal(error);
                        });
                    }
                });
            });
        },
        refreshUnactivateBtn() {
            let $vm = this;
            $('.unactivate-btn').click(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: '注意！',
                    text: "你確定要解鎖此借閱人嗎？",
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
                        axios.post($url).then(response => {
                            $.showSuccessModal(response.data.message);
                            $vm.updateBorrowers($vm.pageNum, true);
                        }).catch(error => {
                            $.showErrorModal(error);
                        });
                    }
                });
            });
        }
    },
    created() {
        let BorrowersGetList = $('#BorrowersGetList').html();
        axios.get(BorrowersGetList).then(response => {
            this.DataTotalCount = response.data.DataTotalCount;
            this.totalPage = Math.ceil(this.DataTotalCount / this.rowsPerPage);
            this.borrowers = response.data.borrowers;

            if (this.orderby == 2) {
                this.order_type = 'desc';
            } else {
                this.order_type = 'asc';
            }

            $('#BorrowersDataTable').on('draw.dt', function() {
                console.log('drawing a table');
            }).on('init.dt', function() {
                console.log('intial a table');
            }).dataTable({
                data: this.borrowers,
                columns: [
                    { data: 'index' },
                    { data: 'name' },
                    { data: 'tel' },
                    { data: 'showAgencyName' },
                    { data: 'borrowCounts' },
                    { data: 'expiredCounts' },
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
            this.refreshActivateBtn();
            this.refreshUnactivateBtn();
        });
    },
    mounted() {
        // this.totalPage = Math.ceil($('#DataTotalCount').html() / this.rowsPerPage);
    }
});