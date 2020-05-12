<template>
<div>
    <div class="form-group">
        <!-- 預覽圖與裁切區塊 -->
        <div id="preview-image-div" class="col-md-12 px-0">
            <img id="preview-image" class="img-fluid rounded" :src="uploadimg">
        </div>
    </div>
    <!-- 表單傳遞資料區塊 -->
    <div class="form-group">
        <label for="cover_image" class="mb-2">
            商品圖片
        </label>
        <div class="custom-file">
			<input type="hidden" id="image_data" name="image_data" :value="cropData">
            <input type="file" id="cover_image" name="image_file" class="custom-file-input"
                accept="image/jpeg,image/png,image/bmp" aria-describedby="PictureHelp" @change="spwanPreviewImg">
            <small id="PictureHelp" class="form-text text-muted">僅支援JPG、JPEG、PNG與BMP格式圖片，且檔案大小上限為20MB。</small>
            <label class="custom-file-label" for="cover_image">請選擇檔案</label>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['uploadimg'],
    data(){
        return {
            url: null,
            isCropActived: false, 
            cropData: null,
        }
    },
    methods: {
        // 當 input 更動時，所觸發的function。
        spwanPreviewImg(e){
            let $files = $(e.target).prop('files');
            let $file;
            if($files.length > 0){
                $file = $files[0];
                if(this.isImageFile($file)){
                    if(this.url){
                        URL.revokeObjectURL(this.url);
                    }

                    // 這邊使用 Object URL 的功能。
                    this.url = URL.createObjectURL($file);
                    this.startCropper();
                }else{
                    $.showErrorModalWithoutError('只能上傳(png, jpg, jpeg, gif)格式之圖片。');
                }
            }
        },
        // 檢查所上傳的檔案是不是圖片檔案。
        isImageFile($file){
            if ($file.type) {
				return /^image\/\w+$/.test($file.type);
			} else {
				return /\.(jpg|jpeg|png|gif|bmp)$/.test($file);
			}
        },
        // 開始裁切。
        startCropper(){
            let _this = this;

			if (this.isCropActived) {
                // 如果已經開啟了 crop 取代原本的url即可。
				$('#preview-image').cropper('replace', this.url);
			} else {
                $('#preview-image').attr('src', this.url);
				$('#preview-image').cropper({
					aspectRatio: 1 / 1,
					autoCropArea: 0.5,
					movable: false,
					zoomable: false,
					dragMode: 'move',
					crop: function (e) {
                        let json = [
							'{"x":' + e.detail.x,
							'"y":' + e.detail.y,
							'"height":' + e.detail.height,
							'"width":' + e.detail.width,
							'"rotate":' + e.detail.rotate + '}'
						].join();

                        // 蒐集裁切的數據
						_this.cropData = json;
					}
				});
				this.isCropActived = true;
			}
        },
        // 結束裁切。
        stopCropper(){
            if (this.isCropActived) {
				$('#preview-image').cropper('destroy');
				this.isCropActived = false;
			}
        }
    },
    created(){

    },
    mounted(){

    }
}
</script>

<style>
</style>