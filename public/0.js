(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/reportattributes/list.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _dynamicattributes_attributeBus__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../dynamicattributes/attributeBus */ "./resources/js/views/dynamicattributes/attributeBus.js");
/* harmony import */ var _analysisrules_analysisruleBus__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../analysisrules/analysisruleBus */ "./resources/js/views/analysisrules/analysisruleBus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    report_prop: {},
    reportattributes_prop: {}
  },
  name: "report-attributes-list",
  components: {
    AddUpdateAttribute: function AddUpdateAttribute() {
      return __webpack_require__.e(/*! import() */ 17).then(__webpack_require__.bind(null, /*! ../dynamicattributes/addupdate */ "./resources/js/views/dynamicattributes/addupdate.vue"));
    },
    AddUpdateAnalysisRule: function AddUpdateAnalysisRule() {
      return __webpack_require__.e(/*! import() */ 14).then(__webpack_require__.bind(null, /*! ../analysisrules/addupdate */ "./resources/js/views/analysisrules/addupdate.vue"));
    },
    AnalysisRuleList: function AnalysisRuleList() {
      return __webpack_require__.e(/*! import() */ 16).then(__webpack_require__.bind(null, /*! ../analysisrules/list */ "./resources/js/views/analysisrules/list.vue"));
    }
  },
  mounted: function mounted() {
    var _this = this;

    _dynamicattributes_attributeBus__WEBPACK_IMPORTED_MODULE_0__["default"].$on('dynamicattribute_created', function (dynamicattribute) {
      if (_this.report.model_type === dynamicattribute.hasdynamicattribute_type && _this.report.id === dynamicattribute.hasdynamicattribute_id) {
        _this.addAttributeToList(dynamicattribute);
      }
    });
    _dynamicattributes_attributeBus__WEBPACK_IMPORTED_MODULE_0__["default"].$on('dynamicattribute_updated', function (dynamicattribute) {
      if (_this.report.model_type === dynamicattribute.hasdynamicattribute_type && _this.report.id === dynamicattribute.hasdynamicattribute_id) {
        _this.updateAttributeFromList(dynamicattribute);
      }
    });
    _analysisrules_analysisruleBus__WEBPACK_IMPORTED_MODULE_1__["default"].$on('analysisrule_created', function (attribute) {
      if (_this.report.model_type === attribute.hasdynamicattribute_type && _this.report.id === attribute.hasdynamicattribute_id) {
        _this.updateAttributeFromList(attribute);
      }
    });
  },
  data: function data() {
    return {
      report: this.report_prop,
      reportattributes: this.reportattributes_prop,
      isPaginated: true,
      isPaginationSimple: false,
      isPaginationRounded: true,
      paginationPosition: 'bottom',
      defaultSortDirection: 'asc',
      sortIcon: 'arrow-up',
      sortIconSize: 'is-small',
      currentPage: 1,
      perPage: 5,
      defaultOpenedDetails: [-1],
      showDetailIcon: true,
      useTransition: false,
      stickyHeaders: false,
      columns: [{
        field: 'id',
        key: 'id',
        label: 'ID',
        numeric: true,
        searchable: false,
        sortable: true
      }, {
        field: 'num_ord',
        key: 'num_ord',
        label: 'Num. Ord',
        numeric: true,
        searchable: false,
        sortable: true
      }, {
        field: 'name',
        key: 'name',
        label: 'Name',
        searchable: true,
        sortable: true
      }, {
        field: 'attributetype',
        key: 'attributetype',
        label: 'Type',
        searchable: false,
        sortable: true
      }, {
        field: 'description',
        key: 'description',
        label: 'Description',
        searchable: true,
        sortable: true
      }, {
        field: 'actions',
        key: 'actions',
        label: '',
        width: '100',
        centered: true,
        sortable: false
      }]
    };
  },
  methods: {
    createAttribute: function createAttribute(report) {
      var model_type = report.model_type;
      var model_id = report.id;
      _dynamicattributes_attributeBus__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('create_new_dynamicattribute', {
        model_type: model_type,
        model_id: model_id
      });
    },
    editAttribute: function editAttribute(attribute) {
      _dynamicattributes_attributeBus__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('edit_dynamicattribute', {
        attribute: attribute
      });
    },
    deleteAttribute: function deleteAttribute(attribute) {
      var _this2 = this;

      this.$swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if (result.value) {
          axios["delete"]("/dynamicattributes/".concat(attribute.uuid)).then(function (resp) {
            _this2.removeAttributeFromList(attribute);
          })["catch"](function (error) {
            window.handleErrors(error);
          });
        }
      });
    },
    createAnalysisRule: function createAnalysisRule(attribute) {
      console.log('create_new_analysisrule sent: ', attribute);
      _analysisrules_analysisruleBus__WEBPACK_IMPORTED_MODULE_1__["default"].$emit('create_new_analysisrule', {
        attribute: attribute
      });
    },
    searchTitre: function searchTitre(row, input) {
      console.log('Searching Name ...', row, input);
      return input && row.name && row.name.includes(input);
    },
    searchDescription: function searchDescription(row, input) {
      console.log('Searching Description ...', row, input);
      return input && row.description && row.description.includes(input);
    },
    searchDefault: function searchDefault(row, input) {
      console.log('Searching Default ...', row, input);
      return true;
    },
    createNewAction: function createNewAction(reportattribute) {
      axios.get("/reportactions.fetchbystep/".concat(reportattribute.id)).then(function (resp) {
        _dynamicattributes_attributeBus__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('reportaction_create', reportattribute, resp.data);
      });
    },
    removeAt: function removeAt(idx) {
      this.list.splice(idx, 1);
    },
    add: function add() {
      id++;
      this.list.push({
        name: "Juan " + id,
        id: id,
        text: ""
      });
    },
    addAttributeToList: function addAttributeToList(reportattribute) {
      var reportattributeIndex = this.reportattributes.findIndex(function (c) {
        return reportattribute.id === c.id;
      }); // if this attribute doesn't exists in the list

      if (reportattributeIndex === -1) {
        this.reportattributes.push(reportattribute);
      }
    },
    updateAttributeFromList: function updateAttributeFromList(reportattribute) {
      var stepIndex = this.reportattributes.findIndex(function (s) {
        return reportattribute.id === s.id;
      }); // if this attribute belongs to the list

      if (stepIndex > -1) {
        this.reportattributes.splice(stepIndex, 1, reportattribute);
      }
    },
    removeAttributeFromList: function removeAttributeFromList(reportattribute) {
      var attributeIndex = this.reportattributes.findIndex(function (s) {
        return reportattribute.id === s.id;
      }); // if this attribute belongs to the list

      if (attributeIndex > -1) {
        this.reportattributes.splice(attributeIndex, 1);
        this.$swal({
          html: '<small>Attribute successfully deleted !</small>',
          icon: 'success',
          timer: 3000
        }).then(function () {});
      }
    },
    columnTdAttrs: function columnTdAttrs(row, column) {
      if (row.id === 'Total') {
        if (column.label === 'ID') {
          return {
            colspan: 4,
            "class": 'has-text-weight-bold',
            style: {
              'text-align': 'left !important'
            }
          };
        } else if (column.label === 'Gender') {
          return {
            "class": 'has-text-weight-semibold'
          };
        } else {
          return {
            style: {
              display: 'none'
            }
          };
        }
      }

      return null;
    }
  },
  computed: {
    transitionName: function transitionName() {
      if (this.useTransition) {
        return 'fade';
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reports/item.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/reports/item.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _reportattributes_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../reportattributes/list */ "./resources/js/views/reportattributes/list.vue");
/* harmony import */ var _addupdate__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./addupdate */ "./resources/js/views/reports/addupdate.vue");
/* harmony import */ var _reportBus__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./reportBus */ "./resources/js/views/reports/reportBus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "report-item",
  props: {
    report_prop: {},
    index_prop: {}
  },
  components: {
    AddUpdateReport: _addupdate__WEBPACK_IMPORTED_MODULE_1__["default"],
    ReportAttributes: _reportattributes_list__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  mounted: function mounted() {
    var _this = this;

    _reportBus__WEBPACK_IMPORTED_MODULE_2__["default"].$on('report_updated', function (updreport) {
      if (_this.report.id === updreport.id) {
        _this.report = updreport;
        window.noty({
          message: 'Report successfully updated',
          type: 'success'
        });
      }
    });
  },
  created: function created() {},
  data: function data() {
    return {
      report: this.report_prop,
      index: this.index_prop,
      collapse_icon: 'fas fa-chevron-down'
    };
  },
  methods: {
    editReport: function editReport(report) {
      _reportBus__WEBPACK_IMPORTED_MODULE_2__["default"].$emit('edit_report', {
        report: report
      });
    },
    showFlowchart: function showFlowchart(report) {
      /*ReportBus.$emit('show_flowchart', report)*/
      window.location = '/reports.flowchart/' + report.uuid;
    },
    deleteReport: function deleteReport(id, key) {
      var _this2 = this;

      this.$swal({
        html: '<small>Do you really want to delete this Report ?</small>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Non'
      }).then(function (result) {
        if (result.value) {
          axios["delete"]("/reports/".concat(id)).then(function (resp) {
            console.log('report delete resp: ', resp);

            _this2.$swal({
              html: '<small>Report successfully deleted !</small>',
              icon: 'success',
              timer: 3000
            }).then(function () {
              _reportBus__WEBPACK_IMPORTED_MODULE_2__["default"].$emit('reportaction_deleted', {
                key: key,
                resp: resp
              });
            });
          })["catch"](function (error) {
            window.handleErrors(error);
          });
        } else {// stay here
        }
      });
    },
    collapseClicked: function collapseClicked() {
      if (this.collapse_icon === 'fas fa-chevron-down') {
        this.collapse_icon = 'fas fa-chevron-up';
      } else {
        this.collapse_icon = 'fas fa-chevron-down';
      }
    }
  },
  computed: {
    currentCollapseIcon: function currentCollapseIcon() {
      return this.collapse_icon;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "dt[data-v-274c8633] {\n  float: left;\n  clear: left;\n  width: 110px;\n  font-weight: bold;\n}\ndt[data-v-274c8633]::after {\n  content: \":\";\n}\ndd[data-v-274c8633] {\n  margin: 0 0 0 80px;\n  padding: 0 0 0.5em 0;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=template&id=274c8633&scoped=true&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/reportattributes/list.vue?vue&type=template&id=274c8633&scoped=true& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
    "section",
    [
      _c(
        "p",
        [
          _c("span", { staticClass: "help-inline pr-1 text-sm" }, [
            _vm._v(" Attributes (Fields). "),
          ]),
          _vm._v(" "),
          _c(
            "b-button",
            {
              attrs: { size: "is-small", type: "is-info is-light" },
              on: {
                click: function ($event) {
                  return _vm.createAttribute(_vm.report)
                },
              },
            },
            [_c("i", { staticClass: "fas fa-plus" })]
          ),
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "b-field",
        { attrs: { grouped: "", "group-multiline": "" } },
        [
          _c(
            "b-select",
            {
              attrs: { disabled: !_vm.isPaginated },
              model: {
                value: _vm.perPage,
                callback: function ($$v) {
                  _vm.perPage = $$v
                },
                expression: "perPage",
              },
            },
            [
              _c("option", { attrs: { value: "5" } }, [_vm._v("5 per page")]),
              _vm._v(" "),
              _c("option", { attrs: { value: "10" } }, [_vm._v("10 per page")]),
              _vm._v(" "),
              _c("option", { attrs: { value: "15" } }, [_vm._v("15 per page")]),
              _vm._v(" "),
              _c("option", { attrs: { value: "20" } }, [_vm._v("20 per page")]),
            ]
          ),
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "b-table",
        {
          ref: "table",
          attrs: {
            data: _vm.reportattributes,
            "debounce-search": 1000,
            paginated: _vm.isPaginated,
            "per-page": _vm.perPage,
            "opened-detailed": _vm.defaultOpenedDetails,
            detailed: "",
            "detail-key": "id",
            "detail-transition": _vm.transitionName,
            "show-detail-icon": _vm.showDetailIcon,
            "current-page": _vm.currentPage,
            "pagination-simple": _vm.isPaginationSimple,
            "pagination-position": _vm.paginationPosition,
            "default-sort-direction": _vm.defaultSortDirection,
            "pagination-rounded": _vm.isPaginationRounded,
            "sort-icon": _vm.sortIcon,
            "sort-icon-size": _vm.sortIconSize,
            "sticky-header": _vm.stickyHeaders,
            "default-sort": "row.name",
            "aria-next-label": "Next",
            "aria-previous-label": "Previous",
            "aria-page-label": "Page",
            "aria-current-label": "Current page",
            "before-destroy": false,
          },
          on: {
            "update:currentPage": function ($event) {
              _vm.currentPage = $event
            },
            "update:current-page": function ($event) {
              _vm.currentPage = $event
            },
          },
          scopedSlots: _vm._u([
            {
              key: "detail",
              fn: function (props) {
                return [
                  _c(
                    "b-tabs",
                    { attrs: { size: "is-small", type: "is-boxed" } },
                    [
                      _c(
                        "b-tab-item",
                        {
                          scopedSlots: _vm._u(
                            [
                              {
                                key: "header",
                                fn: function () {
                                  return [
                                    _c("b-icon", {
                                      attrs: { icon: "information-outline" },
                                    }),
                                    _vm._v(" "),
                                    _c("span", [_vm._v(" Infos ")]),
                                  ]
                                },
                                proxy: true,
                              },
                            ],
                            null,
                            true
                          ),
                        },
                        [
                          _vm._v(" "),
                          _c("div", { staticClass: "card card-default" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c("dl", [
                                _c("dt", { staticClass: "text text-xs" }, [
                                  _vm._v("Name"),
                                ]),
                                _vm._v(" "),
                                _c("dd", { staticClass: "text text-xs" }, [
                                  _vm._v(_vm._s(props.row.name)),
                                ]),
                                _vm._v(" "),
                                _c("dt", { staticClass: "text text-xs" }, [
                                  _vm._v("Type"),
                                ]),
                                _vm._v(" "),
                                _c("dd", { staticClass: "text text-xs" }, [
                                  _vm._v(_vm._s(props.row.attributetype.name)),
                                ]),
                                _vm._v(" "),
                                _c("dt", { staticClass: "text text-xs" }, [
                                  _vm._v("Num. Order"),
                                ]),
                                _vm._v(" "),
                                _c("dd", { staticClass: "text text-xs" }, [
                                  _vm._v(_vm._s(props.row.num_ord)),
                                ]),
                                _vm._v(" "),
                                _c("dt", { staticClass: "text text-xs" }, [
                                  _vm._v("Offset"),
                                ]),
                                _vm._v(" "),
                                _c("dd", { staticClass: "text text-xs" }, [
                                  _vm._v(_vm._s(props.row.offset || 0)),
                                ]),
                                _vm._v(" "),
                                _c("dt", { staticClass: "text text-xs" }, [
                                  _vm._v("Max Length"),
                                ]),
                                _vm._v(" "),
                                _c("dd", { staticClass: "text text-xs" }, [
                                  _vm._v(_vm._s(props.row.max_length || 0)),
                                ]),
                                _vm._v(" "),
                                _c("dt", { staticClass: "text text-xs" }, [
                                  _vm._v("Creaed at"),
                                ]),
                                _vm._v(" "),
                                _c("dd", { staticClass: "text text-xs" }, [
                                  _vm._v(
                                    _vm._s(
                                      _vm._f("formatDate")(props.row.created_at)
                                    )
                                  ),
                                ]),
                              ]),
                            ]),
                          ]),
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-tab-item",
                        {
                          scopedSlots: _vm._u(
                            [
                              {
                                key: "header",
                                fn: function () {
                                  return [
                                    _c("b-icon", {
                                      attrs: { icon: "source-pull" },
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      {
                                        staticClass: "help-inline pr-1 text-sm",
                                      },
                                      [_vm._v(" Analysis ")]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "b-button",
                                      {
                                        attrs: {
                                          size: "is-small",
                                          type: "is-ghost",
                                        },
                                        on: {
                                          click: function ($event) {
                                            return _vm.createAnalysisRule(
                                              props.row
                                            )
                                          },
                                        },
                                      },
                                      [_c("i", { staticClass: "fas fa-plus" })]
                                    ),
                                  ]
                                },
                                proxy: true,
                              },
                            ],
                            null,
                            true
                          ),
                        },
                        [
                          _vm._v(" "),
                          _c("AnalysisRuleList", {
                            attrs: {
                              attributeid_prop: props.row.id,
                              analysisrules_prop: props.row.analysisrules,
                            },
                          }),
                        ],
                        1
                      ),
                    ],
                    1
                  ),
                ]
              },
            },
            {
              key: "empty",
              fn: function () {
                return [
                  _c("div", { staticClass: "has-text-centered" }, [
                    _vm._v("No Data Available"),
                  ]),
                ]
              },
              proxy: true,
            },
          ]),
        },
        [
          _vm._l(_vm.columns, function (column) {
            return [
              _c(
                "b-table-column",
                _vm._b(
                  {
                    key: column.id,
                    attrs: { sortable: column.sortable },
                    scopedSlots: _vm._u(
                      [
                        column.searchable && !column.numeric
                          ? {
                              key: "searchable",
                              fn: function (props) {
                                return [
                                  _c("b-input", {
                                    attrs: {
                                      placeholder: "Search...",
                                      icon: "magnify",
                                      size: "is-small",
                                      "icon-right": "close-circle",
                                      "icon-right-clickable": "",
                                    },
                                    on: {
                                      "icon-right-click": function ($event) {
                                        props.filters[props.column.field] = ""
                                      },
                                    },
                                    model: {
                                      value: props.filters[props.column.field],
                                      callback: function ($$v) {
                                        _vm.$set(
                                          props.filters,
                                          props.column.field,
                                          $$v
                                        )
                                      },
                                      expression:
                                        "props.filters[props.column.field]",
                                    },
                                  }),
                                ]
                              },
                            }
                          : null,
                        {
                          key: "default",
                          fn: function (props) {
                            return [
                              column.field === "id"
                                ? _c("span", { staticClass: "text-xs" }, [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(props.row[column.field]) +
                                        "\n                    "
                                    ),
                                  ])
                                : column.field === "name"
                                ? _c(
                                    "span",
                                    {
                                      staticClass:
                                        "has-text-primary is-italic text-xs",
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          on: {
                                            click: function ($event) {
                                              return _vm.editAttribute(
                                                props.row
                                              )
                                            },
                                          },
                                        },
                                        [
                                          _vm._v(
                                            "\n                            " +
                                              _vm._s(props.row[column.field]) +
                                              "\n                        "
                                          ),
                                        ]
                                      ),
                                    ]
                                  )
                                : column.field === "attributetype"
                                ? _c(
                                    "span",
                                    {
                                      staticClass:
                                        "has-text-info is-italic text-xs",
                                    },
                                    [
                                      props.row[column.field]
                                        ? _c("span", [
                                            _vm._v(
                                              "\n                            " +
                                                _vm._s(
                                                  props.row[column.field].name
                                                ) +
                                                "\n                        "
                                            ),
                                          ])
                                        : _c("span"),
                                    ]
                                  )
                                : column.date
                                ? _c(
                                    "span",
                                    { staticClass: "tag is-success" },
                                    [
                                      _vm._v(
                                        "\n                        " +
                                          _vm._s(
                                            new Date(
                                              props.row[column.field]
                                            ).toLocaleDateString()
                                          ) +
                                          "\n                    "
                                      ),
                                    ]
                                  )
                                : column.field === "actions"
                                ? _c("span", { staticClass: "text-xs" }, [
                                    _c("div", { staticClass: "block" }, [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "tw-inline-block tw-mr-3 text-warning",
                                          on: {
                                            click: function ($event) {
                                              return _vm.editAttribute(
                                                props.row
                                              )
                                            },
                                          },
                                        },
                                        [
                                          _c("b-icon", {
                                            attrs: {
                                              pack: "fas",
                                              icon: "pencil-square-o",
                                              size: "is-small",
                                            },
                                          }),
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "tw-inline-block tw-mr-3 text-danger",
                                          on: {
                                            click: function ($event) {
                                              return _vm.deleteAttribute(
                                                props.row
                                              )
                                            },
                                          },
                                        },
                                        [
                                          _c("b-icon", {
                                            attrs: {
                                              pack: "fas",
                                              icon: "trash",
                                              size: "is-small",
                                            },
                                          }),
                                        ],
                                        1
                                      ),
                                    ]),
                                  ])
                                : _c("span", { staticClass: "text-xs" }, [
                                    _vm._v(
                                      "\n                        " +
                                        _vm._s(props.row[column.field]) +
                                        "\n                    "
                                    ),
                                  ]),
                            ]
                          },
                        },
                      ],
                      null,
                      true
                    ),
                  },
                  "b-table-column",
                  column,
                  false
                )
              ),
            ]
          }),
        ],
        2
      ),
      _vm._v(" "),
      _c("AddUpdateAttribute"),
      _vm._v(" "),
      _c("AddUpdateAnalysisRule"),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reports/item.vue?vue&type=template&id=feec173c&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/reports/item.vue?vue&type=template&id=feec173c&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  return _c("div", { attrs: { id: "reportwrapper_" + _vm.report.uuid } }, [
    _c(
      "div",
      { staticClass: "card" },
      [
        _c("header", [
          _c("div", { staticClass: "card-header-title row" }, [
            _c("div", { staticClass: "col-md-6 col-sm-8 col-12" }, [
              _c(
                "span",
                {
                  staticClass: "text-purple text-sm",
                  attrs: {
                    "data-toggle": "collapse",
                    "data-parent": "#reportwrapper_" + _vm.report.uuid,
                    href: "#collapse-reports-" + _vm.index,
                  },
                  on: {
                    click: function ($event) {
                      return _vm.collapseClicked()
                    },
                  },
                },
                [
                  _vm._v(
                    "\n                        " +
                      _vm._s(_vm.report.title) +
                      "\n                    "
                  ),
                ]
              ),
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-6 col-sm-4 col-12 text-right" }, [
              _c("span", { staticClass: "text text-sm" }, [
                _c(
                  "a",
                  {
                    staticClass: "btn btn-tool text-success",
                    attrs: { type: "button", "data-toggle": "tooltip" },
                    on: {
                      click: function ($event) {
                        return _vm.showFlowchart(_vm.report)
                      },
                    },
                  },
                  [_c("i", { staticClass: "fa fa-eye" })]
                ),
                _vm._v(" "),
                _c(
                  "a",
                  {
                    staticClass: "btn btn-tool text-warning",
                    attrs: { type: "button", "data-toggle": "tooltip" },
                    on: {
                      click: function ($event) {
                        return _vm.editReport(_vm.report)
                      },
                    },
                  },
                  [_c("i", { staticClass: "fa fa-pencil-square-o" })]
                ),
                _vm._v(" "),
                _c(
                  "a",
                  {
                    staticClass: "btn btn-tool",
                    attrs: {
                      type: "button",
                      "data-toggle": "collapse",
                      "data-parent": "#reportwrapper_" + _vm.report.uuid,
                      href: "#collapse-reports-" + _vm.index,
                    },
                    on: {
                      click: function ($event) {
                        return _vm.collapseClicked()
                      },
                    },
                  },
                  [_c("i", { class: _vm.currentCollapseIcon })]
                ),
                _vm._v(" "),
                _c(
                  "a",
                  {
                    staticClass: "btn btn-tool text-danger",
                    attrs: { type: "button" },
                    on: {
                      click: function ($event) {
                        return _vm.deleteReport(_vm.report.uuid, _vm.index)
                      },
                    },
                  },
                  [_c("i", { staticClass: "fas fa-trash" })]
                ),
              ]),
            ]),
          ]),
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass: "card-content panel-collapse collapse in",
            attrs: { id: "collapse-reports-" + _vm.index },
          },
          [
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-3 col-sm-6 col-12" }, [
                _c("div", { staticClass: "card card-default" }, [
                  _c("div", { staticClass: "card-body" }, [
                    _c("dt", { staticClass: "text text-xs" }, [_vm._v("Name")]),
                    _vm._v(" "),
                    _c("dd", { staticClass: "text text-xs" }, [
                      _vm._v(_vm._s(_vm.report.reporttype.name)),
                    ]),
                    _vm._v(" "),
                    _c("dt", { staticClass: "text text-xs" }, [
                      _vm._v("Description"),
                    ]),
                    _vm._v(" "),
                    _c("dd", { staticClass: "text text-xs" }, [
                      _vm._v(_vm._s(_vm.report.description)),
                    ]),
                    _vm._v(" "),
                    _c("dt", { staticClass: "text text-xs" }, [
                      _vm._v("Created at"),
                    ]),
                    _vm._v(" "),
                    _c("dd", { staticClass: "text text-xs" }, [
                      _vm._v(
                        _vm._s(_vm._f("formatDate")(_vm.report.created_at))
                      ),
                    ]),
                    _vm._v(" "),
                    _c("dd", { staticClass: "col-sm-8 offset-sm-4 text-xs" }),
                  ]),
                ]),
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-md-9 col-sm-6 col-12" },
                [
                  _c("ReportAttributes", {
                    attrs: {
                      report_prop: _vm.report,
                      reportattributes_prop: _vm.report.attributes,
                    },
                  }),
                ],
                1
              ),
            ]),
          ]
        ),
        _vm._v(" "),
        _c("AddUpdateReport"),
      ],
      1
    ),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/analysisrules/analysisruleBus.js":
/*!*************************************************************!*\
  !*** ./resources/js/views/analysisrules/analysisruleBus.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ __webpack_exports__["default"] = (new vue__WEBPACK_IMPORTED_MODULE_0___default.a());

/***/ }),

