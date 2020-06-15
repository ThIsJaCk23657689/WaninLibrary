<template>

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

            <div class="row" v-for="index in 10" :key="index">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>
                            <span class="text-danger mr-2">*</span>第{{ index }}本
                        </label>
                        <div :id="'book_input_' + index" class="input-group mb-3">
                            <input type="text" class="form-control" :value="(books[index - 1]) ? books[index - 1].showTitle : '無'" readonly>
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

            <div class="form-group row justify-content-center mt-2">
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

</template>

<script>
export default {
    data(){
        return {
                RecommendationUpdateURL: $('#RecommendationUpdateURL').html(),
                RecommendationIndexURL: $('#RecommendationIndexURL').html(),
                RecommendationGetBookListURL: $('#RecommendationGetBookListURL').html(),

				recommendation_title: null,
				books: [],

                options: [],
				bookValues: [null, null, null, null, null, null, null, null, null, null],
				bookValues_old: [null, null, null, null, null, null, null, null, null, null],
            }
    },
    methods: {
		// 及時搜尋書本
        onSearch(search, loading, index) {
            loading(true);
            this.search(loading, search, this, index);
        },
        search: _.debounce((loading, search, vm, index) => {
            axios.get(vm.RecommendationGetBookListURL, {
                params:{
                    keyword: search,
                    selectID: vm.bookValues[index - 1]
                }
            }).then(response => {
                    vm.options[index - 1] = response.data.book_list;
                    vm.$refs.BookOption[index - 1].changeOptions(vm.options[index - 1]);
					loading(false);
					
					// vm 代表vue的this
					// console.log(vm);

					// vm.options 代表的是vue中的options變數，它是一個二維陣列，列有10個(0~9)，個別儲存每個下拉式選單的選單。
					// console.log(vm.options[index - 1]);

					// 注意index數值是1到10，所以這邊記得要減1。
                });
        }, 350),

        // 更新所選好的book IDs。
        updateValue(value, index){
			// 注意index數值是1到10，所以這邊記得要減1。
            this.bookValues[index - 1] = value;
        },

        // 顯示下拉式搜尋單。
        startUpdate(index){
            $('#book_input_' + index).slideUp();
            $('#book_select_' + index).slideDown();
		},
		
		// 計算 bookValues 中有多少的null值。
		countingNull(array){
			let result = 0;
			for(let i = 0; i < array.length; i++){
				if(array[i] === null){
					result++;
				}
			}
			return result;
		},

		// 查看是否有書本被重複選擇到
		isRepeat(array){
			let result = false;
			for(let i = 0; i < array.length; i++){
				for(let j = 0; j < array.length; j++){
					if(i == j){
						continue;
					}else if(array[i] == array[j] && array[i] != null){
						result = true;
						break;
					}else{
						continue;
					}
				}
			}
			return result;
		},

		// 發送修改拾本好書request
        recommendationUpdateForm(e) {
			// 如果 this.books 是空的，代表一筆資料都沒有，所以必須要一口氣新增所有的書本書單(10本)。
			if(this.books.length == 0 && this.countingNull(this.bookValues) != 0){
				$.showErrorModalWithoutError('10本好書都必須要填寫好哦！');
				return false;
            }

			// 不可以選擇到重複的書本。
			if(this.isRepeat(this.bookValues)){
				$.showErrorModalWithoutError('請不要重複選擇書本。');
				return false;
            }

			let url = this.RecommendationUpdateURL;
            let data = $(e.target).serializeObject();
            let formData = new FormData($(e.target)[0]);
			formData.append('_method', 'patch');
			
			// 如果 this.bookValues_old 都沒有空值，代表每本書都已經被選擇好了。
			// 此時如果你的 this.bookValues 全為空的也沒關係(因為你可能只單純要修改書單標題)
			if( this.countingNull(this.bookValues) != 10 ){
				for(let i = 0; i < 10; i++){
					if(this.bookValues[i] != null){
						formData.append('book_ids[' + i +']', this.bookValues[i]);
					}
				}
            }

            $.showLoadingModal();
            axios.post(url, formData).then(response => {
                $.showSuccessModal('修改成功', response.data.url, '檢視');
            }).catch((error) => {
                console.error('修改推薦好書時發生錯誤，錯誤訊息：' + error);
                $.showErrorModal(error);
            });
        },

    },
    created(){
		// 抓取推薦書單標題文字與推薦中的10本書。
        let RecommendationGetFirstURL = $('#RecommendationGetFirstURL').html();
        $.showLoadingModal();
        axios.get(RecommendationGetFirstURL).then(response => {
            $.closeModal();
            this.recommendation_title = response.data.recommendation_title;
			this.books = response.data.books;
			for(let i = 0; i < this.books.length; i++){
				this.bookValues_old[i] = this.books[i].id; 
			}
        });
    },
    mounted(){

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
