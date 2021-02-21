<template>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title" v-if="editing">Edit Subject</h3>
            <h3 class="card-title" v-else>Create New Subject</h3>
        </div>
        <!-- /.card-header -->
        <!-- card-body -->

        <div class="modal-body">

            <form class="form-horizontal" @submit.prevent @keydown="subjectForm.errors.clear()">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-sm">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" autocomplete="title" placeholder="Title" v-model="subjectForm.title">
                        <span class="invalid-feedback d-block" role="alert" v-if="subjectForm.errors.has('title')" v-text="subjectForm.errors.get('title')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="m_select_category" class="col-sm-2 col-form-label text-sm">Category</label>
                    <div class="col-sm-10">
                        <multiselect
                            id="m_select_category"
                            v-model="subjectForm.category"
                            selected.sync="subjectForm.category"
                            value=""
                            :options="categories"
                            :searchable="true"
                            :multiple="false"
                            label="title"
                            track-by="id"
                            key="id"
                            placeholder="Category"
                        >
                        </multiselect>
                        <span class="invalid-feedback d-block" role="alert" v-if="subjectForm.errors.has('category')" v-text="subjectForm.errors.get('category')"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-sm">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="description" name="description" autocomplete="description" placeholder="Description" v-model="subjectForm.description">
                        <span class="invalid-feedback d-block" role="alert" v-if="subjectForm.errors.has('description')" v-text="subjectForm.errors.get('description')"></span>
                    </div>
                </div>

            </form>

        </div>
        <!-- /.card-body -->
        <div class="card-footer justify-content-between">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" @click="close()" >Close</button>
            <button type="button" class="btn btn-warning btn-sm" @click="createSubject()" :disabled="!isValidCreateForm">Save</button>
        </div>
        <!-- /.card-footer -->

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'

    // eslint-disable-next-line no-unused-vars
    class Subject {
        constructor(subject) {
            this.title = subject.title || ''
            this.code = subject.code || ''
            this.description = subject.description || ''
            this.status = subject.status || ''
            this.category = subject.category || ''
            this.subjectparent = subject.subjectparent || ''
        }
    }
    export default {
        name: "addupdate",
        props: {
        },
        // eslint-disable-next-line vue/no-unused-components
        components: { Multiselect },
        mounted() {
        },
        created() {
            axios.get('/categories')
                .then(({data}) => this.categories = data);
        },
        data() {
            return {
                subject: {},
                // eslint-disable-next-line no-undef
                subjectForm: new Form(new Subject({})),
                subjectId: null,
                editing: false,
                loading: false,
                categories: []
            }
        },
        methods: {
            close() {
                window.location = '/subjects'
            },
            clearForm() {
                this.subjectForm = new Form(new Subject({}));
            },
            createSubject() {
                this.subjectForm
                    .post(`/subjects`)
                    .then(data => {
                        //window.location = '/subjects'
                        console.log("subject_created: ",data)

                        this.$swal({
                            title: 'Subject successfully created !',
                            text: 'Create a new One ?',
                            type: 'success',
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            cancelButtonText: 'No',
                            showLoaderOnConfirm: true
                        }).then((result) => {
                            if(result.value) {
                                this.clearForm();
                            } else {
                                window.location = '/subjects'
                            }
                        })

                        // eslint-disable-next-line no-unused-vars
                    }).catch(error => {
                    this.loading = false
                });
            },
            updateData(data) {
                window.noty({
                    message: 'Successful treatment',
                    type: 'success'
                })

                window.noty({
                    message: 'Subject successfully created',
                    type: 'success'
                })
            },
        },
        computed: {
            isValidCreateForm() {
                return !this.loading
            }
        }
    }
</script>

<style scoped>

</style>
