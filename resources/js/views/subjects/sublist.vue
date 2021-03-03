<template>
    <div class="card">
        <ul class="todo-list" data-widget="todo-list">

            <li class="list-group-item"
                v-for="(subsubject, idx) in subsubjects"
                :key="subsubject.id"
            >
                <i class="fa fa-align-justify handle"></i>

                <subsubject :subject_prop="subsubject" :is-subsubject_prop=true></subsubject>

            </li>

        </ul>
    </div>
</template>

<script>
    import SubjectBus from "./subjectBus";

    export default {
        name: "sublist",
        props: {
            subsubjects_prop: {},
            parentSubjectId_prop: ''
        },
        components: {
            subsubject: () => import('./subjectitem.vue')
        },
        mounted() {

            this.$on('subsubject_deleted', (subject) => {
                this.deleteSubject(subject);
            })
        },
        data() {
            return {
                subsubjects: this.subsubjects_prop,
                parentSubjectId: this.parentSubjectId_prop,
            }
        },
        methods: {
            editSubSubject(subject) {
                SubjectBus.$emit('subsubject_edit', subject, this.parentSubjectId)
            },
            updateSubject(subject) {
                // we get the index of the modified subject
                let subjectIndex = this.subsubjects.findIndex(s => {
                    return subject.id === s.id
                })
                this.subsubjects.splice(subjectIndex, 1, subject)
                window.noty({
                    message: 'Subject successfully modified',
                    type: 'success'
                })
            },
            addSubject(subject) {
                let subjectIndex = this.subsubjects.findIndex(c => {
                    return subject.id === c.id
                })
                // if this subject does not already exist, it is inserted in the list
                if (subjectIndex === -1) {
                    window.noty({
                        message: 'Subject successfully created',
                        type: 'success'
                    })
                    this.subsubjects.push(subject)
                }
            },
            deleteSubject(subject) {
                let subjectIndex = this.subsubjects.findIndex(c => {
                    return subject.id === c.id
                })
                // if this subject exists, it is removed from list
                if (subjectIndex !== -1) {
                    window.noty({
                        message: 'Subject successfully deleted',
                        type: 'success'
                    })
                    this.subsubjects.splice(subjectIndex, 1)
                }
            }
        }
    }
</script>

<style scoped>

</style>
