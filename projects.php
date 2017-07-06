<?php include 'header.php';
 $s1='class="active"';
?>
<div class="page-container">  

<?php include 'sidebar.php';?>
<div class="page-content">
    <?php include 'nav.php';?>
   <div class="page-content-wrap">
    <div class="message-wrapp panel-group" id="accordion">
        <div class="message-title">
            <h3>projects</h3>
            <div class="add-project pull-right"> <a class="btn" data-toggle="modal" data-target="#add-project">add new project</a> </div>
            <div class="sort pull-right">
                <label>Sort:</label>
                <select>
                    <option></option>
                    <option></option>
                </select>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                  <span class="due pull-right">Due today</span>
            </div>
            <div id="collapse1" class="panel-collapse collapse  in">
                <div class="comment assign">
                    <span class=""><i class="fa fa-user"></i>Assign to:</span> <button class="btn author">Sayush</button>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="reply-btn">
                 <ul>
                     <li><i class="fa fa-calendar"></i>Start date: 12-12 2017<span>|</span></li>
                     <li><i class="fa fa-calendar"></i>End date: 12-12 2017<span>|</span></li>
                     <li><i class="fa fa-map-marker"></i>Location: Kochi</li>
                     <li class="pull-right last"><a href=""><i class="fa fa-trash"></i>Delete</a></li>
                     <li class="pull-right"><a href=""><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                     
                 </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                <span class="pending pull-right">Pending</span>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="comment">
                  <span class=""><i class="fa fa-user"></i>Assign to:</span> <button class="btn author">Sayush</button>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="reply-btn">
                 <ul>
                     <li><i class="fa fa-calendar"></i>Start date: 12-12 2017<span>|</span></li>
                     <li><i class="fa fa-calendar"></i>End date: 12-12 2017<span>|</span></li>
                     <li><i class="fa fa-map-marker"></i>Location: Kochi</li>
                     <li class="pull-right last"><a href=""><i class="fa fa-trash"></i>Delete</a></li>
                     <li class="pull-right"><a href=""><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                     
                 </ul>
                </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                 <span class="approved pull-right">Approved</span>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="comment">
                     <span class=""><i class="fa fa-user"></i>Assign to:</span> <button class="btn author">Sayush</button>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="reply-btn">
                 <ul>
                     <li><i class="fa fa-calendar"></i>Start date: 12-12 2017<span>|</span></li>
                     <li><i class="fa fa-calendar"></i>End date: 12-12 2017<span>|</span></li>
                     <li><i class="fa fa-map-marker"></i>Location: Kochi</li>
                     <li class="pull-right last"><a href=""><i class="fa fa-trash"></i>Delete</a></li>
                     <li class="pull-right"><a href=""><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                     
                 </ul>
                </div>
            </div>
        </div>
        
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
                <h4 class="modal-title" id="myModalLabel">Add New Project</h4> </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Project Name"> 
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