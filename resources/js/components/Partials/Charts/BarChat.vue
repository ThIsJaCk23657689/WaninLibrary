<template>
<div class="card mb-3">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item" id="nav_book">
                <a class="nav-link active" id="a_book" href="#"><i class="fas fa-chart-area mr-2" id="i_book"></i>書籍分類比例</a>
            </li>
            <li class="nav-item" id="nav_month">
                <a class="nav-link" id="a_month" href="#"><i class="fas fa-chart-area mr-2" id="i_month" style="display:none;"></i>月別借閱紀錄</a>
            </li>
             <li class="nav-item" id="nav_year">
                <a class="nav-link" href="#" id="a_year"><i class="fas fa-chart-area mr-2" id="i_year" style="display:none;"></i>年別借閱紀錄</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div id="div_Book">
            <canvas :id="canvasId" width="85%" height="18"></canvas>
        </div>
        <div id="div_Month" style="display:none;">
            <canvas id="BorrowLogsByMonth" width="85%" height="18"></canvas>
        </div>
        <div id="div_Year" style="display:none;">
            <canvas id="BorrowLogsByYear" width="85%" height="18"></canvas>
        </div>
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
            maxValue: null,
            maxValueYear: null,
            maxValueMonth: null,
            BorrowLogsGetListByMonthURL: $('#BorrowLogsGetListByMonthURL').text(),
            BorrowLogsGetListByYearURL: $('#BorrowLogsGetListByYearURL').text(),
            label_month:[],
            data_month:[],
            label_year:[],
            data_year:[],
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
                                    max: Math.ceil(this.maxValue / 10) * 10,
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
                // console.log(response.data);
            }).catch(error => {
                console.error('抓取書籍分類比例時發生錯誤，訊息：' + error);
                $.showErrorModal(error);
            });

        axios.get(this.BorrowLogsGetListByMonthURL).then(response => {
                this.label_month = response.data.res.date;
                this.data_month = response.data.res.count;
                this.maxValueMonth = response.data.res.maxValue;
                // console.log(response.data.res);
                // Area Chart Example
                var BorrowLogsByMonthCtx = document.getElementById("BorrowLogsByMonth");
                var BorrowLogsByMonthChart = new Chart(BorrowLogsByMonthCtx, {
                    type: 'line',
                    data: {
                        labels: this.label_month,
                        datasets: [{
                        label: "Sessions",
                        lineTension: 0.3,
                        backgroundColor: "rgba(2,117,216,0.2)",
                        borderColor: "rgba(2,117,216,1)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 50,
                        pointBorderWidth: 2,
                        data: this.data_month,
                        }],
                    },
                    options: {
                        scales: {
                        xAxes: [{
                            time: {
                            unit: 'date'
                            },
                            gridLines: {
                            display: false
                            },
                            ticks: {
                            maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                            min: 0,
                            max: Math.ceil(this.maxValueMonth / 10) * 10,
                            maxTicksLimit: 5
                            },
                            gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                            }
                        }],
                        },
                        legend: {
                        display: false
                        }
                    }
                    });
            });

        axios.get(this.BorrowLogsGetListByYearURL).then(response => {
            this.label_year = response.data.res.date;
            this.data_year = response.data.res.count;
            this.maxValueYear = response.data.res.maxValue;
            // console.log(response.data.res);
            // Area Chart Example
            var BorrowLogsByYearCtx = document.getElementById("BorrowLogsByYear");
            var BorrowLogsByYearChart = new Chart(BorrowLogsByYearCtx, {
                type: 'line',
                data: {
                    labels: this.label_year,
                    datasets: [{
                    label: "Sessions",
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: this.data_year,
                    }],
                },
                options: {
                    scales: {
                    xAxes: [{
                        time: {
                        unit: 'date'
                        },
                        gridLines: {
                        display: false
                        },
                        ticks: {
                        maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        min: 0,
                        max: Math.ceil(this.maxValueYear / 10) * 10,
                        maxTicksLimit: 5
                        },
                        gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                    },
                    legend: {
                    display: false
                    }
                }
                });
            });



        }
    },
    created(){

    },
    mounted(){
        this.init();
        $('#nav_month').click(function(e){
            $('#a_month').addClass('active');
            $('#a_year').removeClass('active');
            $('#a_book').removeClass('active');
            $('#div_Year').hide();
            $('#div_Book').hide();
            $('#div_Month').fadeIn();
            $('#i_year').hide();
            $('#i_book').hide();
            $('#i_month').fadeIn();
        });

        $('#nav_year').click(function(e){
            $('#a_month').removeClass('active');
            $('#a_book').removeClass('active');
            $('#a_year').addClass('active');
            $('#div_Book').hide();
            $('#div_Month').hide();
            $('#div_Year').fadeIn();
            $('#i_year').fadeIn();
            $('#i_book').hide();
            $('#i_month').hide();
        });

        $('#nav_book').click(function(e){
            $('#a_book').addClass('active');
            $('#a_month').removeClass('active');
            $('#a_year').removeClass('active');
            $('#div_Year').hide();
            $('#div_Month').hide();
            $('#div_Book').fadeIn();
            $('#i_book').fadeIn();
            $('#i_year').hide();
            $('#i_month').hide();

        });
    }
}
</script>

<style>
</style>
