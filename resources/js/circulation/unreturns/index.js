Vue.component('unreturn-table', require('./../../components/Circulation/Unreturns/UnreturnTable.vue').default);
Vue.component('paginate-custom', require('./../../components/Partials/PaginateCustom.vue').default);

const app = new Vue({
    el: '#unreturn',
    data() {
        return {
            UnreturnsGetList: $('#UnreturnsGetList').text(),
            unreturns: [],
        }
    },
    methods: {
        refreshUnreturns($skip, $take){
            $.showLoadingModal();
            axios.get(this.UnreturnsGetList, {
                params: {
                    skip: $skip,
                    take: $take
                }
            })
            .then(response => {
                this.unreturns = response.data.unreturns;
                $.closeModal();
            }).catch(error => {
                $.showErrorModal(error);
            });
        }
    },
    created(){        
        this.refreshUnreturns(0, 10);
    },
    mounted(){

    }
});