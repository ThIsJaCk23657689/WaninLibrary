// Vue.component('unreturn-table', require('./../../components/Circulation/Unreturns/UnreturnTable.vue').default);
// Vue.component('paginate-custom', require('./../../components/Partials/PaginateCustom.vue').default);
// Vue.component('table-button', required('./../../components/Partials/DataTable/TableButton.vue').default);
import TableButton from './../../components/Partials/DataTable/TableButton.vue';

const app = new Vue({
    el: '#unreturn',
    data() {
        return {
            perPage: ['10', '25', '50'],
            columns: [
                {
                    label: '借閱人名稱',
                    name: 'borrower_name',
                    filterable: true,
                    orderable: true,
                },
                {
                    label: '書籍名稱',
                    name: 'book_title',
                    filterable: true,
                    orderable: true,
                },
                {
                    label: '狀態',
                    name: 'showStatus',
                    filterable: true,
                    orderable: false,
                },
                {
                    label: '借閱日期',
                    name: 'borrow_date',
                    filterable: true,
                    orderable: true,
                },
                {
                    label: '期限日期',
                    name: 'return_date',
                    filterable: true,
                    orderable: true,
                },
                {
                    label: '通知狀態',
                    name: 'showNoticed',
                    filterable: true,
                    orderable: false,
                },
                // {
                //     label: '操作',
                //     name: '檢視',
                //     filterable: false,
                //     component: TableButton,
                //     event: 'click',
                //     handler: this.alertMe,
                //     classes: {
                //         'btn': true,
                //         'btn-md': true,
                //         'btn-primary': true,
                //     }
                // },
            ],
            translate: {
                nextButton: '下一頁', 
                previousButton: '上一頁', 
                placeholderSearch: '搜尋...'
            }
        }
    },
    components: {
        TableButton,
    },
    methods: {
        alertMe(data) {
            console.log(data);
            alert("hey");
        }
        // refreshUnreturns($skip, $take){
        //     $.showLoadingModal();
        //     axios.get(this.UnreturnsGetList, {
        //         params: {
        //             skip: $skip,
        //             take: $take
        //         }
        //     })
        //     .then(response => {
        //         this.unreturns = response.data.unreturns;
        //         $.closeModal();
        //     }).catch(error => {
        //         $.showErrorModal(error);
        //     });
        // }
    },
    created(){        
        // this.refreshUnreturns(0, 10);
    },
    mounted(){

    }
});