/***/ "./resources/js/views/dynamicattributes/attributeBus.js":
/*!**************************************************************!*\
  !*** ./resources/js/views/dynamicattributes/attributeBus.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);

/* harmony default export */ __webpack_exports__["default"] = (new vue__WEBPACK_IMPORTED_MODULE_0___default.a());

/***/ }),

/***/ "./resources/js/views/reportattributes/list.vue":
/*!******************************************************!*\
  !*** ./resources/js/views/reportattributes/list.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _list_vue_vue_type_template_id_274c8633_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./list.vue?vue&type=template&id=274c8633&scoped=true& */ "./resources/js/views/reportattributes/list.vue?vue&type=template&id=274c8633&scoped=true&");
/* harmony import */ var _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./list.vue?vue&type=script&lang=js& */ "./resources/js/views/reportattributes/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _list_vue_vue_type_style_index_0_id_274c8633_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css& */ "./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _list_vue_vue_type_template_id_274c8633_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _list_vue_vue_type_template_id_274c8633_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "274c8633",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/reportattributes/list.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/reportattributes/list.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/views/reportattributes/list.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css&":
/*!***************************************************************************************************************!*\
  !*** ./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css& ***!
  \***************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_style_index_0_id_274c8633_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--6-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--6-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=style&index=0&id=274c8633&scoped=true&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_style_index_0_id_274c8633_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_style_index_0_id_274c8633_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_style_index_0_id_274c8633_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_style_index_0_id_274c8633_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/views/reportattributes/list.vue?vue&type=template&id=274c8633&scoped=true&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/views/reportattributes/list.vue?vue&type=template&id=274c8633&scoped=true& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_274c8633_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./list.vue?vue&type=template&id=274c8633&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reportattributes/list.vue?vue&type=template&id=274c8633&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_274c8633_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_list_vue_vue_type_template_id_274c8633_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/reports/item.vue":
/*!*********************************************!*\
  !*** ./resources/js/views/reports/item.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _item_vue_vue_type_template_id_feec173c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./item.vue?vue&type=template&id=feec173c&scoped=true& */ "./resources/js/views/reports/item.vue?vue&type=template&id=feec173c&scoped=true&");
/* harmony import */ var _item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./item.vue?vue&type=script&lang=js& */ "./resources/js/views/reports/item.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _item_vue_vue_type_template_id_feec173c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _item_vue_vue_type_template_id_feec173c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "feec173c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/reports/item.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/reports/item.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/views/reports/item.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./item.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reports/item.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/reports/item.vue?vue&type=template&id=feec173c&scoped=true&":
/*!****************************************************************************************!*\
  !*** ./resources/js/views/reports/item.vue?vue&type=template&id=feec173c&scoped=true& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_feec173c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./item.vue?vue&type=template&id=feec173c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/reports/item.vue?vue&type=template&id=feec173c&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_feec173c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_feec173c_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);