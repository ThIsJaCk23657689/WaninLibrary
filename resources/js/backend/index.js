Vue.component('bar-chart', require('./../components/Partials/Charts/BarChat.vue').default);

const backend = new Vue({
    el: '#backend',
    data() {
        return {
            BarChartByCategoryData: {}
        }
    },
    methods: {
        getBarChartByCategoryData(){
            let $url = 
            axios.get($url).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.error('抓取書籍分類比例時發生錯誤，訊息：' + error);
                $.showErrorModal(error);
            });
        }
    },
    created(){
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
    },
    mounted(){

    }
});