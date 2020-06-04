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
            type: Object
        }
    },
    data(){
        return {

        }
    },
    methods: {
        init(){
            let ctx = document.getElementById(this.canvasId);

            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June"],
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: [4215, 5312, 6251, 7841, 9821, 14984],
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
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