import Paginate from 'vuejs-paginate';

Vue.component('paginate', Paginate);
Vue.component('login-log-table', require('./../components/LoginLogs/LoginLogTable.vue').default);
Vue.component('table-filter', require('./../components/LoginLogs/TableFilter.vue').default);

const app = new Vue({
    el: '#loginlog',
    data() {
        return {
            loginlogs: [],
            loginlogsjson: null
        }
    },
    methods: {
        refreshTable(logs) {
            this.loginlogs = logs;
            $('#LoginLogsDataTable').dataTable().fnClearTable();
            if (logs.length != 0) {
                $('#LoginLogsDataTable').dataTable().fnAddData(logs);
            }
        }
    },
    created() {
        let LoginLogsGetList = $('#LoginLogsGetList').html();
        axios.get(LoginLogsGetList).then(response => {
            // console.log(response);
            this.loginlogs = response.data;
            this.loginlogsjson = JSON.stringify(response.data);

            $('#LoginLogsDataTable').dataTable({
                data: this.loginlogs,
                columns: [
                    { data: 'id' },
                    { data: 'user_id' },
                    { data: 'user.name' },
                    { data: 'created_at' },
                    { data: 'logout_date' },
                    { data: 'url' },
                ]
            });
        });
    },
    mounted() {

    }
});