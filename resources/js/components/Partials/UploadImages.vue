<template>
<div>
    <div class="form-group">
        <!-- 預覽圖與裁切區塊 -->
        <div :id="prefix + '_preview-image-div'" class="col-md-12 px-0">
            <img :id="prefix + '_preview-image'" class="img-fluid rounded" :src="uploadimg">
        </div>
    </div>
    <!-- 表單傳遞資料區塊 -->
    <div class="form-group">
        <label :for="prefix + '_image_file'" class="mb-2">
            {{ title }}
        </label>
        <div class="custom-file">
            <input type="hidden" :id="prefix + '_image_url'" name="image_url" :value="ImageURL">
			<input type="hidden" :id="prefix + '_image_data'" name="image_data" :value="cropData">
            <input type="file" :id="prefix + '_image_file'" name="image_file" class="custom-file-input"
                accept="image/jpeg,image/png,image/bmp" aria-describedby="PictureHelp" @change="spwanPreviewImg">
            <small :id="prefix + '_PictureHelp'" class="form-text text-muted">僅支援JPG、JPEG、PNG與BMP格式圖片，且檔案大小上限為20MB。{{ helptext || '' }}</small>
            <label :id="prefix + '_file_label'" class="custom-file-label" :for="prefix + '_image_file'">請選擇檔案</label>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: ['uploadimg', 'title', 'aspectRatio', 'prefix', 'helptext'],
    data(){
        return {
            url: null,
            isCropActived: false,
            cropData: null,
            ImageURL: null,
        }
    },
    methods: {
        uploadURLImage(url){
            this.stopCropper();
            if(!url){
                // url是空值。
                this.ImageURL = null;
            }
            this.ImageURL = url;
            $('#' + this.prefix + '_preview-image').attr('src', this.ImageURL);
            $('#' + this.prefix + '_file_label').text('從爬蟲抓來的圖片');
        },
        // 當 input 更動時，所觸發的function。
        spwanPreviewImg(e){
            let $files = $(e.target).prop('files');
            let $file;
            if($files.length > 0){
                $file = $files[0];
                if(this.isImageFile($file)){
                    // 確定要上傳本地端圖片，就不要管爬蟲圖片了。
                    this.ImageURL = null;
                    $('#' + this.prefix + '_file_label').text($('#' + this.prefix + '_image_file').prop('files')[0].name);

                    if(this.url){
                        URL.revokeObjectURL(this.url);
                    }

                    // 這邊使用 Object URL 的功能。
                    this.url = URL.createObjectURL($file);
                    this.startCropper();
                }else{
                    $.showErrorModalWithoutError('只能上傳(png, jpg, jpeg, gif)格式之圖片。');
                }
            }else{
                this.stopCropper();
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
				$('#' + this.prefix + '_preview-image').cropper('replace', this.url);
			} else {
                $('#' + this.prefix + '_preview-image').attr('src', this.url);
				$('#' + this.prefix + '_preview-image').cropper({
					aspectRatio: this.aspectRatio,
					autoCropArea: 0.5,
					movable: false,
					zoomable: false,
                    dragMode: 'move',
                    checkCrossOrigin: false,
                    checkOrientation: false,
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
                $('#' + this.prefix + '_preview-image').cropper('destroy');
                $('#' + this.prefix + '_preview-image').attr('src', this.uploadimg);
                $('#' + this.prefix + '_file_label').text('請選擇檔案');
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
