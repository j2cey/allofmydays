<template>
    <div class="modal fade draggable" id="addUpdateTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-if="editing">Update Task</h5>
                    <h5 class="modal-title" id="exampleModalLabel" v-else>Create New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" @submit.prevent @keydown="taskForm.errors.clear()">

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" autocomplete="title" autofocus placeholder="Title" v-model="taskForm.title">
                                    <span class="invalid-feedback d-block" role="alert" v-if="taskForm.errors.has('title')" v-text="taskForm.errors.get('title')"></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description" autocomplete="description" autofocus placeholder="Description" v-model="taskForm.description">
                                    <span class="invalid-feedback d-block" role="alert" v-if="taskForm.errors.has('description')" v-text="taskForm.errors.get('description')"></span>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning btn-sm" @click="updateTask(subjectId)" :disabled="!isValidCreateForm" v-if="editing">Save</button>
                    <button type="button" class="btn btn-warning btn-sm" @click="createTask(subjectId)" :disabled="!isValidCreateForm" v-else>Create Task</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import TaskBus from './taskBus'
    class Task {
        constructor(task) {
            this.title = task.title || ''
            this.code = task.code || ''
            this.description = task.description || ''
            this.subject_id = task.subject_id || ''
            this.subject_posi = task.subject_posi || ''
            this.subtask_posi = task.subtask_posi || ''
        }
    }
    export default {
        name: "addupdate",
        components: { Multiselect },
        mounted() {
            this.$parent.$on('task_create', (subjectId) => {
                this.editing = false
                this.subjectId = subjectId
                this.task = new Task({})
                this.task.subject_id = subjectId
                this.taskForm = new Form(this.task)
                $('#addUpdateTask').modal()
            })
            TaskBus.$on('task_edit', (task, subjectId) => {
                this.editing = true
                this.task = new Task(task)
                this.taskForm = new Form(this.task)
                this.taskId = task.uuid
                this.subjectId = subjectId
                $('#addUpdateTask').modal()
            })
        },
        created() {
        },
        data() {
            return {
                task: {},
                subjectId: '',
                taskForm: new Form(new Task({})),
                taskId: null,
                editing: false,
                loading: false
            }
        },
        methods: {
            createTask(subjectId) {
                this.loading = true
                this.taskForm
                    .post('/tasks')
                    .then(task => {
                        this.loading = false
                        TaskBus.$emit('task_created', {task, subjectId})
                        $('#addUpdateTask').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
            },
            updateTask(subjectId) {
                this.loading = true
                const fd = this.addFileToForm()
                this.taskForm
                    .put(`/tasks/${this.taskId}`, fd)
                    .then(task => {
                        this.loading = false
                        TaskBus.$emit('task_updated', {task, subjectId})
                        $('#addUpdateTask').modal('hide')
                    }).catch(error => {
                    this.loading = false
                });
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
