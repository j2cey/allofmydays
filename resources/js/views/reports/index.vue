<template>
    <div class="container">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <h6 class="profile-username text-center text-sm">subject.title</h6>

                    <p class="text-muted text-center text-sm font-weight-light">subject.description</p>
                    <p class="text-muted text-center font-italic">
                        <small>subject.full_path</small>
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item text text-sm">
                            <b>Category</b> <a class="float-right">subject.category.title</a>
                        </li>
                        <li class="list-group-item text text-sm">
                            <b>Subject-Parent</b> <a class="float-right">subject.subjectparent.title</a>
                        </li>
                    </ul>

                    <a class="btn btn-primary btn-block btn-sm"><b>Edit</b></a>
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
                                        <span class="badge badge-default">
                                            Tasks of the Subject <span class="badge badge-pill badge-dark">subject.tasks.length</span>
                                        </span>
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-info float-right" @click="alert('Button clicked')"><i class="fas fa-plus"></i> Task</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="taskslist">
                                    <!-- Tasks List-->
                                    Tasks List
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
                                        <span class="badge badge-default">
                                            Sub-Subjects <span class="badge badge-pill badge-dark">subject.subsubjects.length</span>
                                        </span>
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-warning float-right" @click="alert('Button clicked !')"><i class="fas fa-plus"></i> Sub-Subject</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" id="subsubjectslist">
                                    <!-- Subsubject List-->
                                    Subject list
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

                            <planning></planning>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="timeline">
                            <timeline></timeline>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
    </div>
</template>

<script>
    import planning from "../subjects/planning";
    import timeline from "../subjects/timeline";

    export default {
        name: "report-index",
        props: {
            subject_prop: {}
        },
        components: { planning, timeline },
    }
</script>

<style scoped>

</style>
