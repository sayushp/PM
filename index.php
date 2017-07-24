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
        <div class="row">
            <div class="col-xs-12 box">
                <div class="wrapper">
                    <ul class="project-list">
                        <li class="title">projects</li>
                        <?php
                        if($project_data):
                             foreach ($project_data as $project):
                                 switch ($project["status"]):
                                     case 1:
                                         $project_status= CONFIG::PROJECT_STATUS_1;
                                         break;
                                     default:
                                         $project_status= CONFIG::PROJECT_STATUS_0;
                                     endswitch;
                                 echo '<li>'.$project["name"].'<span class="pull-right status_'.$project["status"].'">'.$project_status.'</span></li>';
                                 endforeach;
                            else:
                               echo 'No Project Found.';
                                endif;
                        ?>
                       
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 box">
                 <div class="wrapper">
                     <ul class="project-list">
                        <li class="title">tasks</li>
                         <?php
                         if($task_data):
                             foreach ($task_data as $task):
                                 switch ($task["status"]):
                                     case 1:
                                         $task_status= CONFIG::PROJECT_STATUS_1;
                                         break;
                                     default:
                                         $task_status= CONFIG::PROJECT_STATUS_0;
                                 endswitch;
                                 echo '<li>'.$task["name"].'<span class="pull-right status_'.$task["status"].'">'.$task_status.'</span></li>';
                             endforeach;
                         else:
                             echo 'No task Found.';
                         endif;
                         ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 box1">
                 <div class="wrapper">
                     <ul class="project-list notification">
                        <li class="title">notification</li>
                         <li><h6>iSmooth Nexus 5 Ultra Clear Premium Ultra Clear Premium</h6>12-05.2017</li>
                          <li><h6>iSmooth Nexus 5 Ultra Clear Premium Ultra Clear Premium</h6>12-05.2017</li>
                          <li><h6>iSmooth Nexus 5 Ultra Clear Premium Ultra Clear Premium</h6>12-05.2017</li>
                          <li><h6>iSmooth Nexus 5 Ultra Clear Premium Ultra Clear Premium</h6>12-05.2017</li>
                          <li><h6>iSmooth Nexus 5 Ultra Clear Premium Ultra Clear Premium</h6>12-05.2017</li>
                         
                          
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
       
</div>
<?php include 'footer.php';?>