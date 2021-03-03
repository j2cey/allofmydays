<template>
    <div class="card">
        <ul class="todo-list" data-widget="todo-list">

            <li class="list-group-item"
                v-for="(subtask, idx) in subtasks"
                :key="subtask.id"
            >
                <i class="fa fa-align-justify handle"></i>

                <subtask :task_prop="subtask" :is-subtask_prop=true></subtask>

            </li>

        </ul>
    </div>
</template>

<script>
    import TaskBus from "./taskBus";

    export default {
        name: "sublist",
        props: {
            subtasks_prop: {},
            parentTaskId_prop: ''
        },
        components: {
            subtask: () => import('./taskitem.vue')
        },
        mounted() {
            TaskBus.$on('subtask_created', (add_data) => {
                if (this.parentTaskId === add_data.parentTaskId) {
                    this.addTask(add_data.task)
                }
            })
            this.$on('subtask_deleted', (task) => {
                this.deleteTask(task);
            })
        },
        data() {
            return {
                subtasks: this.subtasks_prop,
                parentTaskId: this.parentTaskId_prop,
            }
        },
        methods: {
            editSubTask(task) {
                TaskBus.$emit('subtask_edit', task, this.parentTaskId)
            },
            updateTask(task) {
                // we get the index of the modified task
                let taskIndex = this.subtasks.findIndex(s => {
                    return task.id === s.id
                })
                this.subtasks.splice(taskIndex, 1, task)
                window.noty({
                    message: 'Task successfully modified',
                    type: 'success'
                })
            },
            addTask(task) {
                let taskIndex = this.subtasks.findIndex(c => {
                    return task.id === c.id
                })
                // if this task does not already exist, it is inserted in the list
                if (taskIndex === -1) {
                    window.noty({
                        message: 'Task successfully created',
                        type: 'success'
                    })
                    this.subtasks.push(task)
                }
            },
            deleteTask(task) {
                let taskIndex = this.subtasks.findIndex(c => {
                    return task.id === c.id
                })
                // if this task exists, it is removed from list
                if (taskIndex !== -1) {
                    window.noty({
                        message: 'Task successfully deleted',
                        type: 'success'
                    })
                    this.subtasks.splice(taskIndex, 1)
                }
            }
        }
    }
</script>

<style scoped>

</style>
