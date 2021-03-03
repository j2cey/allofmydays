<template>

    <div :class="[isSubtask ? 'card card-info' : 'card', 'card-outline collapsed-card']">
        <div class="card-header">
            <ul class="nav nav-tabs" :id="'task-'+ task.id +'-tabs-tab'" role="tablist">
                <li class="pt-2 px-3"><span class="card-title d-inline-block text-truncate text-sm-left" style="max-width: 150px;">{{ task.title }}</span></li>

                <li class="nav-item">
                    <a class="nav-link active" :id="'task-tabs-home-tab-' + task.id" data-toggle="pill" :href="'#task-tabs-home-' + task.id" role="tab" aria-controls="task-tabs-home" aria-selected="true"><small>Details</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :id="'task-tabs-comments-tab-' + task.id" data-toggle="pill" :href="'#task-tabs-comments-' + task.id" role="tab" aria-controls="task-tabs-comments" aria-selected="false"><small>Comments</small></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :id="'task-tabs-subtasks-tab-' + task.id" data-toggle="pill" :href="'#task-tabs-subtasks-' + task.id" role="tab" aria-controls="task-tabs-subtasks" aria-selected="false"><small>Subtasks <span class="badge badge-pill badge-info">{{ task.subtasks ? task.subtasks.length : 0 }}</span></small></a>
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
                        <a class="dropdown-item text-success" @click="editTask(task)">
                            <small>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </small>
                        </a>
                        <a class="dropdown-divider"></a>
                        <a class="dropdown-item text-danger" @click="deleteTask(task)">
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

            <div class="tab-content" :id="'task-' + task.id + '-tabs-tabContent'">
                <div class="tab-pane fade show active" :id="'task-tabs-home-' + task.id" role="tabpanel" aria-labelledby="task-tabs-home-tab">
                    <dl class="row">
                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ task.title }}</dd>
                        <dt class="col-sm-4">Description</dt>
                        <dd class="col-sm-8">{{ task.description }}</dd>
                    </dl>
                </div>
                <div class="tab-pane fade" :id="'task-tabs-comments-' + task.id" role="tabpanel" aria-labelledby="task-tabs-comments-tab">

                </div>
                <div class="tab-pane fade" :id="'task-tabs-subtasks-' + task.id" role="tabpanel" aria-labelledby="task-tabs-subtasks-tab">
                    <button type="button" class="btn btn-sm btn-info float-right" @click="addSubTask(task)"><i class="fas fa-plus"></i> Subtask</button>
                    <sub-tasks-list :subtasks_prop="task.subtasks" :parentTaskId_prop="task.id"></sub-tasks-list>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

</template>

<script>
    import TaskBus from "./taskBus";
    import subTasksList from '../tasks/sublist';

    export default {
        name: "taskitem",
        props: {
            task_prop: null,
            subtasks_prop: null,
            isSubtask_prop: false
        },
        components: { subTasksList },
        data() {
            return {
                task: this.task_prop,
                subtasks: this.subtasks_prop,
                isSubtask: this.isSubtask_prop,
            }
        },
        mounted() {
            TaskBus.$on('task_updated', (upd_data) => {
                if (this.task.subject_id === upd_data.subjectId) {
                    this.updateTask(upd_data.task)
                }
            })
            TaskBus.$on('subtask_updated', (upd_data) => {
                if (this.task.task_parent_id === upd_data.parentTaskId) {
                    this.updateTask(upd_data.task)
                }
            })
        },
        methods: {
            editTask(task) {
                if (this.isSubtask) {
                    TaskBus.$emit('subtask_edit', task, task.task_parent_id)
                } else {
                    TaskBus.$emit('task_edit', task, task.subject_id)
                }
            },
            addSubTask(task) {
                TaskBus.$emit('subtask_create', task.id)
            },
            updateTask(task) {
                // we get the index of the modified task
                //let taskIndex = this.tasks.findIndex(s => {
                //return task.id === s.id
                //})
                window.noty({
                    message: 'Task successfully deleted',
                    type: 'success'
                })
                this.task = task
            },
            addTask(task) {
                let taskIndex = this.tasks.findIndex(c => {
                    return task.id === c.id
                })
                // if this task does not already exist, it is inserted in the list
                if (taskIndex === -1) {
                    window.noty({
                        message: 'Task successfully created',
                        type: 'success'
                    })
                    this.tasks.push(task)
                }
            },
            deleteTask(task) {
                if (this.isSubtask) {
                    this.deleteSubTaskRaw(task);
                } else {
                    this.deleteTaskRaw(task);
                }
            },
            deleteTaskRaw(task) {
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

                        axios.delete(`/tasks/${task.uuid}`)
                            .then(resp => {
                                this.$parent.$emit('task_deleted', task)
                            }).catch(error => {
                            window.handleErrors(error)
                        })

                    }
                })
            },
            deleteSubTaskRaw(task) {
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

                        axios.delete(`/subtasks/${task.uuid}`)
                            .then(resp => {
                                this.$parent.$emit('subtask_deleted', task)
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
