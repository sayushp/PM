<?php
require_once('library/frontend.class.php');
$front->isLoggedin();
$task_db = 'pms_task';
$project_db = 'pms_project';
//$task_data=$front->db->gettable($task_db);
//$project_data=$front->db->gettable($project_db);

//Add Project
  if (isset($_POST["add-project"])){
      $project['name'] = $_POST["name"];
      $project['description'] = $_POST["description"];
      $project['location'] = $_POST["location"];
      $project['start_date'] = $_POST["start_date"];
      $project['end_date'] = $_POST["end_date"];
      $project['assigned_to'] = $_POST["assigned_to"];
      $project['status'] = 1;
      $project['active'] = 1;
      $project_insert = $front->db->dbinsert($project_db,$project);
      if($project_insert){
          header('location:projects.php#ADDED');
          exit;
      }
  }

//Delete Project
  if(isset($_GET["delete"]) && isset($_GET['project'])){
      $project_id=$_GET['project'];
      $field ='ID';
      $project_insert = $front->db->dbdelete($project_db,$field,$project_id);
      if($project_insert){
          header('location:projects.php#DELETED');
          exit;
      }

  }


//  Add Task
  if (isset($_POST["add-tasks"])){
      $task['project_id'] = $_POST["project_id"];
      $task['name'] = $_POST["name"];
      $task['description'] = $_POST["description"];
      $task['start_date'] = $_POST["start_date"];
      $task['end_date'] = $_POST["end_date"];
      $task['assigned_to'] = $_POST["assigned_to"];
      $task['status'] = 1;
      $task['active'] = 1;
      $task_insert = $front->db->dbinsert($task_db,$task);
      if($task_insert){
          header('location:tasks.php#ADDED');
          exit;
      }
  }

//Delete Task
if(isset($_GET["delete"]) && isset($_GET['task'])){
    $task_id=$_GET['task'];
    $field ='ID';
    $project_insert = $front->db->dbdelete($task_db,$field,$task_id);
    if($project_insert){
        header('location:tasks.php#DELETED');
        exit;
    }

}
?>
