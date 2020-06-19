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
/******/ 	return __webpack_require__(__webpack_require__.s = 25);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['unreturns', 'rowsPerPage', 'pageNum', 'totalPage'],
  data: function data() {
    return {
      filter: {
        status: 0,
        noticed: 0
      },
      keyword: {
        column: 0,
        content: ''
      },
      order: {
        column: 0,
        dir: 'asc'
      }
    };
  },
  methods: {
    changeStatus: function changeStatus() {
      this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
    },
    changeNoticed: function changeNoticed() {
      this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
    },
    changeColumn: function changeColumn() {
      this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
    },
    searchByKeyword: function searchByKeyword() {
      this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
    },
    changeOrderColumn: function changeOrderColumn() {
      this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
    },
    changeOrderDir: function changeOrderDir() {
      this.$emit('update-unreturns', this.pageNum, this.filter, this.keyword, this.order, true);
    },
    getUnreturnsList: function getUnreturnsList(pageNum) {
      this.$emit('update-unreturns', pageNum, this.filter, this.keyword, this.order, false);
    }
  },
  created: function created() {},
  mounted: function mounted() {}
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=template&id=32fada46&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=template&id=32fada46& ***!
  \**************************************************************************************************************************************************************************************************************************************/
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
          _c("div", { staticClass: "col-md-12 justify-content-center" }, [
            _c("div", { staticClass: "row mb-3 justify-content-center" }, [
              _c("div", { staticClass: "col-md-3" }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.filter.status,
                        expression: "filter.status"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { id: "status", name: "status" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.filter,
                            "status",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        },
                        _vm.changeStatus
                      ]
                    }
                  },
                  [
                    _c("option", { attrs: { value: "0" } }, [
                      _vm._v("所有狀態")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "1" } }, [_vm._v("未逾期")]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "2" } }, [_vm._v("逾期中")]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "3" } }, [
                      _vm._v("逾期過久無法討回")
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.filter.noticed,
                        expression: "filter.noticed"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { id: "noticed", name: "noticed" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.filter,
                            "noticed",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        },
                        _vm.changeNoticed
                      ]
                    }
                  },
                  [
                    _c("option", { attrs: { value: "0" } }, [
                      _vm._v("所有通知狀態")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "1" } }, [
                      _vm._v("郵件電話皆已通知")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "2" } }, [
                      _vm._v("郵件已通知、電話未通知")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "3" } }, [
                      _vm._v("郵件未通知、電話已通知")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "4" } }, [
                      _vm._v("郵件電話皆未通知")
                    ])
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row mb-3 justify-content-center" }, [
              _c("div", { staticClass: "col-md-2" }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.keyword.column,
                        expression: "keyword.column"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { id: "keyword_column", name: "keyword_column" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.keyword,
                            "column",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        },
                        _vm.changeColumn
                      ]
                    }
                  },
                  [
                    _c("option", { attrs: { value: "0" } }, [
                      _vm._v("所有欄位")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "1" } }, [
                      _vm._v("借閱人姓名")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "2" } }, [
                      _vm._v("書籍名稱")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "4" } }, [
                      _vm._v("借閱日期")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "5" } }, [
                      _vm._v("逾期日期")
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-4" }, [
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.keyword.content,
                      expression: "keyword.content"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: {
                    id: "keywords_content",
                    name: "keywords_content",
                    type: "text",
                    autocomplete: "off",
                    placeholder: "關鍵字搜尋..."
                  },
                  domProps: { value: _vm.keyword.content },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.keyword, "content", $event.target.value)
                    }
                  }
                })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-2" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-block btn-primary",
                    attrs: { type: "submit" },
                    on: { click: _vm.searchByKeyword }
                  },
                  [
                    _vm._v(
                      "\r\n                                搜尋\r\n                            "
                    )
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row mb-3 justify-content-center" }, [
              _c("div", { staticClass: "col-md-3" }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.order.column,
                        expression: "order.column"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { id: "status", name: "status" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.order,
                            "column",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        },
                        _vm.changeOrderColumn
                      ]
                    }
                  },
                  [
                    _c("option", { attrs: { value: "0" } }, [_vm._v("序號")]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "1" } }, [
                      _vm._v("借閱日期")
                    ]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "2" } }, [
                      _vm._v("逾期日期")
                    ])
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-md-3" }, [
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.order.dir,
                        expression: "order.dir"
                      }
                    ],
                    staticClass: "form-control",
                    attrs: { id: "noticed", name: "noticed" },
                    on: {
                      change: [
                        function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.order,
                            "dir",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        },
                        _vm.changeOrderDir
                      ]
                    }
                  },
                  [
                    _c("option", { attrs: { value: "asc" } }, [_vm._v("升序")]),
                    _vm._v(" "),
                    _c("option", { attrs: { value: "desc" } }, [_vm._v("降序")])
                  ]
                )
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _vm._m(1)
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "card-footer" },
        [
          _c("paginate-custom", {
            attrs: { pageNum: _vm.pageNum, totalPage: _vm.totalPage },
            on: { updatePage: _vm.getUnreturnsList }
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
      _vm._v("目前已借出和逾期列表\r\n        ")
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
          attrs: { id: "UnreturnsDataTable", width: "100%", cellspacing: "0" }
        },
        [
          _c("thead", [
            _c("tr", [
              _c("th", [_vm._v("序號")]),
              _vm._v(" "),
              _c("th", [_vm._v("借閱人名稱")]),
              _vm._v(" "),
              _c("th", [_vm._v("書籍名稱")]),
              _vm._v(" "),
              _c("th", [_vm._v("目前狀態")]),
              _vm._v(" "),
              _c("th", [_vm._v("借閱日期")]),
              _vm._v(" "),
              _c("th", [_vm._v("逾期日期")]),
              _vm._v(" "),
              _c("th", [_vm._v("通知狀態")]),
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

/***/ "./resources/js/circulation/unreturns/index.js":
/*!*****************************************************!*\
  !*** ./resources/js/circulation/unreturns/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('unreturns-table', __webpack_require__(/*! ./../../components/Circulation/Unreturns/UnreturnTable.vue */ "./resources/js/components/Circulation/Unreturns/UnreturnTable.vue")["default"]);
Vue.component('paginate-custom', __webpack_require__(/*! ./../../components/Partials/PaginateCustom.vue */ "./resources/js/components/Partials/PaginateCustom.vue")["default"]);
var app = new Vue({
  el: '#unreturn',
  data: function data() {
    return {
      rowsPerPage: 10,
      pageNum: 1,
      totalPage: 0,
      unreturns: [],
      DataTotalCount: 0
    };
  },
  methods: {
    updateUnreturns: function updateUnreturns(pageNum, filter, keyword, order, first_page) {
      var _this = this;

      var UnreturnsGetList = $('#UnreturnsGetList').html();

      if (first_page) {
        this.pageNum = 1;
      } else {
        this.pageNum = pageNum;
      }

      var skip = (pageNum - 1) * this.rowsPerPage;
      var take = this.rowsPerPage;
      $('.dataTables_processing', $('#UnreturnsDataTable').closest('.dataTables_wrapper')).fadeIn();
      axios.get(UnreturnsGetList, {
        params: {
          skip: skip,
          take: take,
          filter_status: filter.status,
          filter_noticed: filter.noticed,
          keyword_column: keyword.column,
          keyword_content: keyword.content,
          order_column: order.column,
          order_dir: order.dir,
          first_page: first_page
        }
      }).then(function (response) {
        _this.unreturns = response.data.unreturns;
        _this.DataTotalCount = response.data.DataTotalCount;
        _this.totalPage = Math.ceil(_this.DataTotalCount / _this.rowsPerPage);
        $('.dataTables_processing', $('#UnreturnsDataTable').closest('.dataTables_wrapper')).fadeOut();
        $('#UnreturnsDataTable').dataTable().fnClearTable();

        if (_this.unreturns.length != 0) {
          $('#UnreturnsDataTable').dataTable().fnAddData(_this.unreturns);
        }
      })["catch"](function (error) {
        console.log(error);
        $.showErrorModal(error);
      });
    }
  },
  created: function created() {
    var _this2 = this;

    var UnreturnsGetList = $('#UnreturnsGetList').html();
    $.showLoadingModal();
    axios.get(UnreturnsGetList).then(function (response) {
      _this2.unreturns = response.data.unreturns;
      _this2.DataTotalCount = response.data.DataTotalCount;
      _this2.totalPage = Math.ceil(_this2.DataTotalCount / _this2.rowsPerPage);
      $('#UnreturnsDataTable').on('draw.dt', function () {
        console.log('drawing a table');
      }).on('init.dt', function () {
        console.log('intial a table');
      }).dataTable({
        data: _this2.unreturns,
        columns: [{
          data: 'index'
        }, {
          data: 'borrowerLink'
        }, {
          data: 'bookLink'
        }, {
          data: 'showStatus'
        }, {
          data: 'borrow_date'
        }, {
          data: 'return_date'
        }, {
          data: 'showNoticed'
        }, {
          data: 'action'
        }],
        lengthChange: false,
        searching: false,
        pageLength: _this2.rowsPerPage,
        info: false,
        paging: false,
        processing: true,
        "ordering": false
      });
      $.closeModal();
    });
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ "./resources/js/components/Circulation/Unreturns/UnreturnTable.vue":
/*!*************************************************************************!*\
  !*** ./resources/js/components/Circulation/Unreturns/UnreturnTable.vue ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UnreturnTable_vue_vue_type_template_id_32fada46___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UnreturnTable.vue?vue&type=template&id=32fada46& */ "./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=template&id=32fada46&");
/* harmony import */ var _UnreturnTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UnreturnTable.vue?vue&type=script&lang=js& */ "./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UnreturnTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UnreturnTable_vue_vue_type_template_id_32fada46___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UnreturnTable_vue_vue_type_template_id_32fada46___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Circulation/Unreturns/UnreturnTable.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UnreturnTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./UnreturnTable.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UnreturnTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=template&id=32fada46&":
/*!********************************************************************************************************!*\
  !*** ./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=template&id=32fada46& ***!
  \********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnreturnTable_vue_vue_type_template_id_32fada46___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./UnreturnTable.vue?vue&type=template&id=32fada46& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Circulation/Unreturns/UnreturnTable.vue?vue&type=template&id=32fada46&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnreturnTable_vue_vue_type_template_id_32fada46___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UnreturnTable_vue_vue_type_template_id_32fada46___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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

/***/ 25:
/*!***********************************************************!*\
  !*** multi ./resources/js/circulation/unreturns/index.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\AppServ\www\waninlibary\resources\js\circulation\unreturns\index.js */"./resources/js/circulation/unreturns/index.js");


/***/ })

/******/ });