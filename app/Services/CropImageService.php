<?php

namespace App\Services;
use URL;

class CropImageService extends BaseService{

	// object 圖片裁切資料，包含x、y、高、寬和旋轉。
	private $data;
	
	// 原始圖檔(切割之前)的路徑。
	private $src;

	// 圖檔的類型，例如：IMAGETYPE_JPEG。
	private $type;

	// 圖檔的副檔名，例如：.jpg、.png。
	private $extension;

	// 切割後圖檔路徑。
	private $dst;
	
	// 回傳訊息。
	private $msg;

	// 圖片生成路徑
	private $path;

	// 圖片檔名
	private $filename;

	// 圖片最終生成的寬與高
	private $dst_img_w;
	private $dst_img_h;

	/**
     * generate a image and crop it, retrun a url eventually.
     *
     * @param  string  $data
	 * @param  object  $file => {
	 *     error, name [原檔案名稱與副檔名], size [檔案大小，單位：byte], tmp_name [暫時上傳路徑], type [格式，例如：image/jpeg]
	 * }
	 * @param  string  $model
     * @return array
     */
	public function __construct($data, $file, $model) {    
		// 設定圖片輸出路徑
		$this->setPath($model);

		// 生成檔名
		$this->setFilename();
		// $this->setSrc($src);

		// 設定切割數據
		$this->setData($data);

		// 設定上傳檔案
		$this->setFile($file);

		// 生成裁切後的寬與高
		$this->setImageSize($model, $this->data);

		$this->crop($this->src, $this->dst, $this->data);
	}

	public function getResult(){
		if (is_null($this->getMsg())){
			return [
				'status' => 'OK',
				'url' => $this->dst
			];
		}else{
			return [
				'status' => 'ERROR',
				'message' => $this->getMsg()
			];
		}
	}

	private function setPath($model){
		if($model){
			$this->path = 'images/' . $model . '/' . 'cover_images' . '/';
		}else{
			$this->path = 'images/default/';
		}
	}

	private function setFilename(){
		// 預設命名格式 [時間]
		$this->filename = time();
	}

	private function setData($data) {
		if (!empty($data)) {
			$this->data = json_decode(stripslashes($data));
		}
	}

	private function setFile($file) {
		
		// 從 PHP $_FILES 取得 錯誤代碼。
		$errorCode = $file['error'];

		if ($errorCode === UPLOAD_ERR_OK) {
			// 代表沒任何錯誤，先判斷上傳的檔案存不存在且是不是圖片
			// 如果以上條件符合就會回傳 【IMAGETYPE_JPEG、IMAGETYPE_PNG 等】，不是圖片就會回傳 false
			// 注意：使用 exif_imagetype 函式時，必須開啟 exif extension，不然會報錯 call undefined function。
			$type = exif_imagetype($file['tmp_name']);

			if ($type) {

				// 取得副檔名，回傳值： .jpg、.png、.bmp 等。
				$extension = image_type_to_extension($type);

				// 生成原始圖檔路徑
				$src = $this->path . $this->filename . '.original' . $extension;

				if ($type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG || $type == IMAGETYPE_BMP) {
					
					// 如果發現之前的原始圖檔還在就刪除掉。
					if (file_exists($src)) {
						unlink($src);
					}

					// 把上傳暫存檔案移到原始圖檔路徑
					$result = move_uploaded_file($file['tmp_name'], $src);

					if ($result) {
						// 檔案移植成功。
						$this->src = $src;
						$this->type = $type;
						$this->extension = $extension;
						$this->setDst();
					} else {
						$this->msg = '儲存圖檔失敗（無法儲存原圖）。';
					}
				} else {
					$this->msg = '請上傳 JPG, PNG 或 BMP 此三種圖片格式圖檔！';
				}
			} else {
				$this->msg = '您上傳的檔案不存在或者不是圖檔。';
			}
		} else {
			$this->msg = $this->codeToMessage($errorCode);
		}
	}

	private function setDst() {
		$this->dst = $this->path . $this->filename . $this->extension;
	}

	private function setImageSize($model, $data){
		switch ($model) {
			default:
				$this->dst_img_w = $data->width;
				$this->dst_img_h = $data->height;
				break;
		}
	}

