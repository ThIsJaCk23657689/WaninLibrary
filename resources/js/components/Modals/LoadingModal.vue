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
                                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                                    <span class="sr-only">讀取中...</span>
                                </div>
                            </div>
                            <div class="my-2">
                                <span id="LoadingMsg">正在讀取</span>
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