<template>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" id="unreturn_update_form" action="#" @submit.prevent="unreturnUpdateForm">
            
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <div class="form-group">
                        <label for="noticed">通知狀態</label>
                        <select id="noticed" name="noticed" class="form-control" v-bind:value="unreturn.noticed">
                            <option value="1">郵件電話皆已通知</option>
                            <option value="2">郵件已通知、電話未通知</option>
                            <option value="3">郵件未通知、電話已通知</option>
                            <option value="4">郵件電話皆未通知</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="offset-md-2 col-md-4">
                    <div class="form-group">
                        <label for="borrow_date">借閱日期</label>
                        <input id="borrow_date" name="borrow_date" type="text" class="form-control" v-model="unreturn.borrow_date" autocomplete="off" @change="checkDate">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="return_date">逾期日期</label>
                        <input id="return_date" name="return_date" type="text" class="form-control" v-model="unreturn.return_date" autocomplete="off" @change="checkDate">
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-block btn-success">
                        確認修改
                    </button>
                    <a :href="UnreturnIndexURL" class="btn btn-block btn-danger">
                        返回列表
                    </a>
                </div>
            </div>

        </form>
    </div>
</div>
</template>

<script>
export default {
    props: ['unreturn'],
    data(){
        return {
            UnreturnIndexURL: $('#UnreturnIndexURL').html(),
            UnreturnUpdateURL: $('#UnreturnUpdateURL').html(),
        }
    },
    methods: {
        checkDate(){
            let $start_date = this.unreturn.borrow_date;
            let $end_date = this.unreturn.return_date;

            console.log($start_date);
            console.log($end_date);
        },
        unreturnUpdateForm(e) {
            let url = this.UnreturnUpdateURL;
            let data = $(e.target).serializeObject();

            $.showLoadingModal();
            axios.patch(url, data).then(response => {
                $.showSuccessModal('編輯成功', response.data.url);
            }).catch((error) => {
                console.error('編輯借閱人時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        }
    },
    created(){

    },
    mounted(){
        let vm = this;
        $("#borrow_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
            onSelect: function(dateText) {
                let $start_date = dateText;
                let $end_date = vm.unreturn.return_date;
                let $book_created_date = vm.unreturn.book_created_at;

                $start_date.replace(/-/g, "/");
                $end_date.replace(/-/g, "/");
                $book_created_date.replace(/-/g, "/");

                if(Date.parse($start_date).valueOf() >= Date.parse($end_date).valueOf()){
                    $.showWarningModal('借閱日期不能晚於或等於逾期日期！');
                    $("#borrow_date").val(vm.unreturn.borrow_date);
                    return false;
                }

                if(Date.parse($start_date).valueOf() < Date.parse($book_created_date).valueOf()){
                    $.showWarningModal('借閱日期不能早於書本的創建日期！');
                    $("#borrow_date").val(vm.unreturn.borrow_date);
                    return false;
                }

                vm.unreturn.borrow_date = dateText
            }
        });

        $("#return_date").datepicker({
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "-80:+0",
            onSelect: function(dateText) {
                let $start_date = vm.unreturn.borrow_date;
                let $end_date = dateText;

                $start_date.replace(/-/g, "/");
                $end_date.replace(/-/g, "/");
                
                if(Date.parse($start_date).valueOf() >= Date.parse($end_date).valueOf()){
                    $.showWarningModal('逾期日期不能早於或等於借閱日期！');
                    $("#return_date").val(vm.unreturn.return_date);
                    return false;
                }
                vm.unreturn.return_date = dateText;
            }
        });
    }
}
</script>

<style>
</style>