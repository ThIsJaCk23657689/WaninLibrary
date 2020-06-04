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
/******/ 	return __webpack_require__(__webpack_require__.s = 26);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['announcement', 'content'],
  data: function data() {
    return {
      AnnouncementsIndexURL: $('#AnnouncementsIndexURL').html(),
      AnnouncementsUpdateURL: $('#AnnouncementsUpdateURL').html()
    };
  },
  methods: {
    announcementEditForm: function announcementEditForm(e) {
      var _this = this;

      var url = this.AnnouncementsUpdateURL;
      var formData = new FormData($(e.target)[0]);
      var content = CKEDITOR.instances.content.getData();
      console.log($(e.target)[0]);
      formData.append('_method', 'patch');
      formData.append('content', content);
      this.$refs.loadingModal.initalModal();
      axios.post(url, formData).then(function (response) {
        _this.$refs.loadingModal.successfulResponse('編輯成功', response.data.url);
      })["catch"](function (error) {
        console.error('編輯單位時發生錯誤，錯誤訊息：' + error);

        _this.$refs.loadingModal.failureResponse(error);
      });
    }
  },
  created: function created() {},
  mounted: function mounted() {// CKEDITOR.replace('content');
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=template&id=9439927c&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=template&id=9439927c& ***!
  \***************************************************************************************************************************************************************************************************************************************/
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
    "div",
    [
      _c("div", { staticClass: "row justify-content-center" }, [
        _c("div", { staticClass: "col-md-8" }, [
          _c(
            "form",
            {
              attrs: {
                method: "POST",
                id: "announcement_edit_form",
                action: "#"
              },
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  return _vm.announcementEditForm($event)
                }
              }
            },
            [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-10" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { attrs: { for: "title" } }, [_vm._v("標題")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.announcement.title,
                          expression: "announcement.title"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        id: "title",
                        name: "title",
                        type: "text",
                        autocomplete: "off"
                      },
                      domProps: { value: _vm.announcement.title },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.announcement,
                            "title",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-2" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { attrs: { for: "is_top" } }, [
                      _vm._v("是否置頂")
                    ]),
                    _vm._v(" "),
                    _c(
                      "select",
                      {
                        staticClass: "form-control",
                        attrs: { name: "is_top", id: "is_top" },
                        domProps: { value: _vm.announcement.is_top }
                      },
                      [
                        _c("option", { attrs: { value: "1" } }, [
                          _vm._v("置頂")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "0" } }, [
                          _vm._v("不置頂")
                        ])
                      ]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c("div", { staticClass: "form-group" }, [
                    _c("label", { attrs: { for: "content" } }, [
                      _vm._v("內容")
                    ]),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.content,
                          expression: "content"
                        }
                      ],
                      staticClass: "form-control",
                      attrs: {
                        name: "content",
                        id: "content",
                        cols: "30",
                        rows: "5"
                      },
                      domProps: { value: _vm.content },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.content = $event.target.value
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
                        staticClass: "btn btn-block btn-success",
                        attrs: { type: "submit" }
                      },
                      [
                        _vm._v(
                          "\r\n                            確認編輯\r\n                        "
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "btn btn-block btn-danger",
                        attrs: { href: _vm.AnnouncementsIndexURL }
                      },
                      [
                        _vm._v(
                          "\r\n                            返回列表\r\n                        "
                        )
                      ]
                    )
                  ])
                ]
              )
            ]
          )
        ])
      ]),
      _vm._v(" "),
      _c("loading-modal", { ref: "loadingModal" })
    ],
    1
  )
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

/***/ "./resources/js/announcements/edit.js":
/*!********************************************!*\
  !*** ./resources/js/announcements/edit.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('announcement-update-form', __webpack_require__(/*! ./../components/Announcements/AnnouncementUpdateForm.vue */ "./resources/js/components/Announcements/AnnouncementUpdateForm.vue")["default"]);
var app = new Vue({
  el: '#announcement',
  data: function data() {
    return {
      announcement: [],
      content: null
    };
  },
  methods: {},
  created: function created() {
    var _this = this;

    var AnnouncementsGetOneURL = $('#AnnouncementsGetOneURL').html();
    axios.get(AnnouncementsGetOneURL).then(function (response) {
      _this.announcement = response.data.announcement;
      _this.content = response.data.announcement.content;
      CKEDITOR.replace('content');
    });
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ "./resources/js/components/Announcements/AnnouncementUpdateForm.vue":
/*!**************************************************************************!*\
  !*** ./resources/js/components/Announcements/AnnouncementUpdateForm.vue ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AnnouncementUpdateForm_vue_vue_type_template_id_9439927c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AnnouncementUpdateForm.vue?vue&type=template&id=9439927c& */ "./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=template&id=9439927c&");
/* harmony import */ var _AnnouncementUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AnnouncementUpdateForm.vue?vue&type=script&lang=js& */ "./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AnnouncementUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AnnouncementUpdateForm_vue_vue_type_template_id_9439927c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AnnouncementUpdateForm_vue_vue_type_template_id_9439927c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Announcements/AnnouncementUpdateForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AnnouncementUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./AnnouncementUpdateForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AnnouncementUpdateForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=template&id=9439927c&":
/*!*********************************************************************************************************!*\
  !*** ./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=template&id=9439927c& ***!
  \*********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AnnouncementUpdateForm_vue_vue_type_template_id_9439927c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./AnnouncementUpdateForm.vue?vue&type=template&id=9439927c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Announcements/AnnouncementUpdateForm.vue?vue&type=template&id=9439927c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AnnouncementUpdateForm_vue_vue_type_template_id_9439927c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_AnnouncementUpdateForm_vue_vue_type_template_id_9439927c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ 26:
/*!**************************************************!*\
  !*** multi ./resources/js/announcements/edit.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\AppServ\www\waninlibary\resources\js\announcements\edit.js */"./resources/js/announcements/edit.js");


/***/ })

/******/ });