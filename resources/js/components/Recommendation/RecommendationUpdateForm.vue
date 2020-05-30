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

                <div class="row" v-for="(book, index) in books" :key="index">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><span class="text-danger mr-2">*</span>第{{ index+1 }}本</label>
                            <div :id="'book_input_' + index" class="input-group mb-3">
                                <input type="text" class="form-control" :value="book.showTitle" readonly>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark" @click="startUpdate(index)">編輯</button>
                                </div>
                            </div>
                            <div :id="'book_select_' + index" style="display: none;">
                                <select-book-custom ref="BookOption" :select-index="index" :placeholder="'請輸入書本名稱'" @search="onSearch" @update-value="updateValue"></select-book-custom>
                            </div>
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
                book_list: [],

                options: [],
                bookValues: [null, null, null, null, null, null, null, null, null, null],
            }
    },
    methods: {
        onSearch(search, loading, index) {
            loading(true);
            this.search(loading, search, this, index);
        },
        search: _.debounce((loading, search, vm, index) => {
            axios.get(vm.RecommendationGetBookListURL, {
                params:{
                    keyword: search
                }
            }).then(response => {
                    // console.log(response.data.book_list);
                    vm.options[index] = response.data.book_list;
                    vm.$refs.BookOption[index].changeOptions(vm.options[index]);
                    console.log(vm);

                    console.log(vm.options[index]);
                    loading(false);
                });
        }, 350),
        updateValue(value, index){
            this.bookValues[index] = value;
            // console.log({value, index});
        },
        startUpdate(index){
            $('#book_input_' + index).slideUp();
            $('#book_select_' + index).slideDown();
        },

        recommendationUpdateForm(e) {
            let url = this.RecommendationUpdateURL;
            let data = $(e.target).serializeObject();
            let formData = new FormData($(e.target)[0]);
            formData.append('_method', 'patch');
            for(let i = 0; i < 10; i++){
                if(this.bookValues[i] != null){
                    formData.append('book_ids[' + i +']', this.bookValues[i]);
                }
            }

            // console.log(formData);
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
img {
  height: auto;
  max-width: 2.5rem;
  margin-right: 1rem;
}

.d-center {
  display: flex;
  align-items: center;
}

.selected img {
  width: auto;
  max-height: 23px;
  margin-right: 0.5rem;
}

.v-select .dropdown li {
  border-bottom: 1px solid rgba(112, 128, 144, 0.1);
}

.v-select .dropdown li:last-child {
  border-bottom: none;
}

.v-select .dropdown li a {
  padding: 10px 20px;
  width: 100%;
  font-size: 1.25em;
  color: #3c3c3c;
}

.v-select .dropdown-menu .active > a {
  color: #fff;
}


</style>
