<template>
<!-- data-backdrop="static" -->
<div class="modal fade" id="LoadingModal" tabindex="-1" role="dialog" aria-labelledby="LoadingModalLabel" aria-hidden="true" data-keyboard="false">
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
                            </div>

                            <div class="row justify-content-center my-2">
                                <span id="modal_msg" class="text-center">正在讀取</span>
                            </div>

                            <div class="row justify-content-center my-2">
                                <a href="#" id="modal_link" class="btn btn-md btn-dark" style="display:none;">返回列表</a>
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
    mounted() {
        console.log('LoadingModal.vue mounted.');
    },
    data(){
        return {
            
        }
    },
}
</script>

<style>
</style>