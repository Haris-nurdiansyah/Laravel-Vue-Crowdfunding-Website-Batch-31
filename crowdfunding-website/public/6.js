(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/UpdatePassword.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/UpdatePassword.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'updatePassword',
  data: function data() {
    return {
      email: '',
      password: '',
      password_confirmation: '',
      errors: [],
      alertStatus: false
    };
  },
  methods: _objectSpread(_objectSpread({
    close: function close() {
      this.$emit('closed', false);
    }
  }, Object(vuex__WEBPACK_IMPORTED_MODULE_0__["mapActions"])({
    setAlert: 'alert/set'
  })), {}, {
    submit: function submit() {
      var _this = this;

      var formData = {
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation
      };
      axios.post('/api/update-password', formData).then(function (response) {
        var data = response.data.data;

        if (data.user.id.length > 0) {
          _this.setAlert({
            status: true,
            color: 'success',
            text: 'Your password was updated, please login'
          });

          _this.close();
        } else {
          _this.setAlert({
            status: true,
            color: 'error',
            text: 'Login Filed'
          });
        }
      })["catch"](function (error) {
        var data = error.response.data;

        if (data) {
          if (data.errors) {
            var errors = Object.values(data.errors);
            var errorMessages = errors.map(function (item) {
              return item[0];
            });
            _this.errors = errorMessages;
            _this.alertStatus = true;
          } else {
            _this.setAlert({
              status: true,
              color: 'error',
              text: data.response_message
            });
          }
        }

        console.log(response);
      });
    }
  })
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/UpdatePassword.vue?vue&type=template&id=0e8507af&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/UpdatePassword.vue?vue&type=template&id=0e8507af& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-card",
    [
      _c(
        "v-toolbar",
        { attrs: { dark: "" } },
        [
          _c(
            "v-btn",
            {
              attrs: { icon: "", dark: "" },
              nativeOn: {
                click: function ($event) {
                  return _vm.close.apply(null, arguments)
                },
              },
            },
            [_c("v-icon", [_vm._v("mdi-close")])],
            1
          ),
          _vm._v(" "),
          _c("v-toolbar-title", [
            _vm._v("\n            Update Password\n        "),
          ]),
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-container",
        { attrs: { fluid: "" } },
        [
          _c(
            "v-form",
            { ref: "form" },
            [
              _c("v-text-field", {
                staticClass: "mb-2 mt-1",
                attrs: {
                  label: "E-Mail",
                  required: "",
                  "append-icon": "mdi-email",
                },
                model: {
                  value: _vm.email,
                  callback: function ($$v) {
                    _vm.email = $$v
                  },
                  expression: "email",
                },
              }),
              _vm._v(" "),
              _c("v-text-field", {
                staticClass: "mb-2 mt-1",
                attrs: {
                  type: "password",
                  label: "password",
                  required: "",
                  "append-icon": "mdi-lock",
                },
                model: {
                  value: _vm.password,
                  callback: function ($$v) {
                    _vm.password = $$v
                  },
                  expression: "password",
                },
              }),
              _vm._v(" "),
              _c("v-text-field", {
                staticClass: "mb-2 mt-1",
                attrs: {
                  type: "password",
                  label: "Password Confirm",
                  required: "",
                  "append-icon": "mdi-lock",
                },
                model: {
                  value: _vm.password_confirmation,
                  callback: function ($$v) {
                    _vm.password_confirmation = $$v
                  },
                  expression: "password_confirmation",
                },
              }),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "text-xs-center mt-2" },
                [
                  _c(
                    "v-btn",
                    {
                      attrs: { color: "grey darken-4 white--text" },
                      on: { click: _vm.submit },
                    },
                    [_vm._v("Update\n                ")]
                  ),
                ],
                1
              ),
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "v-snackbar",
            {
              attrs: {
                "multi-line": "",
                timeout: "4000",
                buttom: "",
                color: "error",
              },
              scopedSlots: _vm._u([
                {
                  key: "action",
                  fn: function (ref) {
                    var attrs = ref.attrs
                    return [
                      _c(
                        "v-btn",
                        _vm._b(
                          {
                            attrs: { color: "white", text: "" },
                            on: {
                              click: function ($event) {
                                _vm.alertStatus = !_vm.alertStatus
                              },
                            },
                          },
                          "v-btn",
                          attrs,
                          false
                        ),
                        [_vm._v("\n                Close\n                ")]
                      ),
                    ]
                  },
                },
              ]),
              model: {
                value: _vm.alertStatus,
                callback: function ($$v) {
                  _vm.alertStatus = $$v
                },
                expression: "alertStatus",
              },
            },
            _vm._l(_vm.errors, function (error, i) {
              return _c("div", { key: i }, [_c("li", [_vm._v(_vm._s(error))])])
            }),
            0
          ),
        ],
        1
      ),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/UpdatePassword.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/UpdatePassword.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UpdatePassword_vue_vue_type_template_id_0e8507af___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UpdatePassword.vue?vue&type=template&id=0e8507af& */ "./resources/js/components/UpdatePassword.vue?vue&type=template&id=0e8507af&");
/* harmony import */ var _UpdatePassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UpdatePassword.vue?vue&type=script&lang=js& */ "./resources/js/components/UpdatePassword.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _UpdatePassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UpdatePassword_vue_vue_type_template_id_0e8507af___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UpdatePassword_vue_vue_type_template_id_0e8507af___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/UpdatePassword.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/UpdatePassword.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/UpdatePassword.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdatePassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./UpdatePassword.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/UpdatePassword.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdatePassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/UpdatePassword.vue?vue&type=template&id=0e8507af&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/UpdatePassword.vue?vue&type=template&id=0e8507af& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdatePassword_vue_vue_type_template_id_0e8507af___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./UpdatePassword.vue?vue&type=template&id=0e8507af& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/UpdatePassword.vue?vue&type=template&id=0e8507af&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdatePassword_vue_vue_type_template_id_0e8507af___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UpdatePassword_vue_vue_type_template_id_0e8507af___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);