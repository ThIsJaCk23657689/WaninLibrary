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
/******/ 	return __webpack_require__(__webpack_require__.s = 34);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=script&lang=js& ***!
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['borrowLogs', 'rowsPerPage', 'pageNum', 'totalPage'],
  data: function data() {
    return {};
  },
  methods: {
    getBorrowLogList: function getBorrowLogList(pageNum) {
      this.$emit('update-borrow-log', pageNum);
    },
    changeStatus: function changeStatus(e) {
      var status = e.target.value;
      this.$emit('change-status', status);
    },
    changeKeywords: function changeKeywords(e) {
      var keywords = e.target.value;
      this.$emit('change-keywords', keywords);
    },
    changeRange: function changeRange(e) {
      var data = $(e.target).serializeObject();
      var start_date = data.start_date;
      var end_date = data.end_date;
      this.$emit('change-range', start_date, end_date);
    }
  },
  created: function created() {},
  mounted: function mounted() {
    $("#start_date").datepicker({
      dateFormat: 'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: "-80:+0"
    });
    $("#end_date").datepicker({
      dateFormat: 'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: "-80:+0"
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/PaginateCustom.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Partials/PaginateCustom.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    pageNum: {
      type: Number,
      "default": 1
    },
    totalPage: {
      type: Number
    }
  },
  data: function data() {
    return {
      currentPageNum: this.pageNum
    };
  },
  methods: {
    chagePage: function chagePage(num) {
      // this.pageNum = num;
      this.$emit('updatePage', num);
    }
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=template&id=c0961dac&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=template&id=c0961dac& ***!
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
  return _c("div", [
    _c("div", { staticClass: "card mb-3" }, [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row justify-content-center" }, [
          _c(
            "div",
            {
              staticClass: "col-md-12 justify-content-center",
              attrs: { id: "" }
            },
            [
              _c(
                "form",
                {
                  attrs: { method: "GET", id: "time-range-form" },
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.changeRange($event)
                    }
                  }
                },
                [
                  _c(
                    "div",
                    { staticClass: "row mb-3 justify-content-center" },
                    [
                      _c("div", { staticClass: "col-md-2" }, [
                        _c(
                          "select",
                          {
                            staticClass: "form-control",
                            attrs: { name: "status", id: "status" },
                            on: { change: _vm.changeStatus }
                          },
                          [
                            _c("option", { attrs: { value: "5" } }, [
                              _vm._v("書籍狀態")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "1" } }, [
                              _vm._v("借閱中")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "2" } }, [
                              _vm._v("已歸還")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "3" } }, [
                              _vm._v("逾期過久無法討回")
                            ]),
                            _vm._v(" "),
                            _c("option", { attrs: { value: "4" } }, [
                              _vm._v("逾期中")
                            ])
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _vm._m(1),
                      _vm._v(" "),
                      _vm._m(2),
                      _vm._v(" "),
                      _vm._m(3),
                      _vm._v(" "),
                      _vm._m(4),
                      _vm._v(" "),
                      _vm._m(5)
                    ]
                  ),
                  _vm._v(" "),
                  _c("div", { staticClass: "row justify-content-center" }, [
                    _c("div", { staticClass: "col-md-6" }, [
                      _c("div", { staticClass: "form-group" }, [
                        _c("input", {
                          staticClass: "form-control mb-2",
                          attrs: {
                            id: "keywords",
                            name: "keywords",
                            type: "text",
                            value: "",
                            autocomplete: "off",
                            placeholder: "關鍵字搜尋..."
                          },
                          on: { change: _vm.changeKeywords }
                        })
                      ])
                    ])
                  ])
                ]
              )
            ]
          )
        ]),
        _vm._v(" "),
        _vm._m(6)
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "card-footer" },
        [
          _c("paginate-custom", {
            attrs: { pageNum: _vm.pageNum, totalPage: _vm.totalPage },
            on: { updatePage: _vm.getBorrowLogList }
          })
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header" }, [
      _c("i", { staticClass: "fas fa-table mr-2" }),
      _vm._v("借還書紀錄\r\n        ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-0 text-center py-1" }, [
      _c("label", { attrs: { for: "" } }, [_vm._v("從")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("input", {
        staticClass: "form-control mb-2",
        attrs: {
          id: "start_date",
          name: "start_date",
          type: "text",
          value: "",
          autocomplete: "off",
          required: "",
          placeholder: "例：2020-01-01"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-0 text-center py-1" }, [
      _c("label", { attrs: { for: "" } }, [_vm._v("到")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-3" }, [
      _c("input", {
        staticClass: "form-control mb-2",
        attrs: {
          id: "end_date",
          name: "end_date",
          type: "text",
          value: "",
          autocomplete: "off",
          required: "",
          placeholder: "例：2020-02-01"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-2" }, [
      _c(
        "button",
        { staticClass: "btn btn-block btn-primary", attrs: { type: "submit" } },
        [
          _vm._v(
            "\r\n                                    確認\r\n                                "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "table-responsive" }, [
      _c(
        "table",
        {
          staticClass: "table table-bordered",
          attrs: { id: "BorrowLogsDataTable", width: "100%", cellspacing: "0" }
        },
        [
          _c("thead", [
            _c("tr", [
              _c("th", [_vm._v("編號")]),
              _vm._v(" "),
              _c("th", [_vm._v("借閱人姓名")]),
              _vm._v(" "),
              _c("th", [_vm._v("書名")]),
              _vm._v(" "),
              _c("th", [_vm._v("圖書類別")]),
              _vm._v(" "),
              _c("th", [_vm._v("狀態")]),
              _vm._v(" "),
              _c("th", [_vm._v("日期")]),
              _vm._v(" "),
              _c("th", [_vm._v("操作")])
            ])
          ])
        ]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/PaginateCustom.vue?vue&type=template&id=d182b72c&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Partials/PaginateCustom.vue?vue&type=template&id=d182b72c& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
  return _c("paginate", {
    attrs: {
      value: _vm.pageNum,
      "page-count": _vm.totalPage,
      "click-handler": _vm.chagePage,
      "page-range": 5,
      "margin-pages": 2,
      "prev-text": "上一頁",
      "next-text": "下一頁",
      "container-class": "pagination justify-content-center",
      "page-class": "page-item",
      "page-link-class": "page-link",
      "prev-class": "page-item",
      "next-class": "page-item",
      "prev-link-class": "page-link",
      "next-link-class": "page-link",
      "active-class": "active"
    }
  })
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

/***/ "./resources/js/borrowLogs/index.js":
/*!******************************************!*\
  !*** ./resources/js/borrowLogs/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('borrow-logs-table', __webpack_require__(/*! ./../components/BorrowLogs/BorrowLogsTable.vue */ "./resources/js/components/BorrowLogs/BorrowLogsTable.vue")["default"]);
Vue.component('paginate-custom', __webpack_require__(/*! ./../components/Partials/PaginateCustom.vue */ "./resources/js/components/Partials/PaginateCustom.vue")["default"]);
var app = new Vue({
  el: '#borrowLog',
  data: function data() {
    return {
      rowsPerPage: 10,
      pageNum: 1,
      totalPage: 0,
      borrowLogs: [],
      DataTotalCount: 0,
      status: 5,
      keywords: '',
      start_date: '',
      end_date: ''
    };
  },
  methods: {
    changeStatus: function changeStatus(status) {
      this.status = status;
      this.updateBorrowLog(this.pageNum, true);
    },
    changeKeywords: function changeKeywords(keywords) {
      this.keywords = keywords;
      this.updateBorrowLog(this.pageNum, true);
    },
    changeRange: function changeRange(start_date, end_date) {
      this.start_date = start_date;
      this.end_date = end_date;
      this.updateBorrowLog(this.pageNum, true);
    },
    updateBorrowLog: function updateBorrowLog(pageNum, first_page) {
      var _this = this;

      if (first_page) {
        this.pageNum = 1;
      } else {
        this.pageNum = pageNum;
      }

      var skip = (pageNum - 1) * this.rowsPerPage;
      var take = this.rowsPerPage;
      var status = this.status;
      var keywords = this.keywords;
      var start_date = this.start_date;
      var end_date = this.end_date;
      var BorrowLogsGetList = $('#BorrowLogsGetList').html();
      $('.dataTables_processing', $('#BorrowLogsDataTable').closest('.dataTables_wrapper')).fadeIn();
      axios.get(BorrowLogsGetList, {
        params: {
          skip: skip,
          take: take,
          status: status,
          keywords: keywords,
          start_date: start_date,
          end_date: end_date,
          first_page: first_page
        }
      }).then(function (response) {
        console.log(response);
        _this.DataTotalCount = response.data.DataTotalCount;
        _this.totalPage = Math.ceil(_this.DataTotalCount / _this.rowsPerPage);
        _this.borrowLogs = response.data.logs;
        $('.dataTables_processing', $('#BorrowLogsDataTable').closest('.dataTables_wrapper')).fadeOut();
        $('#BorrowLogsDataTable').dataTable().fnClearTable();

        if (_this.borrowLogs.length != 0) {
          $('#BorrowLogsDataTable').dataTable().fnAddData(_this.borrowLogs);
        }
      })["catch"](function (error) {
        console.log(error);
      });
    }
  },
  created: function created() {
    var _this2 = this;

    var BorrowLogsGetList = $('#BorrowLogsGetList').html();
    axios.get(BorrowLogsGetList).then(function (response) {
      _this2.DataTotalCount = response.data.DataTotalCount;
      _this2.totalPage = Math.ceil(_this2.DataTotalCount / _this2.rowsPerPage);
      _this2.borrowLogs = response.data.logs;
      $('#BorrowLogsDataTable').on('draw.dt', function () {
        console.log('drawing a table');
      }).on('init.dt', function () {
        console.log('intial a table');
      }).dataTable({
        data: _this2.borrowLogs,
        columns: [{
          data: 'id'
        }, {
          data: 'borrower_name'
        }, {
          data: 'showTitle'
        }, {
          data: 'showCallNum'
        }, {
          data: 'showStatus'
        }, {
          data: 'created_at'
        }, {
          data: 'action'
        }],
        lengthChange: false,
        searching: false,
        pageLength: _this2.rowsPerPage,
        info: false,
        paging: false,
        processing: true
      });
    });
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ "./resources/js/components/BorrowLogs/BorrowLogsTable.vue":
/*!****************************************************************!*\
  !*** ./resources/js/components/BorrowLogs/BorrowLogsTable.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _BorrowLogsTable_vue_vue_type_template_id_c0961dac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BorrowLogsTable.vue?vue&type=template&id=c0961dac& */ "./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=template&id=c0961dac&");
/* harmony import */ var _BorrowLogsTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BorrowLogsTable.vue?vue&type=script&lang=js& */ "./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _BorrowLogsTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _BorrowLogsTable_vue_vue_type_template_id_c0961dac___WEBPACK_IMPORTED_MODULE_0__["render"],
  _BorrowLogsTable_vue_vue_type_template_id_c0961dac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/BorrowLogs/BorrowLogsTable.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BorrowLogsTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./BorrowLogsTable.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_BorrowLogsTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=template&id=c0961dac&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=template&id=c0961dac& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BorrowLogsTable_vue_vue_type_template_id_c0961dac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./BorrowLogsTable.vue?vue&type=template&id=c0961dac& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/BorrowLogs/BorrowLogsTable.vue?vue&type=template&id=c0961dac&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BorrowLogsTable_vue_vue_type_template_id_c0961dac___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_BorrowLogsTable_vue_vue_type_template_id_c0961dac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Partials/PaginateCustom.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/Partials/PaginateCustom.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PaginateCustom_vue_vue_type_template_id_d182b72c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PaginateCustom.vue?vue&type=template&id=d182b72c& */ "./resources/js/components/Partials/PaginateCustom.vue?vue&type=template&id=d182b72c&");
/* harmony import */ var _PaginateCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PaginateCustom.vue?vue&type=script&lang=js& */ "./resources/js/components/Partials/PaginateCustom.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PaginateCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PaginateCustom_vue_vue_type_template_id_d182b72c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PaginateCustom_vue_vue_type_template_id_d182b72c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Partials/PaginateCustom.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Partials/PaginateCustom.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/Partials/PaginateCustom.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PaginateCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PaginateCustom.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/PaginateCustom.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PaginateCustom_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Partials/PaginateCustom.vue?vue&type=template&id=d182b72c&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/Partials/PaginateCustom.vue?vue&type=template&id=d182b72c& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PaginateCustom_vue_vue_type_template_id_d182b72c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./PaginateCustom.vue?vue&type=template&id=d182b72c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Partials/PaginateCustom.vue?vue&type=template&id=d182b72c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PaginateCustom_vue_vue_type_template_id_d182b72c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PaginateCustom_vue_vue_type_template_id_d182b72c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 34:
/*!************************************************!*\
  !*** multi ./resources/js/borrowLogs/index.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\AppServ\www\WaninLibary\resources\js\borrowLogs\index.js */"./resources/js/borrowLogs/index.js");


/***/ })

/******/ });