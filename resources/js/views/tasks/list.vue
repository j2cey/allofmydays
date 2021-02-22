<template>
    <div>
        <ul class="todo-list" data-widget="todo-list">

            <li class="list-group-item"
                v-for="(task, idx) in tasks"
                :key="task.id"
            >
                <i class="fa fa-align-justify handle"></i>

                <span class="text" data-toggle="collapse" data-parent="#subjectlist" :href="'#collapse-task-'+task.id">{{ task.title }}</span>
                <!-- Emphasis label -->
                <small class="badge badge-pill badge-warning"><i class="fa fa-"></i> {{ task.status.name }}</small>


                <!-- General tools such as edit or delete-->
                <div class="tools">
                    <i class="fa fa-pencil-square-o" @click="editTask(task)"></i>
                    <button type="button" class="btn btn-tool" data-toggle="collapse" data-parent="#subjectlist" :href="'#collapse-task-'+task.id">
                        <i class="fas fa-minus"></i>
                    </button>
                    <i class="fa fa-trash-o"></i>
                </div>

                <!-- Action(s) de l'Etape -->
                <div :id="'collapse-task-'+task.id" class="panel-collapse collapse in">
                    <div class="card-header">
                        <div class="form-inline float-left">
                            <span class="help-inline pr-1"> Action(s) de l'Etape </span>

                            <button class="btn btn-xs btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">



                    </div>

                </div>
                <!-- / Action(s) de l'Etape -->

            </li>

        </ul>
    </div>
</template>

<script>
    import TaskBus from './taskBus'

    export default {
        name: "list",
        props: {
            tasks_prop: {}
        },
        data() {
            return {
                tasks: this.tasks_prop
            }
        },
        methods: {
            editTask(task) {
                TaskBus.$emit('task_edit', task, task.subject_id)
            }
        }
    }
</script>

<style scoped>

</style>