	private function crop($src, $dst, $data) {
		if (!empty($src) && !empty($dst) && !empty($data)) {
			switch ($this->type) {
				case IMAGETYPE_JPEG:
					$src_img = imagecreatefromjpeg($src);
					break;

				case IMAGETYPE_PNG:
					$src_img = imagecreatefrompng($src);
					break;
					
				case IMAGETYPE_BMP:
					$src_img = imagecreatefrombmp($src);
					break;
			}

			if (!$src_img) {
				$this->msg = "讀取圖片失敗";
				return;
			}

			$size = getimagesize($src);
			$size_w = $size[0]; // 寬
			$size_h = $size[1]; // 高

			//原檔圖片的寬與高
			$src_img_w = $size_w;
			$src_img_h = $size_h;

			//抓取範圍的寬與高
			$tmp_img_w = $data->width;
			$tmp_img_h = $data->height;

			//最終生成檔案的寬與高
			$dst_img_w = $this->dst_img_w;
			$dst_img_h = $this->dst_img_h;

			//起始座標
			$src_x = $data->x;
			$src_y = $data->y;

			if ($src_x <= -$tmp_img_w || $src_x > $src_img_w) {
				$src_x = $src_w = $dst_x = $dst_w = 0;
			} else if ($src_x <= 0) {
				$dst_x = -$src_x;
				$src_x = 0;
				$src_w = $dst_w = min($src_img_w, $tmp_img_w + $src_x);
			} else if ($src_x <= $src_img_w) {
				$dst_x = 0;
				$src_w = $dst_w = min($tmp_img_w, $src_img_w - $src_x);
			}

			if ($src_w <= 0 || $src_y <= -$tmp_img_h || $src_y > $src_img_h) {
				$src_y = $src_h = $dst_y = $dst_h = 0;
			} else if ($src_y <= 0) {
				$dst_y = -$src_y;
				$src_y = 0;
				$src_h = $dst_h = min($src_img_h, $tmp_img_h + $src_y);
			} else if ($src_y <= $src_img_h) {
				$dst_y = 0;
				$src_h = $dst_h = min($tmp_img_h, $src_img_h - $src_y);
			}

			// Scale to destination position and size
			$ratio = $tmp_img_w / $dst_img_w;
			$dst_x /= $ratio;
			$dst_y /= $ratio;
			$dst_w /= $ratio;
			$dst_h /= $ratio;

			// 建立一個 True Color圖片(圖片寬, 圖片高) => 這是最終裁切後的圖片。
			$dst_img = imagecreatetruecolor($dst_img_w, $dst_img_h);

			// 填滿顏色，這是針對png所要做的事情，填滿alpha值並儲存。
			imagefill($dst_img, 0, 0, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
			imagesavealpha($dst_img, true);
			
			// 將 原圖$src_img 裁切並複製到 新圖檔$dst_img
			$result = imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

			if ($result) {
				switch ($this->type) {
					case IMAGETYPE_JPEG:
						$saveResult = imagejpeg($dst_img, $this->dst);
						break;
	
					case IMAGETYPE_PNG:
						$saveResult = imagepng($dst_img, $this->dst);
						break;
						
					case IMAGETYPE_BMP:
						$saveResult = imagebmp($dst_img, $this->dst);
						break;
				}
				if (!$saveResult) {
					$this->msg = "儲存已裁剪的圖片失敗。";
				}
			} else {
				$this->msg = "圖片裁剪失敗。";
			}

			imagedestroy($src_img);
			imagedestroy($dst_img);

			//將原圖刪除
			unlink($src);
		}
	}

	private function codeToMessage($code) {
		$errors = [
			UPLOAD_ERR_INI_SIZE =>'您上傳的檔案超過了php.ini中的upload_max_filesize所限制的檔案大小！',
			UPLOAD_ERR_FORM_SIZE =>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
			UPLOAD_ERR_PARTIAL =>'The uploaded file was only partially uploaded',
			UPLOAD_ERR_NO_FILE =>'No file was uploaded',
			UPLOAD_ERR_NO_TMP_DIR =>'Missing a temporary folder',
			UPLOAD_ERR_CANT_WRITE =>'Failed to write file to disk',
			UPLOAD_ERR_EXTENSION =>'File upload stopped by extension',
		];

		if (array_key_exists($code, $errors)) {
			return $errors[$code];
		}
		return '上傳發生未知的錯誤';
	}

	public function getMsg() {
		return $this->msg;
	}
}