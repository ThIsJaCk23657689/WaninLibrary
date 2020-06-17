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
/******/ 	return __webpack_require__(__webpack_require__.s = 21);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookUpdateForm.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Books/BookUpdateForm.vue?vue&type=script&lang=js& ***!
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['book', 'addType'],
  data: function data() {
    return {
      BooksIndexURL: $('#BooksIndexURL').html(),
      BooksUpdateURL: $('#BooksUpdateURL').html(),
      DonorsNameURL: $('#DonorsNameURL').html(),
      BooksCoverImageURL: $('#BooksCoverImageURL').html(),
      title: '書籍圖片',
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
      status_options: [{
        id: 1,
        text: '可借閱'
      }, // {id: 2, text: '借閱中'},
      // {id: 3, text: '逾期中'},
      {
        id: 4,
        text: '庫藏待上架'
      }, {
        id: 5,
        text: '已淘汰'
      }, {
        id: 6,
        text: '已轉贈'
      }, {
        id: 7,
        text: '可供免費索取'
      }, {
        id: 8,
        text: '已被索取'
      }, {
        id: 9,
        text: '無外借'
      }, {
        id: 10,
        text: '無歸還'
      }],
      donors: [],
      donorValue: null,
      bookInfo: []
    };
  },
  methods: {
    onSearch: function onSearch(search, loading, index) {
      loading(true);
      this.search(loading, search, this, index, this.donorValue);
    },
    search: _.debounce(function (loading, search, vm, index, selectID) {
      // alert(vm.DonorsNameURL);
      axios.get(vm.DonorsNameURL, {
        params: {
          keyword: search,
          selectID: selectID
        }
      }).then(function (response) {
        // console.log(response.data.book_list);
        vm.options = response.data.donors;
        vm.$refs.DonorsOption.changeOptions(vm.options); // vm.$refs.PaperDonorsOption.changeOptions(vm.options);

        loading(false);
      });
    }, 350),
    updateValue: function updateValue(value) {
      this.donorValue = value;
    },
    startUpdate: function startUpdate() {
      $('#donor_id_input').slideUp();
      $('#donor_id').slideDown();
    },
    changeAddType: function changeAddType(e) {
      // 更動入庫方式
      var x = $(e.target).val();

      if (x == '1') {
        console.log('bbb');
        this.$emit('update-add-type', 1); // this.addType = 1;
        // 捐贈入庫 - 一般圖書

        $('.donor_div').fadeIn();
        $('.price_div').fadeOut();
        $('#price').val(0); // 捐贈入庫 - 論文雜誌
      } else {
        console.log('ccc');
        this.$emit('update-add-type', 2); // this.addType = 2;
        // 採購入庫 - 一般圖書

        $('.donor_div').fadeOut();
        $('.price_div').fadeIn();
        $('#price').val(0); // 採購入庫 - 論文雜誌
      }
    },
    updateCategory: function updateCategory(e) {
      var $callNum = $('#callnum').val();

      if ($callNum.length >= 3 && Number.isInteger(parseInt($callNum[0] + $callNum[1] + $callNum[2]))) {
        $('#callnum').removeClass('is-invalid');

        if ($callNum[0] < 6) {
          // 前面6類，可以靠分類號第一碼來判斷。
          this.book.category = $callNum[0];
        } else {
          // 第六類到第七類，必須還要再看第二碼。
          if ($callNum[0] == 6) {
            if ($callNum[1] == 0) {
              this.book.category = 6;
            } else {
              this.book.category = 7;
            }
          } else {
            if ($callNum[0] == 7) {
              if ($callNum[1] == 0) {
                this.book.category = 7;
              } else {
                this.book.category = 8;
              }
            } else {
              this.book.category = parseInt($callNum[0]) + 1;
            }
          }
        }
      } else {
        $('#callnum').addClass('is-invalid');
        $('#callnum_error').html('<strong>分類號至少要三碼以上且為數字。</strong>');
      }
    },
    bookUpdateForm: function bookUpdateForm(e) {
      var url = $(e.target).attr('action'); // let data = $(e.target).serializeObject();
      // formdata 是不可以被console.log的，只會回傳空object。

      $('#category').attr('disabled', false);
      var formdata = new FormData($(e.target)[0]);
      formdata.append('donor_id', this.donorValue);
      formdata.append('_method', 'patch');
      $.showLoadingModal();
      axios.post(url, formdata, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (response) {
        // this.$refs.uploadBookImages.stopCropper();
        $.showSuccessModal('修改成功', response.data.url, '檢視書籍');
      })["catch"](function (error) {
        console.error('修改書籍時發生錯誤，錯誤訊息：' + error);
        $.showErrorModal(error);
      });
    }
  },
  created: function created() {// let DonorsListURL = $('#DonorsListURL').html();
    // axios.get(DonorsListURL).then(response => {
    //     this.donors = response.data.donors;
    //     for(let i = 0; i < this.donors.length; i++){
    //         $("#donor_id").append($("<option></option>").attr("value", this.donors[i].id).text(this.donors[i].name));
    //         // $("#p_donor_id").append($("<option></option>").attr("value", this.donors[i].id).text(this.donors[i].name));
    //     }
    //     $('#donor_id').selectpicker('refresh');
    //     // $('#p_donor_id').selectpicker('refresh');
    // });
  },
  mounted: function mounted() {}
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookUpdateForm.vue?vue&type=template&id=c579baf4&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Books/BookUpdateForm.vue?vue&type=template&id=c579baf4& ***!
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
      _vm.book.category < 11 || _vm.book.category === 13
        ? _c("div", [
            _c(
              "form",
              {
                attrs: {
                  id: "book_update_form",
                  method: "POST",
                  action: _vm.BooksUpdateURL,
                  enctype: "multipart/form-data"
                },
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.bookUpdateForm($event)
                  }
                }
              },
              [
                _vm.addType === 2
                  ? _c("div", [
                      _c("div", { staticClass: "row" }, [
                        _c("div", { staticClass: "col-md-3" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "addType" } }, [
                              _vm._v("入庫方式")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "addType", name: "addType" },
                                domProps: { value: _vm.addType },
                                on: { change: _vm.changeAddType }
                              },
                              [
                                _c("option", { attrs: { value: "1" } }, [
                                  _vm._v("捐贈入庫")
                                ]),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "2" } }, [
                                  _vm._v("採購入庫")
                                ])
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-3" }, [
                          _c(
                            "div",
                            {
                              staticClass: "form-group donor_div",
                              staticStyle: { display: "none" }
                            },
                            [
                              _vm._m(0),
                              _vm._v(" "),
                              _c(
                                "div",
                                { attrs: { id: "donor_id" } },
                                [
                                  _c("select-donor-custom", {
                                    ref: "DonorsOption",
                                    attrs: {
                                      placeholder: "請輸入捐贈人(單位)名稱"
                                    },
                                    on: {
                                      search: _vm.onSearch,
                                      "update-value": _vm.updateValue
                                    }
                                  })
                                ],
                                1
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-2" }, [
                          _c("div", { staticClass: "form-group price_div" }, [
                            _vm._m(1),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.book.price,
                                  expression: "book.price"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                id: "price",
                                name: "price",
                                type: "text"
                              },
                              domProps: { value: _vm.book.price },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.book,
                                    "price",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "status" } }, [
                              _vm._v("狀態")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "status", name: "status" },
                                domProps: { value: _vm.book.status }
                              },
                              _vm._l(_vm.status_options, function(option) {
                                return _c(
                                  "option",
                                  {
                                    key: option.id,
                                    domProps: { value: option.id }
                                  },
                                  [_vm._v(_vm._s(option.text))]
                                )
                              }),
                              0
                            )
                          ])
                        ])
                      ])
                    ])
                  : _c("div", [
                      _c("div", { staticClass: "row" }, [
                        _c("div", { staticClass: "col-md-3" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "addType" } }, [
                              _vm._v("入庫方式")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "addType", name: "addType" },
                                domProps: { value: _vm.addType },
                                on: { change: _vm.changeAddType }
                              },
                              [
                                _c("option", { attrs: { value: "1" } }, [
                                  _vm._v("捐贈入庫")
                                ]),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "2" } }, [
                                  _vm._v("採購入庫")
                                ])
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-3" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _vm._m(2),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "input-group mb-3",
                                attrs: { id: "donor_id_input" }
                              },
                              [
                                _c("input", {
                                  staticClass: "form-control",
                                  attrs: { type: "text", readonly: "" },
                                  domProps: { value: _vm.book.donor.name }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "input-group-append" },
                                  [
                                    _c(
                                      "button",
                                      {
                                        staticClass: "btn btn-dark",
                                        attrs: { type: "button" },
                                        on: { click: _vm.startUpdate }
                                      },
                                      [_vm._v("編輯")]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticStyle: { display: "none" },
                                attrs: { id: "donor_id" }
                              },
                              [
                                _c("select-donor-custom", {
                                  ref: "DonorsOption",
                                  attrs: {
                                    placeholder: "請輸入捐贈人(單位)名稱"
                                  },
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
                        _c("div", { staticClass: "col-md-2" }, [
                          _c(
                            "div",
                            {
                              staticClass: "form-group price_div",
                              staticStyle: { display: "none" }
                            },
                            [
                              _vm._m(3),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.book.price,
                                    expression: "book.price"
                                  }
                                ],
                                staticClass: "form-control",
                                attrs: {
                                  id: "price",
                                  name: "price",
                                  type: "text"
                                },
                                domProps: { value: _vm.book.price },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.book,
                                      "price",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "status" } }, [
                              _vm._v("狀態")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "status", name: "status" },
                                domProps: { value: _vm.book.status }
                              },
                              _vm._l(_vm.status_options, function(option) {
                                return _c(
                                  "option",
                                  {
                                    key: option.id,
                                    domProps: { value: option.id }
                                  },
                                  [_vm._v(_vm._s(option.text))]
                                )
                              }),
                              0
                            )
                          ])
                        ])
                      ])
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
                          uploadimg: _vm.BooksCoverImageURL,
                          title: _vm.title,
                          "aspect-ratio": 15 / 21,
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
                          _vm._m(4),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.title,
                                expression: "book.title"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "title",
                              name: "title",
                              type: "text",
                              required: "",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.title },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(_vm.book, "title", $event.target.value)
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "subtitle" } }, [
                            _vm._v("副標題")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.subtitle,
                                expression: "book.subtitle"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "subtitle",
                              name: "subtitle",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.subtitle },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "subtitle",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-9" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "author" } }, [
                            _vm._v("作者")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.author,
                                expression: "book.author"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "author",
                              name: "author",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.author },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "author",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-3" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "position" } }, [
                            _vm._v("位置")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.position,
                                expression: "book.position"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "position",
                              name: "position",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.position },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "position",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-9" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "translator" } }, [
                            _vm._v("譯者")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.translator,
                                expression: "book.translator"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "translator",
                              name: "translator",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.translator },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "translator",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-3" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "language" } }, [
                            _vm._v("語言")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.language,
                                expression: "book.language"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "language",
                              name: "language",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.language },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "language",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-8" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "publisher" } }, [
                            _vm._v("出版商")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.publisher,
                                expression: "book.publisher"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "publisher",
                              name: "publisher",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.publisher },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "publisher",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-4" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "edition" } }, [
                            _vm._v("版次")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.edition,
                                expression: "book.edition"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "edition",
                              name: "edition",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.edition },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "edition",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-3" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("label", { attrs: { for: "published_date" } }, [
                        _vm._v("出版日期")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.book.published_date,
                            expression: "book.published_date"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          id: "published_date",
                          name: "published_date",
                          type: "text",
                          autocomplete: "off"
                        },
                        domProps: { value: _vm.book.published_date },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.book,
                              "published_date",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("label", { attrs: { for: "isbn" } }, [_vm._v("ISBN")]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.book.isbn,
                            expression: "book.isbn"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          id: "isbn",
                          name: "isbn",
                          type: "text",
                          autocomplete: "off"
                        },
                        domProps: { value: _vm.book.isbn },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.book, "isbn", $event.target.value)
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-3" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _vm._m(5),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.book.callnum,
                            expression: "book.callnum"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          id: "callnum",
                          name: "callnum",
                          type: "text",
                          autocomplete: "off"
                        },
                        domProps: { value: _vm.book.callnum },
                        on: {
                          input: [
                            function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.book, "callnum", $event.target.value)
                            },
                            _vm.updateCategory
                          ]
                        }
                      }),
                      _vm._v(" "),
                      _vm._m(6)
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
                          attrs: {
                            id: "category",
                            name: "category",
                            disabled: ""
                          },
                          domProps: { value: _vm.book.category }
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
                _c("div", { staticClass: "row mb-2" }, [
                  _c("div", { staticClass: "col-md-12" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("label", { attrs: { for: "content" } }, [
                        _vm._v("備註內容")
                      ]),
                      _vm._v(" "),
                      _c("textarea", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.book.content,
                            expression: "book.content"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          name: "content",
                          id: "content",
                          cols: "30",
                          rows: "3"
                        },
                        domProps: { value: _vm.book.content },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.book, "content", $event.target.value)
                          }
                        }
                      })
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "form-group row justify-content-center" },
                  [
                    _c("div", { staticClass: "col-md-8" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-block btn-primary",
                          attrs: { type: "submit" }
                        },
                        [
                          _vm._v(
                            "\n                            確認修改\n                        "
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
                            "\n                            返回列表\n                        "
                          )
                        ]
                      )
                    ])
                  ]
                )
              ]
            )
          ])
        : _c("div", [
            _c(
              "form",
              {
                attrs: {
                  id: "book_update_form",
                  method: "POST",
                  action: _vm.BooksUpdateURL,
                  enctype: "multipart/form-data"
                },
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.bookUpdateForm($event)
                  }
                }
              },
              [
                _vm.addType === 2
                  ? _c("div", [
                      _c("div", { staticClass: "row" }, [
                        _c("div", { staticClass: "col-md-3" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "addType" } }, [
                              _vm._v("入庫方式")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "addType", name: "addType" },
                                domProps: { value: _vm.addType },
                                on: { change: _vm.changeAddType }
                              },
                              [
                                _c("option", { attrs: { value: "1" } }, [
                                  _vm._v("捐贈入庫")
                                ]),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "2" } }, [
                                  _vm._v("採購入庫")
                                ])
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-3" }, [
                          _c(
                            "div",
                            {
                              staticClass: "form-group donor_div",
                              staticStyle: { display: "none" }
                            },
                            [
                              _vm._m(7),
                              _vm._v(" "),
                              _c(
                                "div",
                                { attrs: { id: "donor_id" } },
                                [
                                  _c("select-donor-custom", {
                                    ref: "DonorsOption",
                                    attrs: {
                                      placeholder: "請輸入捐贈人(單位)名稱"
                                    },
                                    on: {
                                      search: _vm.onSearch,
                                      "update-value": _vm.updateValue
                                    }
                                  })
                                ],
                                1
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-2" }, [
                          _c("div", { staticClass: "form-group price_div" }, [
                            _vm._m(8),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.book.price,
                                  expression: "book.price"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                id: "price",
                                name: "price",
                                type: "text"
                              },
                              domProps: { value: _vm.book.price },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.book,
                                    "price",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "status" } }, [
                              _vm._v("狀態")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "status", name: "status" },
                                domProps: { value: _vm.book.status }
                              },
                              _vm._l(_vm.status_options, function(option) {
                                return _c(
                                  "option",
                                  {
                                    key: option.id,
                                    domProps: { value: option.id }
                                  },
                                  [_vm._v(_vm._s(option.text))]
                                )
                              }),
                              0
                            )
                          ])
                        ])
                      ])
                    ])
                  : _c("div", [
                      _c("div", { staticClass: "row" }, [
                        _c("div", { staticClass: "col-md-3" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "addType" } }, [
                              _vm._v("入庫方式")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "addType", name: "addType" },
                                domProps: { value: _vm.addType },
                                on: { change: _vm.changeAddType }
                              },
                              [
                                _c("option", { attrs: { value: "1" } }, [
                                  _vm._v("捐贈入庫")
                                ]),
                                _vm._v(" "),
                                _c("option", { attrs: { value: "2" } }, [
                                  _vm._v("採購入庫")
                                ])
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-3" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _vm._m(9),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "input-group mb-3",
                                attrs: { id: "donor_id_input" }
                              },
                              [
                                _c("input", {
                                  staticClass: "form-control",
                                  attrs: { type: "text", readonly: "" },
                                  domProps: { value: _vm.book.donor.name }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "input-group-append" },
                                  [
                                    _c(
                                      "button",
                                      {
                                        staticClass: "btn btn-dark",
                                        attrs: { type: "button" },
                                        on: { click: _vm.startUpdate }
                                      },
                                      [_vm._v("編輯")]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticStyle: { display: "none" },
                                attrs: { id: "donor_id" }
                              },
                              [
                                _c("select-donor-custom", {
                                  ref: "DonorsOption",
                                  attrs: {
                                    placeholder: "請輸入捐贈人(單位)名稱名稱"
                                  },
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
                        _c("div", { staticClass: "col-md-2" }, [
                          _c(
                            "div",
                            {
                              staticClass: "form-group price_div",
                              staticStyle: { display: "none" }
                            },
                            [
                              _vm._m(10),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.book.price,
                                    expression: "book.price"
                                  }
                                ],
                                staticClass: "form-control",
                                attrs: {
                                  id: "price",
                                  name: "price",
                                  type: "text"
                                },
                                domProps: { value: _vm.book.price },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.book,
                                      "price",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("div", { staticClass: "form-group" }, [
                            _c("label", { attrs: { for: "status" } }, [
                              _vm._v("狀態")
                            ]),
                            _vm._v(" "),
                            _c(
                              "select",
                              {
                                staticClass: "form-control",
                                attrs: { id: "status", name: "status" },
                                domProps: { value: _vm.book.status }
                              },
                              _vm._l(_vm.status_options, function(option) {
                                return _c(
                                  "option",
                                  {
                                    key: option.id,
                                    domProps: { value: option.id }
                                  },
                                  [_vm._v(_vm._s(option.text))]
                                )
                              }),
                              0
                            )
                          ])
                        ])
                      ])
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
                          uploadimg: _vm.BooksCoverImageURL,
                          title: _vm.title,
                          "aspect-ratio": 15 / 21,
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
                          _vm._m(11),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.title,
                                expression: "book.title"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "title",
                              name: "title",
                              type: "text",
                              required: "",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.title },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(_vm.book, "title", $event.target.value)
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-12" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "subtitle" } }, [
                            _vm._v("副標題")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.subtitle,
                                expression: "book.subtitle"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "subtitle",
                              name: "subtitle",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.subtitle },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "subtitle",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-9" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "author" } }, [
                            _vm._v("作者")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.author,
                                expression: "book.author"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "author",
                              name: "author",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.author },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "author",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-3" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "position" } }, [
                            _vm._v("位置")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.position,
                                expression: "book.position"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "position",
                              name: "position",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.position },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "position",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-9" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "translator" } }, [
                            _vm._v("譯者")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.translator,
                                expression: "book.translator"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "translator",
                              name: "translator",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.translator },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "translator",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-3" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "language" } }, [
                            _vm._v("語言")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.language,
                                expression: "book.language"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "language",
                              name: "language",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.language },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "language",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-8" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "publisher" } }, [
                            _vm._v("出版商")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.publisher,
                                expression: "book.publisher"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "publisher",
                              name: "publisher",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.publisher },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "publisher",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-4" }, [
                        _c("div", { staticClass: "form-group" }, [
                          _c("label", { attrs: { for: "edition" } }, [
                            _vm._v("版次")
                          ]),
                          _vm._v(" "),
                          _c("input", {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.book.edition,
                                expression: "book.edition"
                              }
                            ],
                            staticClass: "form-control",
                            attrs: {
                              id: "edition",
                              name: "edition",
                              type: "text",
                              autocomplete: "off"
                            },
                            domProps: { value: _vm.book.edition },
                            on: {
                              input: function($event) {
                                if ($event.target.composing) {
                                  return
                                }
                                _vm.$set(
                                  _vm.book,
                                  "edition",
                                  $event.target.value
                                )
                              }
                            }
                          })
                        ])
                      ])
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-md-6" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("label", { attrs: { for: "published_date" } }, [
                        _vm._v("期數/出版日期")
                      ]),
                      _vm._v(" "),
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.book.published_date,
                            expression: "book.published_date"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          id: "published_date",
                          name: "published_date",
                          type: "text",
                          autocomplete: "off"
                        },
                        domProps: { value: _vm.book.published_date },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.book,
                              "published_date",
                              $event.target.value
                            )
                          }
                        }
                      })
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-md-6" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("label", { attrs: { for: "category" } }, [
                        _vm._v("圖書類別")
                      ]),
                      _vm._v(" "),
                      _c(
                        "select",
                        {
                          staticClass: "form-control",
                          attrs: { id: "category", name: "category" },
                          domProps: { value: _vm.book.category }
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
                _c("div", { staticClass: "row mb-2" }, [
                  _c("div", { staticClass: "col-md-12" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("label", { attrs: { for: "content" } }, [
                        _vm._v("備註內容")
                      ]),
                      _vm._v(" "),
                      _c("textarea", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.book.content,
                            expression: "book.content"
                          }
                        ],
                        staticClass: "form-control",
                        attrs: {
                          name: "content",
                          id: "content",
                          cols: "30",
                          rows: "3"
                        },
                        domProps: { value: _vm.book.content },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.book, "content", $event.target.value)
                          }
                        }
                      })
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "form-group row justify-content-center" },
                  [
                    _c("div", { staticClass: "col-md-8" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-block btn-primary",
                          attrs: { type: "submit" }
                        },
                        [
                          _vm._v(
                            "\n                            確認修改\n                        "
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
                            "\n                            返回列表\n                        "
                          )
                        ]
                      )
                    ])
                  ]
                )
              ]
            )
          ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("捐贈人(單位)名稱")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "price" } }, [
      _c(
        "span",
        {
          staticClass: "text-danger mr-2",
          attrs: { id: "price_required_star" }
        },
        [_vm._v("*")]
      ),
      _vm._v("價格")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("捐贈人(單位)名稱")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "price" } }, [
      _c(
        "span",
        {
          staticClass: "text-danger mr-2",
          attrs: { id: "price_required_star" }
        },
        [_vm._v("*")]
      ),
      _vm._v("價格")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "title" } }, [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("書名（主標題）\n                                    ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "callnum" } }, [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("分類號\n                            ")
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
    return _c("label", [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("捐贈人(單位)名稱")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "price" } }, [
      _c(
        "span",
        {
          staticClass: "text-danger mr-2",
          attrs: { id: "price_required_star" }
        },
        [_vm._v("*")]
      ),
      _vm._v("價格")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("捐贈人(單位)名稱")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "price" } }, [
      _c(
        "span",
        {
          staticClass: "text-danger mr-2",
          attrs: { id: "price_required_star" }
        },
        [_vm._v("*")]
      ),
      _vm._v("價格")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "title" } }, [
      _c("span", { staticClass: "text-danger mr-2" }, [_vm._v("*")]),
      _vm._v("書名（主標題）\n                                    ")
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
                _vm._v("\n            " + _vm._s(option.name) + "\n        ")
              ])
            ]
          }
        },
        {
          key: "selected-option",
          fn: function(option) {
            return [
              _c("div", { staticClass: "selected d-center" }, [
                _vm._v("\n            " + _vm._s(option.name) + "\n        ")
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
        _vm._v("\n        " + _vm._s(_vm.placeholder) + "\n    ")
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

/***/ "./resources/js/books/edit.js":
/*!************************************!*\
  !*** ./resources/js/books/edit.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('book-update-form', __webpack_require__(/*! ./../components/Books/BookUpdateForm.vue */ "./resources/js/components/Books/BookUpdateForm.vue")["default"]);
Vue.component('upload-images', __webpack_require__(/*! ./../components/Partials/UploadImages.vue */ "./resources/js/components/Partials/UploadImages.vue")["default"]);
Vue.component('select-donor-custom', __webpack_require__(/*! ./../components/Partials/SelectDonorCustom.vue */ "./resources/js/components/Partials/SelectDonorCustom.vue")["default"]);
var app = new Vue({
  el: '#book',
  data: function data() {
    return {
      book: [],
      addType: null
    };
  },
  methods: {
    updateAddType: function updateAddType(value) {
      console.log('changeAddType:' + value);
      this.addType = value;
    }
  },
  created: function created() {
    var _this = this;

    var BooksGetOneURL = $('#BooksGetOneURL').html();
    axios.get(BooksGetOneURL).then(function (response) {
      _this.book = response.data.book;

      if (_this.book.donor_id) {
        // 捐贈
        _this.addType = 1;
      } else {
        // 採購
        _this.addType = 2;
        $('#donor_id').prop('disabled', true);
        $('#donor_id_required_star').fadeOut();
        $('#price').val('0').prop('disabled', false).attr('required', true);
      }
    });
  },
  mounted: function mounted() {
    console.log('edit.js mounted');
    console.log($('#category'));
  }
});

/***/ }),

/***/ "./resources/js/components/Books/BookUpdateForm.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/Books/BookUpdateForm.vue ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _BookUpdateForm_vue_vue_type_template_id_c579baf4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BookUpdateForm.vue?vue&type=template&id=c579baf4& */ "./resources/js/components/Books/BookUpdateForm.vue?vue&type=template&id=c579baf4&");
/* harmony import */ var _BookUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BookUpdateForm.vue?vue&type=script&lang=js& */ "./resources/js/components/Books/BookUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _BookUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _BookUpdateForm_vue_vue_type_template_id_c579baf4___WEBPACK_IMPORTED_MODULE_0__["render"],
  _BookUpdateForm_vue_vue_type_template_id_c579baf4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Books/BookUpdateForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Books/BookUpdateForm.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/Books/BookUpdateForm.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BookUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./BookUpdateForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BookUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Books/BookUpdateForm.vue?vue&type=template&id=c579baf4&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Books/BookUpdateForm.vue?vue&type=template&id=c579baf4& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BookUpdateForm_vue_vue_type_template_id_c579baf4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./BookUpdateForm.vue?vue&type=template&id=c579baf4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Books/BookUpdateForm.vue?vue&type=template&id=c579baf4&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BookUpdateForm_vue_vue_type_template_id_c579baf4___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BookUpdateForm_vue_vue_type_template_id_c579baf4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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

/***/ 21:
/*!******************************************!*\
  !*** multi ./resources/js/books/edit.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\AppServ\www\waninlibary\resources\js\books\edit.js */"./resources/js/books/edit.js");


/***/ })

/******/ });