<?php include 'header.php'; ?>
<?php
$project_db = 'pms_project';
$user_db = 'pms_user';
$project_data = $front->db->gettable($project_db);
$user_data = $front->db->gettable($user_db);
?>
    <div class="page-container">

        <?php include 'sidebar.php'; ?>
        <div class="page-content">
            <?php include 'nav.php'; ?>
            <div class="page-content-wrap">
                <div class="message-wrapp panel-group" id="accordion">
                    <div class="message-title">
                        <h3>projects</h3>
                        <div class="add-project pull-right"><a class="btn" data-toggle="modal"
                                                               data-target="#add-project">add new project</a></div>
                        <div class="sort pull-right">
                            <label>Sort:</label>
                            <select>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <?php
                    $i = 1;
                    if ($project_data):
                        foreach ($project_data as $project):
                            switch ($project["status"]):
                                case 1:
                                    $project_status = CONFIG::PROJECT_STATUS_1;
                                    break;
                                default:
                                    $project_status = CONFIG::PROJECT_STATUS_0;
                            endswitch;
                            echo '<div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $i . '">' . $project["name"] . '</a>
                  <span class="pull-right status_' . $project["status"] . '">' . $project_status . '</span>
            </div>
            <div id="collapse' . $i . '" class="panel-collapse collapse">
                <div class="comment assign">
                    <span class=""><i class="fa fa-user"></i>Assign to:</span> <button class="btn author">Sayush</button>
                    <p class="description">' . $project["description"] . '</p>
                </div>
                <div class="reply-btn">
                 <ul>
                     <li><i class="fa fa-calendar"></i>Start date: ' . $project["start_date"] . '<span>|</span></li>
                     <li><i class="fa fa-calendar"></i>End date: ' . $project["end_date"] . '<span>|</span></li>
                     <li><i class="fa fa-map-marker"></i>Location: ' . $project["location"] . '</li>
                     <li class="pull-right last"><a href="ajax-process.php?delete&project='.$project["ID"].'"><i class="fa fa-trash"></i>Delete</a></li>
                     <li class="pull-right"><a href=""><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                     
                 </ul>
                </div>
            </div>
        </div>';
                            $i++;
                        endforeach;
                    else:
                        echo 'No Project Found.';
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Project</h4></div>
                <div class="modal-body">
                    <form class="form-horizontal" action="ajax-process.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Project Name">
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <select name="assigned_to">
                                <?php
                                foreach ($user_data as $user):
                                    echo '<option value="' . $user["user_id"] . '">' . $user["firstname"] . '</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input name="location" type="text" class="form-control" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <input name="start_date" type="text" class="form-control datepicker"
                                   placeholder="Start Date">
                        </div>
                        <div class="form-group">
                            <input name="end_date" type="text" class="form-control datepicker" placeholder="End Date">
                        </div>
                        <div class="form-group ">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="add-project" class="btn btn-primary save">Save</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>