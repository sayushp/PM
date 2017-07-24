<?php include 'header.php'; ?>
<?php
$task_db = 'pms_task';
$project_db = 'pms_project';
$task_data=$front->db->gettable($task_db);
$project_data=$front->db->gettable($project_db);
?>
<div class="page-container">  

<?php include 'sidebar.php';?>
<div class="page-content">
    <?php include 'nav.php';?>
   <div class="page-content-wrap">
    <div class="message-wrapp panel-group" id="accordion">
        <div class="message-title">
            <h3>Tasks</h3>
            <div class="add-project pull-right"> <a class="btn" data-toggle="modal" data-target="#add-project">add new task</a> </div>
            <div class="sort pull-right">
                <label>Sort:</label>
                <select>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <?php
        $i=1;
        if($task_data):
            foreach ($task_data as $task):
                switch ($task["status"]):
                    case 1:
                        $task_status= CONFIG::PROJECT_STATUS_1;
                        break;
                    default:
                        $task_status= CONFIG::PROJECT_STATUS_0;
                endswitch;
                echo '<div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$i.'">'.$task["name"].'</a>
                  <span class="pull-right status_'.$task["status"].'">'.$task_status.'</span>
            </div>
            <div id="collapse'.$i.'" class="panel-collapse collapse">
                <div class="comment assign">
                    <span class=""><i class="fa fa-user"></i>Project:</span>'.$task["project_id"].'<br/>
                    <span class=""><i class="fa fa-user"></i>Assign to:</span> <button class="btn author">Sayush</button>
                    <p class="description">'.$task["description"].'</p>
                </div>
                <div class="reply-btn">
                 <ul>
                     <li><i class="fa fa-calendar"></i>Start date: '.$task["start_date"].'<span>|</span></li>
                     <li><i class="fa fa-calendar"></i>End date: '.$task["end_date"].'<span>|</span></li>
                     <li><i class="fa fa-map-marker"></i>Location: '.$task["location"].'</li>
                     <li class="pull-right last"><a href=""><i class="fa fa-trash"></i>Delete</a></li>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Task</h4> </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <select name="project">
                            <?php
                            foreach ($project_data as $project):
                                echo '<option name="'.$project["ID"].'">'.$project["name"].'</option>';
                                endforeach;
                            ?>
                        </select>
                            <input type="text" class="form-control"  placeholder="Task Name">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Assigned To">
                    </div>
                     <div class="form-group">
                            <input type="text" class="form-control"  placeholder="About">
                    </div>
                     <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Location">
                    </div>
                     <div class="form-group">
                            <input type="text" class="form-control datepicker"  placeholder="Start Date">
                    </div>
                     <div class="form-group">
                            <input type="text" class="form-control datepicker"  placeholder="End Date">
                    </div>
                    <div class="form-group ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save">Save</button>
                    </div>
                   
                </form>
            </div>
        
        </div>
    </div>
</div>
<?php include 'footer.php';?>