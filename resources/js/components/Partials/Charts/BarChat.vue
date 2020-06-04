<template>
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-chart-area mr-2"></i>
		書籍分類比例
	</div>
	<div class="card-body">
		<canvas :id="canvasId" width="100%" height="30"></canvas>
	</div>
</div>
</template>

<script>
export default {
    props: {
        canvasId: {
            type: String,
        },
        data: {
            type: Array
        },
        label:{
            type: Array
        }

    },
    data(){
        return {
            BarChartByCategoryLabel:[],
            BarChartByCategoryData:[],
            maxValue: null
        }
    },
    methods: {
        init(){

            let $url = $('#getBookCountByCategoryURL').text();
            let ctx = document.getElementById(this.canvasId);
            axios.get($url).then(response => {
                this.BarChartByCategoryData = response.data.res.count;
                this.BarChartByCategoryLabel = response.data.res.label;
                this.maxValue = response.data.res.maxValue;
                console.log('aa '+this.maxValue);
                 let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: this.BarChartByCategoryLabel,
                        datasets: [{
                            label: "本數",
                            backgroundColor: "rgba(2,117,216,1)",
                            borderColor: "rgba(2,117,216,1)",
                            data: this.BarChartByCategoryData,
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: '總類'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 13
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: this.maxValue,
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    display: true
                                }
                            }],
                        },
                        legend: {
                            display: false
                        }
                    }
                });
                console.log(response.data);
            }).catch(error => {
                console.error('抓取書籍分類比例時發生錯誤，訊息：' + error);
                $.showErrorModal(error);
            });



        }
    },
    created(){

    },
    mounted(){
        this.init();
    }
}
</script>

<style>
</style>
