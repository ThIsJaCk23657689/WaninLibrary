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
/******/ 	return __webpack_require__(__webpack_require__.s = 15);
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['uploadimg'],
  data: function data() {
    return {
      BooksIndexURL: $('#BooksIndexURL').html(),
      BooksStoreURL: $('#BooksStoreURL').html(),
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
      bookInfo: []
    };
  },
  methods: {
    changeAddType: function changeAddType(e) {
      // 更動入庫方式
      var x = $(e.target).val();

      if (x == '1') {
        // 捐贈入庫
        $('#donor_id').prop('disabled', false).selectpicker('refresh');
        $('#donor_id_required_star').fadeIn();
        $('#price').val('0').prop('disabled', true).attr('required', false);
        $('#price_required_star').fadeOut();
      } else {
        // 購滿入庫
        $('#donor_id').prop('disabled', true).selectpicker('refresh');
        $('#donor_id_required_star').fadeOut();
        $('#price').val('0').prop('disabled', false).attr('required', true);
        $('#price_required_star').fadeIn();
      }
    },
    updateCategory: function updateCategory(e) {
      var $callNum = $('#callnum').val();

      if ($callNum.length >= 3 && Number.isInteger(parseInt($callNum[0] + $callNum[1] + $callNum[2]))) {
        $('#callnum').removeClass('is-invalid');

        if ($callNum[0] < 6) {
          // 前面6類，可以靠索書號第一碼來判斷。
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
        $('#callnum_error').html('<strong>索書號至少要三碼以上且為數字。</strong>');
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
        // 此書籍是外文，索書號會抓取【杜威碼】
        $('#callnum').val(this.bookInfo.Dewey_callnum); // 種類選項強制鎖定13

        $('#category').val(13);
      } else {
        $('#callnum').val(this.bookInfo.callnum);
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

      $.showLoadingModal();
      axios.post(url, formdata, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (response) {
        // this.$refs.uploadBookImages.stopCropper();
        $.showSuccessModal('新增成功', response.data.url, '檢視書籍');
      })["catch"](function (error) {
        console.error('新增書本時發生錯誤，錯誤訊息：' + error);
        $.showErrorModal(error);
      });
      $('#category').attr('disabled', true);
    }
  },
  created: function created() {
    var _this2 = this;

    var DonorsListURL = $('#DonorsListURL').html();
    axios.get(DonorsListURL).then(function (response) {
      _this2.donors = response.data.donors;

      for (var i = 0; i < _this2.donors.length; i++) {
        $("#donor_id").append($("<option></option>").attr("value", _this2.donors[i].id).text(_this2.donors[i].name));
      }

      $('#donor_id').selectpicker('refresh');
    });
  },
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

    $('#donor_id').selectpicker({
      liveSearch: true
    });
  }
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
  props: ['uploadimg', 'title'],
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
      $('#preview-image').attr('src', this.ImageURL);
      $('#file_label').text('從爬蟲抓來的圖片');
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
          $('#file_label').text($('#image_file').prop('files')[0].name);

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
        $('#preview-image').cropper('replace', this.url);
      } else {
        $('#preview-image').attr('src', this.url);
        $('#preview-image').cropper({
          aspectRatio: 1 / 1,
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
        $('#preview-image').cropper('destroy');
        $('#preview-image').attr('src', this.uploadimg);
        $('#file_label').text('請選擇檔案');
        this.isCropActived = false;
      }
    }
  },
  created: function created() {},
  mounted: function mounted() {}
});

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
            _vm._m(2),
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
                  attrs: { uploadimg: _vm.uploadimg, title: _vm.title }
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
      _c("form", {
        staticStyle: { display: "none" },
        attrs: {
          id: "papper_create_form",
          method: "POST",
          action: _vm.BooksStoreURL
        }
      })
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
    return _c("div", { staticClass: "col-md-3" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", { attrs: { for: "donor_id" } }, [
          _c(
            "span",
            {
              staticClass: "text-danger mr-2",
              attrs: { id: "donor_id_required_star" }
            },
            [_vm._v("*")]
          ),
          _vm._v("捐贈人")
        ]),
        _vm._v(" "),
        _c(
          "select",
          {
            staticClass: "form-control",
            attrs: { id: "donor_id", name: "donor_id" }
          },
          [_c("option", { attrs: { value: "0" } }, [_vm._v("請選擇...")])]
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-2" }, [
      _c("div", { staticClass: "form-group" }, [
        _c("label", { attrs: { for: "price" } }, [
          _c(
            "span",
            {
              staticClass: "text-danger mr-2",
              staticStyle: { display: "none" },
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
            autocomplete: "off",
            disabled: ""
          }
        })
      ])
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
      _vm._v("索書號\r\n                        ")
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
  }
]
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
        { staticClass: "col-md-12 px-0", attrs: { id: "preview-image-div" } },
        [
          _c("img", {
            staticClass: "img-fluid rounded",
            attrs: { id: "preview-image", src: _vm.uploadimg }
          })
        ]
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "form-group" }, [
      _c("label", { staticClass: "mb-2", attrs: { for: "image_file" } }, [
        _vm._v("\r\n            " + _vm._s(_vm.title) + "\r\n        ")
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "custom-file" }, [
        _c("input", {
          attrs: { type: "hidden", id: "image_url", name: "image_url" },
          domProps: { value: _vm.ImageURL }
        }),
        _vm._v(" "),
        _c("input", {
          attrs: { type: "hidden", id: "image_data", name: "image_data" },
          domProps: { value: _vm.cropData }
        }),
        _vm._v(" "),
        _c("input", {
          staticClass: "custom-file-input",
          attrs: {
            type: "file",
            id: "image_file",
            name: "image_file",
            accept: "image/jpeg,image/png,image/bmp",
            "aria-describedby": "PictureHelp"
          },
          on: { change: _vm.spwanPreviewImg }
        }),
        _vm._v(" "),
        _c(
          "small",
          { staticClass: "form-text text-muted", attrs: { id: "PictureHelp" } },
          [_vm._v("僅支援JPG、JPEG、PNG與BMP格式圖片，且檔案大小上限為20MB。")]
        ),
        _vm._v(" "),
        _c(
          "label",
          {
            staticClass: "custom-file-label",
            attrs: { id: "file_label", for: "image_file" }
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
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
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

/***/ 15:
/*!********************************************!*\
  !*** multi ./resources/js/books/create.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\AppServ\www\WaninLibary\resources\js\books\create.js */"./resources/js/books/create.js");


/***/ })

/******/ });