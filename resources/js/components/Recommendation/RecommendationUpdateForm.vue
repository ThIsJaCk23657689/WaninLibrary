<template>
<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" id="recommendation_update_form" action="#"  @submit.prevent="recommendationUpdateForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="recommendation_title"><span class="text-danger mr-2">*</span>標題</label>
                            <input id="recommendation_title" name="recommendation_title" type="text" class="form-control" v-model="recommendation_title" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_1"><span class="text-danger mr-2">*</span>第一本</label>
                            <select id="book_id_1" name="book_id_1" class="form-control book_ids">
                                <!-- <option :value="books[0].id">{{ books[0].title }}</option> -->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_2"><span class="text-danger mr-2">*</span>第二本</label>
                            <select id="book_id_2" name="book_id_2" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_3"><span class="text-danger mr-2">*</span>第三本</label>
                            <select id="book_id_3" name="book_id_3" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_4"><span class="text-danger mr-2">*</span>第四本</label>
                            <select id="book_id_4" name="book_id_4" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_5"><span class="text-danger mr-2">*</span>第五本</label>
                            <select id="book_id_5" name="book_id_5" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_6"><span class="text-danger mr-2">*</span>第六本</label>
                            <select id="book_id_6" name="book_id_6" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_7"><span class="text-danger mr-2">*</span>第七本</label>
                            <select id="book_id_7" name="book_id_7" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_8"><span class="text-danger mr-2">*</span>第八本</label>
                            <select id="book_id_8" name="book_id_8" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_9"><span class="text-danger mr-2">*</span>第九本</label>
                            <select id="book_id_9" name="book_id_9" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="book_id_10"><span class="text-danger mr-2">*</span>第十本</label>
                            <select id="book_id_10" name="book_id_10" class="form-control book_ids">
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-success">
                            確認修改
                        </button>
                        <a :href="RecommendationIndexURL" class="btn btn-block btn-danger">
                            取消編輯
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <loading-modal ref="loadingModal"></loading-modal>
</div>
</template>

<script>
export default {
    props: ['recommendation_title','books'],
    data(){
        return {
                RecommendationUpdateURL: $('#RecommendationUpdateURL').html(),
                RecommendationIndexURL: $('#RecommendationIndexURL').html(),
                RecommendationGetBookListURL: $('#RecommendationGetBookListURL').html(),
                book_list: []
            }
    },
    methods: {
        recommendationUpdateForm(e) {
            let url = this.RecommendationUpdateURL;
            let data = $(e.target).serializeObject();
            let formData = new FormData($(e.target)[0]);
            formData.append('_method', 'patch');
            console.log(formData);
            $.showLoadingModal();
            axios.post(url, formData).then(response => {
                $.showSuccessModal('修改成功', response.data.url, '檢視');
            }).catch((error) => {
                console.error('修改時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },

    },
    created(){
        $('.book_ids').selectpicker('refresh');
        // 生成 機構 下拉式選單
        // let AgenciesListURL = $('#AgenciesListURL').html();
        // axios.get(AgenciesListURL).then(response => {
        //     this.agencies = response.data.agencies;
        //     for(let i = 0; i < this.agencies.length; i++){
        //         $("#agency_id").append($("<option></option>").attr("value", this.agencies[i].id).text(this.agencies[i].name));
        //     }
        //     $('#agency_id').selectpicker('refresh');
        // });
    },
    mounted(){
        // console.log($('.book_ids'));
        $('.book_ids').selectpicker({
            liveSearch: true
        });

        let timer;
        let _this = this;
        $(document).on('keyup', '.book_ids .bs-searchbox input', function (e) {

            clearTimeout(timer);
            timer = setTimeout(function() {

                let RecommendationGetBookListURL = $('#RecommendationGetBookListURL').text();
                let keyword = e.target.value;
                // console.log(e.target);
                // console.log(keyword);
                // console.log(RecommendationGetBookListURL);

                axios.get(RecommendationGetBookListURL, {params:{keyword:keyword}}).then(response => {
                    console.log(response.data.book_list);
                    _this.book_list = response.data.book_list;
                    let select = $($(e.target).parents()[1]).prev().prev();
                    select.find('option').remove();
                    for(let i = 0; i < _this.book_list.length; i++){

                        select.append($("<option></option>").attr("value", _this.book_list[i].id).text(_this.book_list[i].title));
                        select.selectpicker('refresh');
                    }
                });

            }, 100);


        });
    }
}
</script>

<style>

</style>
