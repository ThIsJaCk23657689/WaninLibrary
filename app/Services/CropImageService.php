<?php

namespace App\Services;
use URL;

class CropImageService extends BaseService{
	private $src;
	private $data;
	private $dst;
	private $type;
	private $extension;
	private $msg;

	private $id;

	// string $path 圖片生成路徑
	private $path;

	// string $filename 圖片檔名
	private $filename;

	// integer $dst_img_w, $dst_img_h 圖片最終生成的寬與高
	private $dst_img_w;
	private $dst_img_h;

	// @param int $id 為圖片對應之編號
	// @param string $arg 為陣列
	// $arg['type']只有 'book'
	public function __construct($src, $data, $file, $id, $arg) {

		// 抓取id
		$this->id = $id;

		// 生成路徑
		$this->setPath($arg['type']);

		//生成檔名
		$this->setFilename($arg);

		$this->setSrc($src);
		$this->setData($data);
		$this->setFile($file);

		// 生成檔案最後寬與高
		$this->setDataSize($arg['type'], $this->data);

		$this->crop($this->src, $this->dst, $this->data);
	}

	private function setPath($argType){
		switch ($argType) {
			case 'book':
				// 使用者頭貼
				$this->path = 'images/books/cover_images/';
				break;
			default:
				$this->path = 'images/default/';
				break;
		}
	}

	private function setFilename($arg){
		switch ($arg['type']) {
			default:
				//預設命名格式 [編號]
				$this->filename = $this->id;
				break;
		}
	}

	private function setDataSize($argType, $data){
		$tmp_img_w = $data->width;
		$tmp_img_h = $data->height;

		switch ($argType) {
			case 'logingType':
				// 商品寄類別圖片 固定寬都是450 高則是等比縮放
				$this->dst_img_w = 450;
				if ($tmp_img_w == 450) {
					$this->dst_img_h = $tmp_img_h;
				}else{
					// 寬高比率 = 抓取寬 / 450(目的寬)
					$ratio = $tmp_img_w / 450;
					// 目的高 = 抓取高 / 寬高比率
					$this->dst_img_h = $tmp_img_h / $ratio;
				}
				break;

			default:
				$this->dst_img_w = 300;
				$this->dst_img_h = 400;
				break;
		}
	}

	private function setSrc($src) {

		if (!empty($src)) {
			$type = exif_imagetype($src);

			if ($type) {
				$this->src = $src;
				$this->type = $type;
				$this->extension = image_type_to_extension($type);
				$this->setDst();
			}
		}
	}

	private function setData($data) {
		if (!empty($data)) {
			$this->data = json_decode(stripslashes($data));
		}
	}

	private function setFile($file) {
		$errorCode = $file['error'];

		if ($errorCode === UPLOAD_ERR_OK) {

			$type = exif_imagetype($file['tmp_name']);

			if ($type) {

				$extension = image_type_to_extension($type);
				$src = $this->path . $this->filename . '.original' . $extension;

				if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG) {

					if (file_exists($src)) {
						unlink($src);
					}

					$result = move_uploaded_file($file['tmp_name'], $src);

					if ($result) {
						$this->src = $src;
						$this->type = $type;
						$this->extension = $extension;
						$this->setDst();
					} else {
						$this->msg = '儲存頭像失敗！';
					}
				} else {
					$this->msg = '請上傳 JPG, PNG, GIF 此三種圖片格式頭像！';
				}
			} else {
				$this->msg = '請上傳圖片檔謝謝！';
			}
		} else {
			$this->msg = $this->codeToMessage($errorCode);
		}
	}

	private function setDst() {
		$this->dst = $this->path . $this->filename . '.png';
	}

	private function crop($src, $dst, $data) {

		if (!empty($src) && !empty($dst) && !empty($data)) {
			switch ($this->type) {
				case IMAGETYPE_GIF:
					$src_img = imagecreatefromgif($src);
					break;

				case IMAGETYPE_JPEG:
					$src_img = imagecreatefromjpeg($src);
					break;

				case IMAGETYPE_PNG:
					$src_img = imagecreatefrompng($src);
					break;
			}

			if (!$src_img) {
				$this->msg = "讀取頭像圖檔失敗";
				return;
			}

			$size = getimagesize($src);
			$size_w = $size[0]; // natural width
			$size_h = $size[1]; // natural height

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
			$src_x = $data -> x;
			$src_y = $data -> y;

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

			$dst_img = imagecreatetruecolor($dst_img_w, $dst_img_h);

			// Add transparent background to destination image
			imagefill($dst_img, 0, 0, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
			imagesavealpha($dst_img, true);

			$result = imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

			if ($result) {
				if (!imagepng($dst_img, $dst)) {
					$this->msg = "儲存頭像(已裁剪)失敗";
				}
			} else {
				$this->msg = "頭像裁剪失敗";
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

	public function getResult() {
		return !empty($this->data) ? $this->dst : $this->src;
	}

	public function getMsg() {
		return $this->msg;
	}
}
