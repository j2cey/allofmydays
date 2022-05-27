<template>
    <div class="modal fade" id="addUpdateWorkflow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-sm" id="reportModalLabel">{{ formTitle }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" @submit.prevent @keydown="reportForm.errors.clear()">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="report_title" class="col-sm-2 col-form-label text-xs">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-xs" id="report_title" name="title" autocomplete="title" autofocus placeholder="Titre" v-model="reportForm.title">
                                    <span class="invalid-feedback d-block text-xs" role="alert" v-if="reportForm.errors.has('title')" v-text="reportForm.errors.get('title')"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="m_select_reporttype" class="col-sm-2 col-form-label text-xs">Report Type</label>
                                <div class="col-sm-10 text-xs">
                                    <multiselect class="text text-xs"
                                                 id="m_select_reporttype"
                                                 v-model="reportForm.reporttype"
                                                 selected.sync="reportForm.reporttype"
                                                 value=""
                                                 :options="reporttypes"
                                                 :searchable="true"
                                                 :multiple="false"
                                                 label="name"
                                                 track-by="id"
                                                 key="id"
                                                 placeholder="Report Type"
                                    >
                                    </multiselect>
                                    <span class="invalid-feedback d-block text-xs" role="alert" v-if="reportForm.errors.has('reporttype')" v-text="reportForm.errors.get('reporttype')"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="report_description" class="col-sm-2 col-form-label text-xs">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control text-xs" id="report_description" name="description" required autocomplete="description" autofocus placeholder="Description" v-model="reportForm.description">
                                    <span class="invalid-feedback d-block text-xs" role="alert" v-if="reportForm.errors.has('description')" v-text="reportForm.errors.get('description')"></span>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer justify-content-between">
                    <b-button type="is-dark" size="is-small" data-dismiss="modal">Fermer</b-button>
                    <b-button type="is-primary" size="is-small" :loading="loading" @click="updateWorkflow()" :disabled="!isValidCreateForm" v-if="editing">Enregistrer</b-button>
                    <b-button type="is-primary" size="is-small" :loading="loading" @click="createWorkflow()" :disabled="!isValidCreateForm" v-else>Créer Workflow</b-button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    import WorkflowBus from "./reportBus";

    class Workflow {
        constructor(report) {
            this.title = report.title || ''
            this.reporttype = report.reporttype || ''
            this.description = report.description || ''
        }
    }
    export default {
        name: "report-addupdate",
        props: {
        },
        components: { Multiselect },
        mounted() {
            this.$parent.$on('create_new_report', () => {

                this.editing = false
                this.report = new Workflow({})
                this.reportForm = new Form(this.report)

                this.formTitle = 'Create New Report'

                $('#addUpdateWorkflow').modal()
            })

            WorkflowBus.$on('edit_report', ({ report }) => {
                this.editing = true
                this.report = new Workflow(report)
                this.reportForm = new Form(this.report)
                this.reportId = report.uuid

                this.formTitle = 'Update Report'

                $('#addUpdateWorkflow').modal()
            })
        },
        created() {
            axios.get('/reporttypes.fetch')
                .then(({data}) => this.reporttypes = data);
        },
        data() {
            return {
                formTitle: 'Create Report',
                report: {},
                reportForm: new Form(new Workflow({})),
                reportId: null,
                editing: false,
                loading: false,
                reporttypes: []
            }
        },
        methods: {
            createWorkflow() {
                this.loading = true

                this.reportForm
                    .post('/reports')
                    .then(newreport => {
                        this.loading = false
                        this.$parent.$emit('new_report_created', newreport)
                        $('#addUpdateWorkflow').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            },
            updateWorkflow() {
                this.loading = true

                this.reportForm
                    .put(`/reports/${this.reportId}`,undefined)
                    .then(updreport => {
                        this.loading = false
                        WorkflowBus.$emit('report_updated', updreport)
                        $('#addUpdateWorkflow').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            }
        },
        computed: {
            isValidCreateForm() {
                return !this.loading
            }
        }
    }
</script>
