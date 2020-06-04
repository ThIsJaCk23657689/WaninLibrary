Vue.component('bar-chart', require('./../components/Partials/Charts/BarChat.vue').default);
Vue.component('chart-card', require('./../components/Chart/ChartCard.vue').default);

const backend = new Vue({
    el: '#backend',
    data() {
        return {
            BarChartByCategoryData: [],
            BarChartByCategoryLabel: [],
        }
    },
    methods: {
        getBarChartByCategoryData() {
            let $url = $('#getBookCountByCategoryURL').text();
            axios.get($url).then(response => {
                this.BarChartByCategoryData = response.data.res.count;
                this.BarChartByCategoryLabel = response.data.res.label;
                console.log(response.data);
            }).catch(error => {
                console.error('抓取書籍分類比例時發生錯誤，訊息：' + error);
                $.showErrorModal(error);
            });
        }
    },
    created() {
        this.getBarChartByCategoryData();
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
    },
    mounted() {

    }
});

const app = new Vue({
    el: '#chart_card',
    data() {
        return {

        }
    },
    methods: {

    },
    created() {

    },
    mounted() {

    }
});