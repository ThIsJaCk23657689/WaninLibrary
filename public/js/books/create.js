/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Books/BookCreateForm.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['uploadimg'],
  data: function data() {
    return {
      BooksIndexURL: $('#BooksIndexURL').html(),
      BooksStoreURL: $('#BooksStoreURL').html(),
      DonorsNameURL: $('#DonorsNameURL').html(),
      FormErrorsMsg: [],
      donors: [],
      title: '書本圖片',
      category_options: [{
        id: null,
        text: '請選擇...'
      }, {
        id: 0,
        text: '000 總類'
      }, {
        id: 1,
        text: '100 哲學類'
      }, {
        id: 2,
        text: '200 宗教類'
      }, {
        id: 3,
        text: '300 科學類'
      }, {
        id: 4,
        text: '400 應用科學類'
      }, {
        id: 5,
        text: '500 社會學類'
      }, {
        id: 6,
        text: '600 史地類'
      }, {
        id: 7,
        text: '610 中國史地類'
      }, {
        id: 8,
        text: '710 世界史地類'
      }, {
        id: 9,
        text: '800 語文文學類'
      }, {
        id: 10,
        text: '900 藝術類'
      }, {
        id: 11,
        text: '1100 論文類'
      }, {
        id: 12,
        text: '1200 雜誌類'
      }, {
        id: 13,
        text: '1300 外文圖書'
      }],
      donorValue: null,
      bookInfo: []
    };
  },
  methods: {
    onSearch: function onSearch(search, loading, index) {
      loading(true);
      this.search(loading, search, this, index);
    },
    search: _.debounce(function (loading, search, vm, index) {
      axios.get(vm.DonorsNameURL, {
        params: {
          keyword: search
        }
      }).then(function (response) {
        // console.log(response.data.book_list);
        vm.options = response.data.donors;
        vm.$refs.DonorsOption.changeOptions(vm.options);
        vm.$refs.PaperDonorsOption.changeOptions(vm.options);
        loading(false);
      });
    }, 350),
    updateValue: function updateValue(value) {
      this.donorValue = value;
    },
    changeAddType: function changeAddType(e) {
      // 更動入庫方式
      var x = $(e.target).val(); // if(x == '1'){
      //     // 捐贈入庫 - 一般圖書
      //     $('#donor_id').prop('disabled', false).selectpicker('refresh');
      //     $('#donor_id_required_star').fadeIn();
      //     $('#price').val('0').prop('disabled', true).attr('required', false);
      //     $('#price_required_star').fadeOut();
      //     // 捐贈入庫 - 論文雜誌
      //     $('#p_donor_id').prop('disabled', false).selectpicker('refresh');
      //     $('#p_donor_id_required_star').fadeIn();
      //     $('#p_price').val('0').prop('disabled', true).attr('required', false);
      //     $('#p_price_required_star').fadeOut();
      // }else{
      //     // 購買入庫 - 一般圖書
      //     $('#donor_id').prop('disabled', true).selectpicker('refresh');
      //     $('#donor_id_required_star').fadeOut();
      //     $('#price').val('0').prop('disabled', false).attr('required', true);
      //     $('#price_required_star').fadeIn();
      //     // 購買入庫 - 論文雜誌
      //     $('#p_donor_id').prop('disabled', true).selectpicker('refresh');
      //     $('#p_donor_id_required_star').fadeOut();
      //     $('#p_price').val('0').prop('disabled', false).attr('required', true);
      //     $('#p_price_required_star').fadeIn();
      // }

      if (x == '1') {
        console.log('bbb');
        this.$emit('update-add-type', 1); // this.addType = 1;
        // 捐贈入庫

        $('.donor_div').fadeIn();
        $('.price_div').fadeOut();
        $('#price').val(0);
      } else {
        console.log('ccc');
        this.$emit('update-add-type', 2); // this.addType = 2;
        // 購買入庫

        $('.donor_div').fadeOut();
        $('.price_div').fadeIn();
        $('#price').val(0);
      }
    },
    updateCategory: function updateCategory(e) {
      var $callNum = $('#callnum').val();

      if ($callNum.length >= 3 && Number.isInteger(parseInt($callNum[0] + $callNum[1] + $callNum[2]))) {
        $('#callnum').removeClass('is-invalid');

        if ($callNum[0] < 6) {
          // 前面6類，可以靠分類號第一碼來判斷。
          $('#category').val($callNum[0]);
        } else {
          // 第六類到第七類，必須還要再看第二碼。
          if ($callNum[0] == 6) {
            if ($callNum[1] == 0) {
              $('#category').val(6);
            } else {
              $('#category').val(7);
            }
          } else {
            if ($callNum[0] == 7) {
              if ($callNum[1] == 0) {
                $('#category').val(7);
              } else {
                $('#category').val(8);
              }
            } else {
              $('#category').val(parseInt($callNum[0]) + 1);
            }
          }
        }
      } else {
        $('#callnum').addClass('is-invalid');
        $('#callnum_error').html('<strong>分類號至少要三碼以上且為數字。</strong>');
      }
    },
    getBookDataFromWeb: function getBookDataFromWeb(e) {
      var _this = this;

      var $url = $(e.target).val();

      if ($url) {
        if (!$.isUrl($url)) {
          $.showErrorModalWithoutError('請輸入正確的網頁格式。');
          $(e.target).val('');
        } else {
          var parser = document.createElement('a');
          parser.href = $url;

          if (parser.hostname == 'metadata.ncl.edu.tw') {
            // 代表發送的是 台灣書目整合查詢系統
            var BooksBugURL = $('#BooksBugURL').html();
            var data = $(e.target).serializeObject();
            $.showLoadingModal();
            axios.post(BooksBugURL, data).then(function (response) {
              console.log(response.data.data);
              _this.bookInfo = response.data.data;

              if (_this.bookInfo == null) {} else {
                $.closeModal();

                _this.keyBookDataInForm();
              }
            })["catch"](function (error) {
              console.error('爬蟲時發生錯誤，錯誤訊息：' + error);
              $.showErrorModal(error);
            });
          } else {
            $.showErrorModalWithoutError('目前爬蟲僅支援台灣書目整合查詢系統網站。');
            $(e.target).val('');
          }
        }
      }
    },
    keyBookDataInForm: function keyBookDataInForm() {
      $('#title').val(this.bookInfo.title);
      $('#subtitle').val(this.bookInfo.subtitle);
      $('#author').val(this.bookInfo.author);
      $('#isbn').val(this.bookInfo.ISBN);
      $('#publisher').val(this.bookInfo.publisher);
      $('#published_date').val(this.bookInfo.published_date);
      $('#edition').val(this.bookInfo.edition);
      $('#language').val(this.bookInfo.language);

      if (this.bookInfo.language != '中文') {
        // 此書籍是外文，分類號會抓取【杜威碼】
        $('#callnum').val(this.bookInfo.Dewey_callnum.substring(0, 3)); // 種類選項強制鎖定13

        $('#category').val(13);
      } else {
        $('#callnum').val(this.bookInfo.callnum.substring(0, 3));
        this.updateCategory();
      } // 爬蟲抓圖片網址


      var $cover_img_name = this.bookInfo.cover_img.split('/').pop();

      if (this.bookInfo.cover_img != null && this.bookInfo.cover_img != '' && $cover_img_name != 'qrcode.png') {
        this.$refs.uploadBookImages.uploadURLImage(this.bookInfo.cover_img);
      } else {
        console.log('Cover Images URL:' + this.bookInfo.cover_img);
      }
    },
    bookCreateForm: function bookCreateForm(e) {
      // 如果 file 沒有值時，請重新選擇圖片。
      // if(!$('#image_file').val()){
      //     $.showErrorModalWithoutError('請重新選擇圖片。');
      //     return false;
      // }
      var url = $(e.target).attr('action'); // let data = $(e.target).serializeObject();
      // formdata 是不可以被console.log的，只會回傳空object。

      $('#category').attr('disabled', false);
      var formdata = new FormData($(e.target)[0]); // Object.keys(data).forEach(
      //     key => formdata.append(key, data[key])
      // );
      // formdata.append('image_file', $('#image_file')[0].files[0]);

      formdata.append('donor_id', this.donorValue);
      $.showLoadingModal();
      axios.post(url, formdata, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (response) {
        // this.$refs.uploadBookImages.stopCropper();
        // console.log('aaa');
        $.showSuccessModal('新增成功', response.data.url, '檢視書籍');
      })["catch"](function (error) {
        console.error('新增書本時發生錯誤，錯誤訊息：' + error);
        $.showErrorModal(error);
      });
      $('#category').attr('disabled', true);
    }
  },
  created: function created() {},
  mounted: function mounted() {
    $('#book_btn').click(function (e) {
      $('#book_create_form').slideDown();
      $('#book_btn').attr('disabled', true);
      $('#paper_btn').attr('disabled', true);
      $('#step1').slideUp();
      $('#goback2step1').slideDown();
      $('#add_type').focus();
    });
    $('#paper_btn').click(function (e) {
      $('#papper_create_form').slideDown();
      $('#book_btn').attr('disabled', true);
      $('#paper_btn').attr('disabled', true);
      $('#step1').slideUp();
      $('#goback2step1').slideDown();
    });
    $('#goback2step1_btn').click(function (e) {
      $('#book_create_form').slideUp();
      $('#papper_create_form').slideUp();
      $('#book_btn').attr('disabled', false);
      $('#paper_btn').attr('disabled', false);
      $('#step1').slideDown();
      $('#goback2step1').slideUp();
    }); // 捐贈人
    // $('#donor_id').selectpicker({
    //     liveSearch: true
    // });
    // $('#p_donor_id').selectpicker({
    //     liveSearch: true
    // });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['placeholder'],
  data: function data() {
    return {
      selectValue: null,
      options: []
    };
  },
  methods: {
    onSearch: function onSearch(search, loading) {
      this.$emit('search', search, loading);
    },
    onChange: function onChange() {
      this.$emit('update-value', this.selectValue);
    },
    changeOptions: function changeOptions(options) {
      this.options = options;
    }
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/UploadImages.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Partials/UploadImages.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['uploadimg', 'title', 'aspectRatio', 'prefix'],
  data: function data() {
    return {
      url: null,
      isCropActived: false,
      cropData: null,
      ImageURL: null
    };
  },
  methods: {
    uploadURLImage: function uploadURLImage(url) {
      this.stopCropper();

      if (!url) {
        // url是空值。
        this.ImageURL = null;
      }

      this.ImageURL = url;
      $('#' + this.prefix + '_preview-image').attr('src', this.ImageURL);
      $('#' + this.prefix + '_file_label').text('從爬蟲抓來的圖片');
    },
    // 當 input 更動時，所觸發的function。
    spwanPreviewImg: function spwanPreviewImg(e) {
      var $files = $(e.target).prop('files');
      var $file;

      if ($files.length > 0) {
        $file = $files[0];

        if (this.isImageFile($file)) {
          // 確定要上傳本地端圖片，就不要管爬蟲圖片了。
          this.ImageURL = null;
          $('#' + this.prefix + '_file_label').text($('#' + this.prefix + '_image_file').prop('files')[0].name);

          if (this.url) {
            URL.revokeObjectURL(this.url);
          } // 這邊使用 Object URL 的功能。


          this.url = URL.createObjectURL($file);
          this.startCropper();
        } else {
          $.showErrorModalWithoutError('只能上傳(png, jpg, jpeg, gif)格式之圖片。');
        }
      } else {
        this.stopCropper();
      }
    },
    // 檢查所上傳的檔案是不是圖片檔案。
    isImageFile: function isImageFile($file) {
      if ($file.type) {
        return /^image\/\w+$/.test($file.type);
      } else {
        return /\.(jpg|jpeg|png|gif|bmp)$/.test($file);
      }
    },
    // 開始裁切。
    startCropper: function startCropper() {
      var _this = this;

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
          crop: function crop(e) {
            var json = ['{"x":' + e.detail.x, '"y":' + e.detail.y, '"height":' + e.detail.height, '"width":' + e.detail.width, '"rotate":' + e.detail.rotate + '}'].join(); // 蒐集裁切的數據

            _this.cropData = json;
          }
        });
        this.isCropActived = true;
      }
    },
    // 結束裁切。
    stopCropper: function stopCropper() {
      if (this.isCropActived) {
        $('#' + this.prefix + '_preview-image').cropper('destroy');
        $('#' + this.prefix + '_preview-image').attr('src', this.uploadimg);
        $('#' + this.prefix + '_file_label').text('請選擇檔案');
        this.isCropActived = false;
      }
    }
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--8-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\nimg {\r\n  height: auto;\r\n  max-width: 2.5rem;\r\n  margin-right: 1rem;\n}\n.d-center {\r\n  display: flex;\r\n  align-items: center;\n}\n.selected img {\r\n  width: auto;\r\n  max-height: 23px;\r\n  margin-right: 0.5rem;\n}\n.v-select .dropdown li {\r\n  border-bottom: 1px solid rgba(112, 128, 144, 0.1);\n}\n.v-select .dropdown li:last-child {\r\n  border-bottom: none;\n}\n.v-select .dropdown li a {\r\n  padding: 10px 20px;\r\n  width: 100%;\r\n  font-size: 1.25em;\r\n  color: #3c3c3c;\n}\n.v-select .dropdown-menu .active > a {\r\n  color: #fff;\n}\r\n\r\n\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--8-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--8-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--8-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./BookCreateForm.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=template&id=bf3ab08e&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Books/BookCreateForm.vue?vue&type=template&id=bf3ab08e& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "row justify-content-center" }, [
    _c("div", { staticClass: "col-md-10" }, [
      _vm._m(0),
      _vm._v(" "),
      _vm._m(1),
      _vm._v(" "),
      _c(
        "form",
        {
          staticStyle: { display: "none" },
          attrs: {
            id: "book_create_form",
            method: "POST",
            action: _vm.BooksStoreURL,
            enctype: "multipart/form-data"
          },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.bookCreateForm($event)
            }
          }
        },
        [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group" }, [
                _c("label", { attrs: { for: "add_type" } }, [
                  _vm._v("入庫方式")
                ]),
                _vm._v(" "),
                _c(
                  "select",
                  {
                    staticClass: "form-control",
                    attrs: { id: "add_type", name: "add_type" },
                    on: { change: _vm.changeAddType }
                  },
                  [
                    _c("option", { attrs: { value: "1", selected: "" } }, [
                      _vm._v("捐贈入庫")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "2" } }, [
                      _vm._v("購買入庫")
                    ])
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group donor_div" }, [
                _vm._m(2),
                _vm._v(" "),
                _c(
                  "div",
                  { attrs: { id: "donor_id" } },
                  [
                    _c("select-donor-custom", {
                      ref: "DonorsOption",
                      attrs: { placeholder: "請輸入捐贈人名稱" },
                      on: {
                        search: _vm.onSearch,
                        "update-value": _vm.updateValue
                      }
                    })
                  ],
                  1
                )
              ])
            ]),
            _vm._v(" "),
            _vm._m(3),
            _vm._v(" "),
            _vm._m(4)
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c(
              "div",
              { staticClass: "col-md-6 text-center" },
              [
                _c("upload-images", {
                  ref: "uploadBookImages",
                  attrs: {
                    uploadimg: _vm.uploadimg,
                    title: _vm.title,
                    "aspect-ratio": 1 / 1,
                    prefix: "book"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-6" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { attrs: { for: "bugurl" } }, [
                      _vm._v("爬蟲網址")
                    ]),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        attrs: {
                          href:
                            "http://metadata.ncl.edu.tw/blstkmc/blstkm#tudorkmtop",
                          target: "_blank"
                        }
                      },
                      [_vm._v("爬蟲網址")]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      staticClass: "form-control",
                      attrs: {
                        id: "bugurl",
                        name: "bugurl",
                        type: "text",
                        value: "",
                        autocomplete: "off"
                      },
                      on: { change: _vm.getBookDataFromWeb }
                    })
                  ])
                ])
              ]),
              _vm._v(" "),
              _vm._m(5),
              _vm._v(" "),
              _vm._m(6),
              _vm._v(" "),
              _vm._m(7),
              _vm._v(" "),
              _vm._m(8),
              _vm._v(" "),
              _vm._m(9)
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _vm._m(10),
            _vm._v(" "),
            _vm._m(11),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group" }, [
                _vm._m(12),
                _vm._v(" "),
                _c("input", {
                  staticClass: "form-control",
                  attrs: {
                    id: "callnum",
                    name: "callnum",
                    type: "text",
                    value: "",
                    autocomplete: "off"
                  },
                  on: { input: _vm.updateCategory }
                }),
                _vm._v(" "),
                _vm._m(13)
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group" }, [
                _c("label", { attrs: { for: "category" } }, [
                  _vm._v("圖書類別")
                ]),
                _vm._v(" "),
                _c(
                  "select",
                  {
                    staticClass: "form-control",
                    attrs: { id: "category", name: "category", disabled: "" }
                  },
                  _vm._l(_vm.category_options, function(option) {
                    return _c(
                      "option",
                      { key: option.id, domProps: { value: option.id } },
                      [_vm._v(_vm._s(option.text))]
                    )
                  }),
                  0
                )
              ])
            ])
          ]),
          _vm._v(" "),
          _vm._m(14),
          _vm._v(" "),
          _c("div", { staticClass: "form-group row justify-content-center" }, [
            _c("div", { staticClass: "col-md-8" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-block btn-primary",
                  attrs: { type: "submit" }
                },
                [
                  _vm._v(
                    "\r\n                        確認新增\r\n                    "
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "a",
                {
                  staticClass: "btn btn-block btn-danger",
                  attrs: { href: _vm.BooksIndexURL }
                },
                [
                  _vm._v(
                    "\r\n                        返回列表\r\n                    "
                  )
                ]
              )
            ])
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "form",
        {
          staticStyle: { display: "none" },
          attrs: {
            id: "papper_create_form",
            method: "POST",
            action: _vm.BooksStoreURL,
            enctype: "multipart/form-data"
          },
          on: {
            submit: function($event) {
              $event.preventDefault()
              return _vm.bookCreateForm($event)
            }
          }
        },
        [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group" }, [
                _c("label", { attrs: { for: "p_add_type" } }, [
                  _vm._v("入庫方式")
                ]),
                _vm._v(" "),
                _c(
                  "select",
                  {
                    staticClass: "form-control",
                    attrs: { id: "p_add_type", name: "add_type" },
                    on: { change: _vm.changeAddType }
                  },
                  [
                    _c("option", { attrs: { value: "1", selected: "" } }, [
                      _vm._v("捐贈入庫")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "2" } }, [
                      _vm._v("購買入庫")
                    ])
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-3" }, [
              _c("div", { staticClass: "form-group donor_div" }, [
                _vm._m(15),
                _vm._v(" "),
                _c(
                  "div",
                  { attrs: { id: "p_donor_id" } },
                  [
                    _c("select-donor-custom", {
                      ref: "PaperDonorsOption",
                      attrs: { placeholder: "請輸入捐贈人名稱" },
                      on: {
                        search: _vm.onSearch,
                        "update-value": _vm.updateValue
                      }
                    })
                  ],
                  1
                )
              ])
            ]),
            _vm._v(" "),
            _vm._m(16),
            _vm._v(" "),
            _vm._m(17)
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c(
              "div",
              { staticClass: "col-md-6 text-center" },
              [
                _c("upload-images", {
                  ref: "uploadPapperImages",
                  attrs: {
                    uploadimg: _vm.uploadimg,
                    title: _vm.title,
                    "aspect-ratio": 1 / 1,
                    prefix: "papper"
                  }
                })
              ],
              1
            ),
            _vm._v(" "),
            _vm._m(18)
          ]),
          _vm._v(" "),
          _vm._m(19),
          _vm._v(" "),
          _vm._m(20),
          _vm._v(" "),
          _c("div", { staticClass: "form-group row justify-content-center" }, [
            _c("div", { staticClass: "col-md-8" }, [
              _c(
                "button",
                {
                  staticClass: "btn btn-block btn-primary",
                  attrs: { type: "submit" }
                },
                [
                  _vm._v(
                    "\r\n                        確認新增\r\n                    "
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "a",
                {
                  staticClass: "btn btn-block btn-danger",
                  attrs: { href: _vm.BooksIndexURL }
                },
                [
                  _vm._v(
                    "\r\n                        返回列表\r\n                    "
                  )
                ]
              )
            ])
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row", attrs: { id: "step1" } }, [
      _c("div", { staticClass: "col-md-12 mb-2" }, [
        _c("h4", [_vm._v("1. 書本類型")]),
        _vm._v(" "),
        _c("small", [_vm._v("請先選擇欲要創建書本的類型")])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-6" }, [
        _c("div", { staticClass: "form-group" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-block btn-info",
              attrs: { id: "book_btn", type: "button" }
            },
            [
              _c("i", { staticClass: "fas fa-user-tie mr-2" }),
              _vm._v(
                "\r\n                        一般書籍(有ISBN)\r\n                    "
              )
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-6" }, [
        _c("div", { staticClass: "form-group" }, [
          _c(
            "button",
            {
              staticClass: "btn btn-block btn-info",
              attrs: { id: "paper_btn", type: "button" }
            },
            [
              _c("i", { staticClass: "far fa-building mr-2" }),
              _vm._v(
                "\r\n                        論文、期刊、雜誌等(無ISBN)\r\n                    "
              )
            ]
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "row",
        staticStyle: { display: "none" },
        attrs: { id: "goback2step1" }
      },
      [
        _c("div", { staticClass: "col-md-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _c(
              "button",
              {
                staticClass: "btn btn-block btn-secondary",
                attrs: { id: "goback2step1_btn", type: "button" }
              },
              [
                _c("i", { staticClass: "fas fa-undo-alt mr-2" }),
                _vm._v(
                  "\r\n                        重新選擇書本類型\r\n                    "
                )
              ]
            )
          ])
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("捐贈人")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-2" }, [
      _c(
        "div",
        {
          staticClass: "form-group price_div",
          staticStyle: { display: "none" }
        },
        [
          _c("label", { attrs: { for: "price" } }, [
            _c(
              "span",
              {
                staticClass: "text-danger mr-2",
                attrs: { id: "price_required_star" }
              },
              [_vm._v("*")]
            ),
            _vm._v("價格")
          ]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "price",
              name: "price",
              type: "text",
              value: "0",
              autocomplete: "off"
            }
          })
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-4" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", { attrs: { for: "status" } }, [_vm._v("狀態")]),
        _vm._v(" "),
        _c(
          "select",
          {
            staticClass: "form-control",
            attrs: { id: "status", name: "status", disabled: "" }
          },
          [_c("option", { attrs: { value: "4" } }, [_vm._v("庫藏待上架")])]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "title" } }, [
            _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
            _vm._v("書名（主標題）\r\n                                ")
          ]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "title",
              name: "title",
              type: "text",
              value: "",
              required: "",
              autocomplete: "off"
            }
          })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "subtitle" } }, [_vm._v("副標題")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "subtitle",
              name: "subtitle",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-9" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "author" } }, [_vm._v("作者")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "author",
              name: "author",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-3" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "position" } }, [_vm._v("位置")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "position",
              name: "position",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-9" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "translator" } }, [_vm._v("譯者")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "translator",
              name: "translator",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-3" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "language" } }, [_vm._v("語言")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "language",
              name: "language",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-8" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "publisher" } }, [_vm._v("出版商")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "publisher",
              name: "publisher",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-4" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "edition" } }, [_vm._v("版次")]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "edition",
              name: "edition",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", { attrs: { for: "published_date" } }, [_vm._v("出版日期")]),
        _vm._v(" "),
        _c("input", {
          staticClass: "form-control",
          attrs: {
            id: "published_date",
            name: "published_date",
            type: "text",
            value: "",
            autocomplete: "off"
          }
        })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", { attrs: { for: "isbn" } }, [_vm._v("ISBN")]),
        _vm._v(" "),
        _c("input", {
          staticClass: "form-control",
          attrs: {
            id: "isbn",
            name: "isbn",
            type: "text",
            value: "",
            autocomplete: "off"
          }
        })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "callnum" } }, [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("分類號\r\n                        ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "span",
      {
        staticClass: "invalid-feedback",
        attrs: { id: "callnum_error", role: "alert" }
      },
      [_c("strong")]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row mb-2" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "content" } }, [_vm._v("備註內容")]),
          _vm._v(" "),
          _c("textarea", {
            staticClass: "form-control",
            attrs: { name: "content", id: "content", cols: "30", rows: "3" }
          })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("捐贈人")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-2" }, [
      _c(
        "div",
        {
          staticClass: "form-group price_div",
          staticStyle: { display: "none" }
        },
        [
          _c("label", { attrs: { for: "p_price" } }, [
            _c(
              "span",
              {
                staticClass: "text-danger mr-2",
                attrs: { id: "p_price_required_star" }
              },
              [_vm._v("*")]
            ),
            _vm._v("價格")
          ]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "p_price",
              name: "price",
              type: "text",
              value: "0",
              autocomplete: "off"
            }
          })
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-4" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", { attrs: { for: "p_status" } }, [_vm._v("狀態")]),
        _vm._v(" "),
        _c(
          "select",
          {
            staticClass: "form-control",
            attrs: { id: "p_status", name: "status", disabled: "" }
          },
          [_c("option", { attrs: { value: "4" } }, [_vm._v("庫藏待上架")])]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-6" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_title" } }, [
              _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
              _vm._v("主標題\r\n                                ")
            ]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_title",
                name: "title",
                type: "text",
                value: "",
                required: "",
                autocomplete: "off"
              }
            })
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_subtitle" } }, [_vm._v("副標題")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_subtitle",
                name: "subtitle",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-9" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_author" } }, [_vm._v("作者")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_author",
                name: "author",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_position" } }, [_vm._v("位置")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_position",
                name: "position",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-9" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_translator" } }, [_vm._v("譯者")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_translator",
                name: "translator",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-3" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_language" } }, [_vm._v("語言")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_language",
                name: "language",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-8" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_publisher" } }, [_vm._v("出版商")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_publisher",
                name: "publisher",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-md-4" }, [
          _c("div", { staticClass: "form-group" }, [
            _c("label", { attrs: { for: "p_edition" } }, [_vm._v("版次")]),
            _vm._v(" "),
            _c("input", {
              staticClass: "form-control",
              attrs: {
                id: "p_edition",
                name: "edition",
                type: "text",
                value: "",
                autocomplete: "off"
              }
            })
          ])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-md-6" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "p_published_date" } }, [
            _vm._v("出版日期")
          ]),
          _vm._v(" "),
          _c("input", {
            staticClass: "form-control",
            attrs: {
              id: "p_published_date",
              name: "published_date",
              type: "text",
              value: "",
              autocomplete: "off"
            }
          })
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-6" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "p_category" } }, [_vm._v("圖書類別")]),
          _vm._v(" "),
          _c(
            "select",
            {
              staticClass: "form-control",
              attrs: { id: "p_category", name: "category" }
            },
            [
              _c("option", { attrs: { value: "11" } }, [_vm._v("論文")]),
              _vm._v(" "),
              _c("option", { attrs: { value: "12" } }, [_vm._v("期刊雜誌")])
            ]
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row mb-2" }, [
      _c("div", { staticClass: "col-md-12" }, [
        _c("div", { staticClass: "form-group" }, [
          _c("label", { attrs: { for: "p_content" } }, [_vm._v("備註內容")]),
          _vm._v(" "),
          _c("textarea", {
            staticClass: "form-control",
            attrs: { name: "content", id: "p_content", cols: "30", rows: "3" }
          })
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=template&id=576b60a9&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=template&id=576b60a9& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-select",
    {
      attrs: {
        label: "id",
        filterable: false,
        options: _vm.options,
        reduce: function(option) {
          return option.id
        }
      },
      on: { search: _vm.onSearch, input: _vm.onChange },
      scopedSlots: _vm._u([
        {
          key: "option",
          fn: function(option) {
            return [
              _c("div", { staticClass: "d-center" }, [
                _vm._v(
                  "\r\n            " + _vm._s(option.name) + "\r\n        "
                )
              ])
            ]
          }
        },
        {
          key: "selected-option",
          fn: function(option) {
            return [
              _c("div", { staticClass: "selected d-center" }, [
                _vm._v(
                  "\r\n            " + _vm._s(option.name) + "\r\n        "
                )
              ])
            ]
          }
        }
      ]),
      model: {
        value: _vm.selectValue,
        callback: function($$v) {
          _vm.selectValue = $$v
        },
        expression: "selectValue"
      }
    },
    [
      _c("template", { slot: "no-options" }, [
        _vm._v("\r\n        " + _vm._s(_vm.placeholder) + "\r\n    ")
      ])
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/UploadImages.vue?vue&type=template&id=43e6710a&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Partials/UploadImages.vue?vue&type=template&id=43e6710a& ***!
  \************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "form-group" }, [
      _c(
        "div",
        {
          staticClass: "col-md-12 px-0",
          attrs: { id: _vm.prefix + "_preview-image-div" }
        },
        [
          _c("img", {
            staticClass: "img-fluid rounded",
            attrs: { id: _vm.prefix + "_preview-image", src: _vm.uploadimg }
          })
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "form-group" }, [
      _c(
        "label",
        { staticClass: "mb-2", attrs: { for: _vm.prefix + "_image_file" } },
        [_vm._v("\r\n            " + _vm._s(_vm.title) + "\r\n        ")]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "custom-file" }, [
        _c("input", {
          attrs: {
            type: "hidden",
            id: _vm.prefix + "_image_url",
            name: "image_url"
          },
          domProps: { value: _vm.ImageURL }
        }),
        _vm._v(" "),
        _c("input", {
          attrs: {
            type: "hidden",
            id: _vm.prefix + "_image_data",
            name: "image_data"
          },
          domProps: { value: _vm.cropData }
        }),
        _vm._v(" "),
        _c("input", {
          staticClass: "custom-file-input",
          attrs: {
            type: "file",
            id: _vm.prefix + "_image_file",
            name: "image_file",
            accept: "image/jpeg,image/png,image/bmp",
            "aria-describedby": "PictureHelp"
          },
          on: { change: _vm.spwanPreviewImg }
        }),
        _vm._v(" "),
        _c(
          "small",
          {
            staticClass: "form-text text-muted",
            attrs: { id: _vm.prefix + "_PictureHelp" }
          },
          [_vm._v("僅支援JPG、JPEG、PNG與BMP格式圖片，且檔案大小上限為20MB。")]
        ),
        _vm._v(" "),
        _c(
          "label",
          {
            staticClass: "custom-file-label",
            attrs: {
              id: _vm.prefix + "_file_label",
              for: _vm.prefix + "_image_file"
            }
          },
          [_vm._v("請選擇檔案")]
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/books/create.js":
/*!**************************************!*\
  !*** ./resources/js/books/create.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('book-create-form', __webpack_require__(/*! ./../components/Books/BookCreateForm.vue */ "./resources/js/components/Books/BookCreateForm.vue")["default"]);
Vue.component('upload-images', __webpack_require__(/*! ./../components/Partials/UploadImages.vue */ "./resources/js/components/Partials/UploadImages.vue")["default"]);
Vue.component('select-donor-custom', __webpack_require__(/*! ./../components/Partials/SelectDonorCustom.vue */ "./resources/js/components/Partials/SelectDonorCustom.vue")["default"]);
var app = new Vue({
  el: '#book',
  data: function data() {
    return {};
  },
  methods: {},
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ "./resources/js/components/Books/BookCreateForm.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/Books/BookCreateForm.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _BookCreateForm_vue_vue_type_template_id_bf3ab08e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BookCreateForm.vue?vue&type=template&id=bf3ab08e& */ "./resources/js/components/Books/BookCreateForm.vue?vue&type=template&id=bf3ab08e&");
/* harmony import */ var _BookCreateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BookCreateForm.vue?vue&type=script&lang=js& */ "./resources/js/components/Books/BookCreateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./BookCreateForm.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _BookCreateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _BookCreateForm_vue_vue_type_template_id_bf3ab08e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _BookCreateForm_vue_vue_type_template_id_bf3ab08e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Books/BookCreateForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Books/BookCreateForm.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/Books/BookCreateForm.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./BookCreateForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--8-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--8-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./BookCreateForm.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_8_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/Books/BookCreateForm.vue?vue&type=template&id=bf3ab08e&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Books/BookCreateForm.vue?vue&type=template&id=bf3ab08e& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_template_id_bf3ab08e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./BookCreateForm.vue?vue&type=template&id=bf3ab08e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookCreateForm.vue?vue&type=template&id=bf3ab08e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_template_id_bf3ab08e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BookCreateForm_vue_vue_type_template_id_bf3ab08e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Partials/SelectDonorCustom.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/Partials/SelectDonorCustom.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SelectDonorCustom_vue_vue_type_template_id_576b60a9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SelectDonorCustom.vue?vue&type=template&id=576b60a9& */ "./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=template&id=576b60a9&");
/* harmony import */ var _SelectDonorCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SelectDonorCustom.vue?vue&type=script&lang=js& */ "./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SelectDonorCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SelectDonorCustom_vue_vue_type_template_id_576b60a9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SelectDonorCustom_vue_vue_type_template_id_576b60a9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Partials/SelectDonorCustom.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SelectDonorCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./SelectDonorCustom.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SelectDonorCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=template&id=576b60a9&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=template&id=576b60a9& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SelectDonorCustom_vue_vue_type_template_id_576b60a9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./SelectDonorCustom.vue?vue&type=template&id=576b60a9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/SelectDonorCustom.vue?vue&type=template&id=576b60a9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SelectDonorCustom_vue_vue_type_template_id_576b60a9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SelectDonorCustom_vue_vue_type_template_id_576b60a9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Partials/UploadImages.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/Partials/UploadImages.vue ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UploadImages_vue_vue_type_template_id_43e6710a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UploadImages.vue?vue&type=template&id=43e6710a& */ "./resources/js/components/Partials/UploadImages.vue?vue&type=template&id=43e6710a&");
/* harmony import */ var _UploadImages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UploadImages.vue?vue&type=script&lang=js& */ "./resources/js/components/Partials/UploadImages.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UploadImages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UploadImages_vue_vue_type_template_id_43e6710a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UploadImages_vue_vue_type_template_id_43e6710a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Partials/UploadImages.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Partials/UploadImages.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/Partials/UploadImages.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UploadImages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./UploadImages.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/UploadImages.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UploadImages_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Partials/UploadImages.vue?vue&type=template&id=43e6710a&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/Partials/UploadImages.vue?vue&type=template&id=43e6710a& ***!
  \******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UploadImages_vue_vue_type_template_id_43e6710a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./UploadImages.vue?vue&type=template&id=43e6710a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/UploadImages.vue?vue&type=template&id=43e6710a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UploadImages_vue_vue_type_template_id_43e6710a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UploadImages_vue_vue_type_template_id_43e6710a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 19:
/*!********************************************!*\
  !*** multi ./resources/js/books/create.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\AppServ\www\WaninLibary\resources\js\books\create.js */"./resources/js/books/create.js");


/***/ })

/******/ });