<template>
	<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" @submit.prevent="startRedemption">
    	<div class="input-group">
      		<input
        		type="text"
        		name="barcode"
        		class="form-control"
        		placeholder="快速還書..."
				autocomplete="off"
        		v-model="barcodeText"
        		@keyup.enter="startRedemption"
      		/>
      		<div class="input-group-append">
				<button class="btn btn-warning" type="button" @click="clickRedemption">
					<i class="fas fa-search"></i>
				</button>
      		</div>
    	</div>
  </form>
</template>

<script>
export default {
	props: [],
	data() {
		return {
			barcodeText: '',
			ReturnBookURL: $("#ReturnBookURL").text()
		};
	},
	methods: {
		clickRedemption() {
			let barcode = this.barcodeText;
			if (!barcode || barcode.length < 13) {
				$.showWarningModal("條碼格式輸入不正確。");
				return false;
			}

			this.redemption(barcode, this);
		},
		startRedemption(e) {
			let barcode = this.barcodeText;
			if (!barcode || barcode.length < 13) {
				$.showWarningModal("條碼格式輸入不正確。");
				return false;
			}

			this.redemption(barcode, this);
		},

		redemption: _.debounce((barcode, vm) => {
			$.showLoadingModal("歸還書籍中...");
			axios.post(vm.ReturnBookURL, {
				barcode: escape(barcode)
			}).then(response => {
				// console.log(response.data);
				$.showSuccessModal("歸還成功", response.data.url);
			}).catch(error => {
				console.error("歸還書籍時發生錯誤，錯誤訊息：" + error);
				$.showErrorModal(error);
				console.log(error.response.data.message);
			});
		}, 350)
	},
	created() {

	},
	mounted() {

	}
};
</script>

<style>
</style>