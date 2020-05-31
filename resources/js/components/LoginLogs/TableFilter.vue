<template>
<div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <button id="search-by-time-range-btn" type="button" class="btn btn-block btn-primary">依日期範圍查詢</button>
        </div>
        <!-- <div class="col-md-3">
            <button id="search-by-date-btn" type="button" class="btn btn-block btn-primary">依日期查詢</button>
        </div>
        <div class="col-md-3">
            <button id="search-by-month-btn" type="button" class="btn btn-block btn-primary">依月份查詢</button>
        </div>
        <div class="col-md-3">
            <button id="search-by-year-btn" type="button" class="btn btn-block btn-primary">依年份查詢</button>
        </div> -->
    </div>

    <div class="row justify-content-center">
        <!-- 依日期範圍查詢 -->
        <div class="col-md-9" style="display:none" id="search-by-time-range-form">
            <form method="GET" id="get_login_logs_by_time_range" :action="getLoginLogsByTimeRangeURL" @submit.prevent="GetListByDateTime">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <select name="type" id="type" class="form-control">
                            <option value="1">依登入日期</option>
                            <option value="2">依登出日期</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input id="start_date" name="start_date" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020-01-01">
                    </div>
                    <div class="col-md-0 text-center py-1">
                        <label for="" class="">到</label>
                    </div>
                    <div class="col-md-3">
                        <input id="end_date" name="end_date" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020-02-01">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- 依日期查詢 -->
        <div class="col-md-6" style="display:none" id="search-by-date-form">
            <form method="GET" id="get_login_logs_by_date" :action="getLoginLogsByDateURL" @submit.prevent="GetListByDateTime">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select name="type" id="type" class="form-control">
                            <option value="1">登入日期</option>
                            <option value="2">登出日期</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input id="date" name="date" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020-01-01">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- 依月份查詢 -->
        <div class="col-md-6" style="display:none" id="search-by-month-form">
            <form method="GET" id="get_login_logs_by_month" :action="getLoginLogsByMonthURL" @submit.prevent="GetListByDateTime">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select name="type" id="type" class="form-control">
                            <option value="1">登入日期</option>
                            <option value="2">登出日期</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input id="year_month" name="year_month" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020-05">
                    </div>
                    <!-- <div class="col-md-2">
                        <select name="type" id="month" class="form-control">
                            <option value="01">1月</option>
                            <option value="02">2月</option>
                            <option value="03">3月</option>
                            <option value="04">4月</option>
                            <option value="05">5月</option>
                            <option value="06">6月</option>
                            <option value="07">7月</option>
                            <option value="08">8月</option>
                            <option value="09">9月</option>
                            <option value="10">10月</option>
                            <option value="11">11月</option>
                            <option value="12">12月</option>
                        </select>
                    </div> -->
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- 依年份查詢 -->
        <div class="col-md-6" style="display:none" id="search-by-year-form">
            <form method="GET" id="get_login_logs_by_year" :action="getLoginLogsByYearURL" @submit.prevent="GetListByDateTime">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select name="type" id="type" class="form-control">
                            <option value="1">登入日期</option>
                            <option value="2">登出日期</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input id="year" name="year" type="text" class="form-control mb-2" value="" autocomplete="off" required placeholder="例：2020">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            確認
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</template>

<script>
export default {
    props: [],
    data(){
        return {
            getLoginLogsByDateURL : $('#getLoginLogsByDate').html(),
            getLoginLogsByMonthURL : $('#getLoginLogsByMonth').html(),
            getLoginLogsByYearURL : $('#getLoginLogsByYear').html(),
            getLoginLogsByTimeRangeURL : $('#getLoginLogsByTimeRange').html(),
            FormErrorsMsg: [],
        }
    },
    methods: {
        GetListByDateTime: function(e){
            let url = $(e.target).attr('action');
            let data = $(e.target).serializeObject();
            console.log(data)
            axios.get(url, {
                params: data
            }).then(response => {
                console.log(response);
                this.$emit('refresh-table', response.data);
            }).catch((error) => {
                console.error('查詢時發生錯誤，錯誤訊息：' + error);
            });;
        },
    },
    created(){

    },
    mounted(){
        // 依日期
        // $("#date").datepicker({
        //     dateFormat: 'yy-mm-dd',
        //     changeYear: true,
        //     changeMonth: true,
        //     yearRange: "-80:+0",
        // });
        $("#start_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
        });
        $("#end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
        });
        // 依月份
        $("#year_month").datepicker({
            changeYear: true,
            changeMonth: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm',
            onClose: function(dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate('yy-mm', new Date(year, month, 1)));
            }
        });

        $("#year_month").focus(function () {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });

        // 按鈕
        $("#search-by-time-range-btn").click(function(){
            $("#search-by-time-range-form").toggle();
            $("#search-by-date-form").hide();
            $("#search-by-month-form").hide();
            $("#search-by-year-form").hide();
        });
        // $("#search-by-date-btn").click(function(){
        //     $("#search-by-date-form").toggle();
        //     $("#search-by-month-form").hide();
        //     $("#search-by-year-form").hide();
        // });
        // $("#search-by-month-btn").click(function(){
        //     $("#search-by-month-form").toggle();
        //     $("#search-by-date-form").hide();
        //     $("#search-by-year-form").hide();
        // });
        // $("#search-by-year-btn").click(function(){
        //     $("#search-by-year-form").toggle();
        //     $("#search-by-month-form").hide();
        //     $("#search-by-date-form").hide();
        // });
    }
}
</script>

<style>
</style>
