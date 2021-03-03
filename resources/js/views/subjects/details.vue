<template>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h6 class="profile-username text-center text-sm">{{ subject.title }}</h6>

                    <p class="text-muted text-center text-sm">{{ subject.description }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item text text-sm" v-if="subject.category">
                            <b>Category</b> <a class="float-right">{{ subject.category.title }}</a>
                        </li>
                        <li class="list-group-item text text-sm" v-else>
                            <b>Subject-Parent</b> <a :href="'/subjects/' + subject.subjectparent.uuid + '' " class="float-right">{{ subject.subjectparent.title }}</a>
                        </li>
                    </ul>

                    <a :href="'/subjects/' + subject.uuid + '/edit' " class="btn btn-primary btn-block btn-sm"><b>Edit</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#tasks" data-toggle="tab">Tasks</a></li>
                        <li class="nav-item"><a class="nav-link" href="#subsubjects" data-toggle="tab">Sub-subject</a></li>
                        <li class="nav-item"><a class="nav-link" href="#planning" data-toggle="tab">Planning</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="tasks">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        Tasks of the Subject
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-info float-right" @click="createNewTask(subject.id)"><i class="fas fa-plus"></i> Task</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="taskslist">
                                    <!-- Tasks List-->
                                    <tasks-list :tasks_prop="subject.tasks" :subjectId_prop="subject.id"></tasks-list>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="subsubjects">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        Sub-Subject
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-warning float-right" @click="createNewSubsubject(subject.id)"><i class="fas fa-plus"></i> Sub-Subject</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="subsubjectslist">
                                    <!-- Tasks List-->
                                    <subjects-list :subjects_prop="subject.subsubjects" :parentId_prop="subject.id" :isSubList_prop=true :isUpperListColored_prop=false></subjects-list>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="planning">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">

                                    <span class="username">
                  <a href="#">Jonathan Burke Jr.</a>
                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                    <span class="float-right">
                  <a href="#" class="link-black text-sm">
                    <i class="far fa-comments mr-1"></i> Comments (5)
                  </a>
                </span>
                                </p>

                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">

                                    <span class="username">
                  <a href="#">Sarah Ross</a>
                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore the hate as they create awesome
                                    tools to help create filler text for everyone from bacon lovers
                                    to Charlie Sheen fans.
                                </p>

                                <form class="form-horizontal">
                                    <div class="input-group input-group-sm mb-0">
                                        <input class="form-control form-control-sm" placeholder="Response">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-danger">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">

                                    <span class="username">
                  <a href="#">Adam Jones</a>
                  <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                </span>
                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row mb-3">
                                    <div class="col-sm-6">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-6">

                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <p>
                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                    <span class="float-right">
                  <a href="#" class="link-black text-sm">
                    <i class="far fa-comments mr-1"></i> Comments (5)
                  </a>
                </span>
                                </p>

                                <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                <span class="bg-danger">
                  10 Feb. 2014
                </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-user bg-info"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-comments bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                <span class="bg-success">
                  3 Jan. 2014
                </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <add-update-task></add-update-task>
        <add-update-subject></add-update-subject>
    </div>
    <!-- /.row -->
</template>

<script>
    import tasksList from '../tasks/taskslist'
    import addUpdateTask from '../tasks/addupdate'

    import subjectsList from '../subjects/subjectslist'
    import addUpdateSubject from '../subjects/subsubject-create'

    export default {
        name: "subjectdetails",
        props: {
            subject_prop: {}
        },
        components: { tasksList, addUpdateTask, subjectsList, addUpdateSubject },
        data() {
            return {
                subject: this.subject_prop,
            };
        },
        methods: {
            createNewTask(subjectId) {
                this.$emit('task_create', subjectId)
            },
            createNewSubsubject(subjectId) {
                this.$emit('subsubject_create', subjectId)
            },
        }
    }
</script>

<style scoped>

</style>
