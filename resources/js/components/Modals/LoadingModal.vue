<template>
<!-- data-backdrop="static" -->
<div class="modal fade" id="LoadingModal" tabindex="-1" role="dialog" aria-labelledby="LoadingModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="height:55vh;">
            <div class="modal-body">
                <div class="container-fluid h-100">
                    <div class="row justify-content-center h-100">
                        <div class="my-auto">
                            <div class="row justify-content-center">
                                <div id="modal_spinner" class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">讀取中...</span>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div id="modal_good" class="swal2-icon swal2-success swal2-animate-success-icon" style="display: none;">
                                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                    <span class="swal2-success-line-tip"></span>
                                    <span class="swal2-success-line-long"></span>
                                    <div class="swal2-success-ring"></div> 
                                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                </div>
                                <div id="modal_error" class="swal2-icon swal2-error swal2-animate-error-icon" style="display: none;">
                                    <span class="swal2-x-mark">
                                        <span class="swal2-x-mark-line-left"></span>
                                        <span class="swal2-x-mark-line-right"></span>
                                    </span>
                                </div>
                                <div class="f-modal-icon f-modal-warning scaleWarning">
                                    <span class="f-modal-body pulseWarningIns"></span>
                                    <span class="f-modal-dot pulseWarningIns"></span>
                                </div>
                            </div>

                            <div class="row justify-content-center my-2">
                                <span id="modal_msg" class="text-center">正在讀取</span>
                            </div>

                            <div class="row justify-content-center my-2">
                                <a href="#" id="modal_link" class="btn btn-md btn-dark" style="display:none;">返回列表</a>
                            </div>

                            <div class="row justify-content-center my-2">
                                <button type="button" id="modal_close" class="btn btn-md btn-dark" data-dismiss="modal" style="display:none;">返回</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: [],
    data(){
        return {
            
        }
    },
    methods: {
        initalModal(){
            // 初始化並顯示 Loading Modal
            $('#modal_good').css({'display':'none'});
            $('#modal_error').css({'display':'none'});
            $('#modal_spinner').slideDown();
            $('#modal_msg').html('請稍等...');
            $('#modal_link').slideUp();
            $('#modal_close').slideUp();
            $('#LoadingModal').modal('show');
        },
        closeModal(){
            // 關閉 Loading Modal
            setTimeout(function(){
                $('#LoadingModal').modal('hide')
            }, 500);
        },
        warningResponse(message){
            // 顯示警告訊息
            $('#modal_spinner').css({'display':'none'});
            $('#modal_msg').html(message);
            $('#modal_close').slideDown();
        },
        successfulResponse(message, url){
            // 顯示成功的訊息 message為訊息，url為欲前往之連結
            $('#modal_good').css({'display':'flex'});
            $('#modal_spinner').css({'display':'none'});
            $('#modal_msg').html(message);
            $('#modal_link').attr('href', url);
            $('#modal_link').slideDown();
        },
        failureResponse(error){
            // 顯示錯誤的訊息 message為訊息
            $('#modal_error').css({'display':'flex'});
            $('#modal_spinner').css({'display':'none'});
            $('#modal_msg').html('發生錯誤！<br>錯誤訊息：' + error.response.data.message + '<br>');
            $('#modal_close').slideDown();

            if(error.response.data.errors == null){
                alert('錯誤訊息：' + error.response.data.message + '\n請聯絡系統設計師處理。');
            }else{
                let $key = Object.keys(error.response.data.errors);
                $key.forEach(function(item, index){
                    $('#modal_msg').append(error.response.data.errors[item]+ '<br>');
                    $('#' + item).addClass('is-invalid');
                });
            }
        }
    },
    created() {
        
    },
    mounted() {
        
    },
}
</script>

<style>
</style>