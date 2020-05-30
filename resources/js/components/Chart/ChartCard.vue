
<template>
<div>
    <div class="card text-center mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item" id="nav_month">
                    <a class="nav-link active" id="a_month" href="#"><i class="fas fa-chart-area mr-2" id="i_month"></i>月別借閱紀錄</a>
                </li>
                <li class="nav-item" id="nav_year">
                    <a class="nav-link" href="#" id="a_year"><i class="fas fa-chart-area mr-2" id="i_year" style="display:none;"></i>年別借閱紀錄</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div id="div_Month">
                <canvas id="BorrowLogsByMonth" width="100%" height="30"></canvas>
            </div>
            <div id="div_Year" style="display:none;">
                <canvas id="BorrowLogsByYear" width="100%" height="30"></canvas>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    props: [''],
    data(){
        return {
            BorrowLogsGetListByMonthURL: $('#BorrowLogsGetListByMonthURL').text(),
            BorrowLogsGetListByYearURL: $('#BorrowLogsGetListByYearURL').text(),
            label_month:[],
            data_month:[],
            label_year:[],
            data_year:[],
        }
    },
    methods: {

    },
    created() {
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        axios.get(this.BorrowLogsGetListByMonthURL).then(response => {
            this.label_month = response.data.res.date;
            this.data_month = response.data.res.count;
            console.log(response.data.res);
            // Area Chart Example
            var ctx = document.getElementById("BorrowLogsByMonth");
            var myLineChart = new Chart(ctx, {
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
                        max: 40000,
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
            console.log(response.data.res);
            // Area Chart Example
            var ctx = document.getElementById("BorrowLogsByYear");
            var myLineChart = new Chart(ctx, {
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
                        max: 40000,
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

    },
    mounted() {
        $('#nav_month').click(function(e){
            $('#a_month').addClass('active');
            $('#a_year').removeClass('active');
            $('#div_Year').hide();
            $('#div_Month').fadeIn();
            $('#i_year').hide();
            $('#i_month').fadeIn();
        });

        $('#nav_year').click(function(e){
            $('#a_month').removeClass('active');
            $('#a_year').addClass('active');
            $('#div_Month').hide();
            $('#div_Year').fadeIn();
            $('#i_year').fadeIn();
            $('#i_month').hide();
        });

    }
}
</script>

<style>

</style>
