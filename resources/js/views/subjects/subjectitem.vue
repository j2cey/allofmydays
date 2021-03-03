<template>
    <div :class="[isUpperListColored ? 'card' : 'card card-warning', 'card-outline collapsed-card']">
        <div class="card-header">
            <ul class="nav nav-tabs" :id="'subject-'+ subject.id +'-tabs-tab'" role="tablist">
                <li class="pt-2 px-3"><small class="card-title d-inline-block text-truncate text-sm-left" style="max-width: 150px;">{{ subject.title }}</small></li>

                <li class="nav-item">
                    <a class="nav-link active" :id="'subject-tabs-home-tab-' + subject.id" data-toggle="pill" :href="'#subject-tabs-home-' + subject.id" role="tab" aria-controls="subject-tabs-home" aria-selected="true"><small>Details</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :id="'subject-tabs-tasks-tab-' + subject.id" data-toggle="pill" :href="'#subject-tabs-tasks-' + subject.id" role="tab" aria-controls="subject-tabs-tasks" aria-selected="false"><small>Tasks <span class="badge badge-pill badge-info">{{ subject.tasks ? subject.tasks.length : 0 }}</span></small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :id="'subject-tabs-subsubjects-tab-' + subject.id" data-toggle="pill" :href="'#subject-tabs-subsubjects-' + subject.id" role="tab" aria-controls="subject-tabs-subsubjects" aria-selected="false"><small>Subsubjects <span class="badge badge-pill badge-info">{{ subject.subsubjects ? subject.subsubjects.length : 0 }}</span></small></a>
                </li>

            </ul>

            <div class="card-tools">
                <!-- Collapse Button -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a class="dropdown-item text-success" :href="'/subjects/' + subject.uuid ">
                            <small>
                                <i class="fa fa-eye" aria-hidden="true"></i> Edit
                            </small>
                        </a>
                        <a class="dropdown-item text-primary" @click="editSubject(subject)">
                            <small>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </small>
                        </a>
                        <a class="dropdown-divider"></a>
                        <a class="dropdown-item text-danger" @click="deleteSubject(subject)">
                            <small>
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                            </small>
                        </a>
                    </div>
                </div>
                <!-- Maximize Button -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="tab-content" :id="'subject-' + subject.id + '-tabs-tabContent'">
                <div class="tab-pane fade show active" :id="'subject-tabs-home-' + subject.id" role="tabpanel" aria-labelledby="subject-tabs-home-tab">
                    <dl class="row">
                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ subject.title }}</dd>
                        <dt class="col-sm-4">Description</dt>
                        <dd class="col-sm-8">{{ subject.description }}</dd>
                    </dl>
                </div>
                <div class="tab-pane fade" :id="'subject-tabs-tasks-' + subject.id" role="tabpanel" aria-labelledby="subject-tabs-tasks-tab">

                </div>
                <div class="tab-pane fade" :id="'subject-tabs-subsubjects-' + subject.id" role="tabpanel" aria-labelledby="subject-tabs-subsubjects-tab">
                    <button type="button" class="btn btn-sm btn-info float-right" @click="addSubSubject(subject)"><i class="fas fa-plus"></i> Subsubject</button>
                    <sub-subjects-list :subjects_prop="subject.subsubjects" :parentId_prop="subject.id" :isSubList_prop=true :isUpperListColored_prop="isCurrentListColored"></sub-subjects-list>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
</template>

<script>
    import SubjectBus from "./subjectBus";

    export default {
        name: "subjectitem",
        props: {
            subject_prop: null,
            subsubjects_prop: null,
            isSubsubject_prop: false,
            isUpperListColored_prop: false
        },
        components: {
            subSubjectsList: () => import('./subjectslist')
        },
        data() {
            return {
                subject: this.subject_prop,
                subsubjects: this.subsubjects_prop,
                isSubsubject: this.isSubsubject_prop,
                isUpperListColored: this.isUpperListColored_prop,
                isCurrentListColored: !this.isUpperListColored_prop
            }
        },
        mounted() {
            SubjectBus.$on('subject_updated', (upd_data) => {
                if (this.subject.subject_id === upd_data.subjectId) {
                    this.updateSubject(upd_data.subject)
                }
            })
            SubjectBus.$on('subsubject_updated', (upd_data) => {
                if (this.subject.subject_parent_id === upd_data.parentSubjectId) {
                    this.updateSubject(upd_data.subject)
                }
            })
        },
        methods: {
            editSubject(subject) {
                if (this.isSubsubject) {
                    SubjectBus.$emit('subsubject_edit', subject, subject.subject_parent_id)
                } else {
                    SubjectBus.$emit('subject_edit', subject, subject.subject_id)
                }
            },
            addSubSubject(subject) {
                SubjectBus.$emit('subsubject_create', subject.id)
            },
            updateSubject(subject) {
                // we get the index of the modified subject
                //let subjectIndex = this.subjects.findIndex(s => {
                //return subject.id === s.id
                //})
                window.noty({
                    message: 'Subject successfully deleted',
                    type: 'success'
                })
                this.subject = subject
            },
            addSubject(subject) {
                let subjectIndex = this.subjects.findIndex(c => {
                    return subject.id === c.id
                })
                // if this subject does not already exist, it is inserted in the list
                if (subjectIndex === -1) {
                    window.noty({
                        message: 'Subject successfully created',
                        type: 'success'
                    })
                    this.subjects.push(subject)
                }
            },
            deleteSubject(subject) {
                if (this.isSubsubject) {
                    this.deleteSubSubjectRaw(subject);
                } else {
                    this.deleteSubjectRaw(subject);
                }
            },
            deleteSubjectRaw(subject) {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {

                        axios.delete(`/subjects/${subject.uuid}`)
                            .then(resp => {
                                this.$parent.$emit('subject_deleted', subject)
                            }).catch(error => {
                            window.handleErrors(error)
                        })

                    }
                })
            },
            deleteSubSubjectRaw(subject) {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result.value) {

                        axios.delete(`/subsubjects/${subject.uuid}`)
                            .then(resp => {
                                this.$parent.$emit('subsubject_deleted', subject)
                            }).catch(error => {
                            window.handleErrors(error)
                        })

                    }
                })
            }
        },
        computed: {

        }
    }
</script>

<style scoped>

</style>
