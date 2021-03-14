(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-multiselect */ "./node_modules/vue-multiselect/dist/vue-multiselect.min.js");
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue_multiselect__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _difficultyBus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./difficultyBus */ "./resources/js/views/difficulties/difficultyBus.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



var Difficulty = function Difficulty(difficulty) {
  _classCallCheck(this, Difficulty);

  this.difficulty = difficulty.difficulty || '';
  this.model_type = difficulty.model_type || '';
  this.model_id = difficulty.model_id || '';
  this.posi = difficulty.posi || '';
};

/* harmony default export */ __webpack_exports__["default"] = ({
  name: "difficulty-addupdate",
  props: {
    model_type_prop: '',
    model_id_prop: ''
  },
  components: {
    Multiselect: vue_multiselect__WEBPACK_IMPORTED_MODULE_0___default.a
  },
  mounted: function mounted() {
    var _this = this;

    this.$parent.$on('difficulty_add', function () {
      console.log('difficulty_add - received');
      _this.editing = false;
      _this.difficulty = new Difficulty({});
      _this.difficulty.model_type = _this.modelType;
      _this.difficulty.model_id = _this.modelId;
      _this.difficultyForm = new Form(_this.difficulty);
      $('#addUpdateDifficulty').modal();
    });
    _difficultyBus__WEBPACK_IMPORTED_MODULE_1__["default"].$on('difficulty_create', function (modelType, modelId) {
      console.log('difficulty_create', modelType, modelId, _this.model_type_prop, _this.model_id_prop);

      if (_this.model_type_prop === modelType && _this.model_id_prop === modelId) {
        console.log('difficulty_create_match', _this.model_type_prop, _this.model_id_prop);

        _this.initDifficultyForm(modelType, modelId);

        $('#addUpdateDifficulty').modal();
      }
    });
    _difficultyBus__WEBPACK_IMPORTED_MODULE_1__["default"].$on('difficulty_edit', function (difficulty, modelType, modelId) {
      if (_this.model_type_prop === modelType && _this.model_id_prop === modelId) {
        console.log('difficulty_edit', modelType, modelId, _this.model_type_prop, _this.model_id_prop);
        _this.editing = true;
        _this.difficulty = new Difficulty({});
        _this.difficulty.difficulty = difficulty;
        _this.difficulty.model_type = modelType;
        _this.difficulty.model_id = modelId;
        _this.modelType = modelType;
        _this.modelId = modelId;
        _this.difficultyForm = new Form(_this.difficulty);
        _this.difficultyId = difficulty.uuid;
        $('#addUpdateDifficulty').modal();
      }
    });
  },
  created: function created() {
    var _this2 = this;

    this.initDifficultyForm(this.model_type_prop, this.model_id_prop);
    axios.get('/difficulties').then(function (_ref) {
      var data = _ref.data;
      return _this2.difficulties = data;
    });
  },
  data: function data() {
    return {
      difficulty: {},
      modelId: '',
      modelType: '',
      difficultyForm: new Form(new Difficulty({})),
      difficultyId: null,
      editing: false,
      loading: false,
      difficulties: []
    };
  },
  methods: {
    initDifficultyForm: function initDifficultyForm(modelType, modelId) {
      this.editing = false;
      this.difficulty = new Difficulty({});
      this.difficulty.model_type = modelType;
      this.difficulty.model_id = modelId;
      this.modelType = modelType;
      this.modelId = modelId;
      this.difficultyForm = new Form(this.difficulty);
    },
    createDifficulty: function createDifficulty(modelType, modelId) {
      var _this3 = this;

      this.loading = true;
      this.difficultyForm.post('/difficulties/add').then(function (difficulty) {
        _this3.loading = false;
        _difficultyBus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('difficulty_created', {
          difficulty: difficulty,
          modelType: modelType,
          modelId: modelId
        });
        $('#addUpdateDifficulty').modal('hide');
      })["catch"](function (error) {
        _this3.loading = false;
      });
    },
    updateDifficulty: function updateDifficulty(modelType, modelId) {
      var _this4 = this;

      this.loading = true;
      this.difficultyForm.put("/difficulties/".concat(this.difficultyId), undefined).then(function (difficulty) {
        _this4.loading = false;

        _this4.initDifficultyForm(_this4.model_type_prop, _this4.model_id_prop);

        _difficultyBus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('difficulty_updated', {
          difficulty: difficulty,
          modelType: modelType,
          modelId: modelId
        });
        $('#addUpdateDifficulty').modal('hide');
      })["catch"](function (error) {
        _this4.loading = false;
      });
    }
  },
  computed: {
    isValidCreateForm: function isValidCreateForm() {
      return !this.loading;
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************************/
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
    {
      staticClass: "modal fade draggable",
      attrs: {
        id: "addUpdateDifficulty",
        tabindex: "-1",
        role: "dialog",
        "aria-labelledby": "exampleModalLabel",
        "aria-hidden": "true"
      }
    },
    [
      _c("div", { staticClass: "modal-dialog modal-lg" }, [
        _c("div", { staticClass: "modal-content" }, [
          _c("div", { staticClass: "modal-body" }, [
            _c(
              "form",
              {
                staticClass: "form-horizontal",
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                  },
                  keydown: function($event) {
                    return _vm.difficultyForm.errors.clear()
                  }
                }
              },
              [
                _c(
                  "div",
                  { staticClass: "input-group" },
                  [
                    _c("multiselect", {
                      key: "id",
                      attrs: {
                        "selected.sync": "difficultyForm.difficulty",
                        value: "",
                        options: _vm.difficulties,
                        searchable: true,
                        multiple: false,
                        label: "title",
                        "track-by": "id",
                        placeholder: "Difficulty"
                      },
                      model: {
                        value: _vm.difficultyForm.difficulty,
                        callback: function($$v) {
                          _vm.$set(_vm.difficultyForm, "difficulty", $$v)
                        },
                        expression: "difficultyForm.difficulty"
                      }
                    }),
                    _vm._v(" "),
                    _vm.difficultyForm.errors.has("difficulty")
                      ? _c("span", {
                          staticClass: "invalid-feedback d-block",
                          attrs: { role: "alert" },
                          domProps: {
                            textContent: _vm._s(
                              _vm.difficultyForm.errors.get("difficulty")
                            )
                          }
                        })
                      : _vm._e(),
                    _vm._v(" "),
                    _c("span", { staticClass: "input-group-append" }, [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-secondary btn-sm",
                          attrs: { type: "button", "data-dismiss": "modal" }
                        },
                        [_vm._v("Cancel")]
                      ),
                      _vm._v(" "),
                      _vm.editing
                        ? _c(
                            "button",
                            {
                              staticClass: "btn btn-warning btn-sm",
                              attrs: {
                                type: "button",
                                disabled: !_vm.isValidCreateForm
                              },
                              on: {
                                click: function($event) {
                                  return _vm.updateDifficulty(
                                    _vm.modelType,
                                    _vm.modelId
                                  )
                                }
                              }
                            },
                            [_vm._v("Update")]
                          )
                        : _c(
                            "button",
                            {
                              staticClass: "btn btn-warning btn-sm",
                              attrs: {
                                type: "button",
                                disabled: !_vm.isValidCreateForm
                              },
                              on: {
                                click: function($event) {
                                  return _vm.createDifficulty(
                                    _vm.modelType,
                                    _vm.modelId
                                  )
                                }
                              }
                            },
                            [_vm._v("Create")]
                          )
                    ])
                  ],
                  1
                )
              ]
            )
          ])
        ])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/difficulties/difficulty-addupdate.vue":
/*!******************************************************************!*\
  !*** ./resources/js/views/difficulties/difficulty-addupdate.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _difficulty_addupdate_vue_vue_type_template_id_5c62c7df_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true& */ "./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true&");
/* harmony import */ var _difficulty_addupdate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./difficulty-addupdate.vue?vue&type=script&lang=js& */ "./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _difficulty_addupdate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _difficulty_addupdate_vue_vue_type_template_id_5c62c7df_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _difficulty_addupdate_vue_vue_type_template_id_5c62c7df_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "5c62c7df",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/difficulties/difficulty-addupdate.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_difficulty_addupdate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./difficulty-addupdate.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_difficulty_addupdate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true&":
/*!*************************************************************************************************************!*\
  !*** ./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true& ***!
  \*************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_difficulty_addupdate_vue_vue_type_template_id_5c62c7df_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/difficulties/difficulty-addupdate.vue?vue&type=template&id=5c62c7df&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_difficulty_addupdate_vue_vue_type_template_id_5c62c7df_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_difficulty_addupdate_vue_vue_type_template_id_5c62c7df_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);