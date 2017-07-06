<?php include 'header.php';
 $s3='class="active"';
?>
<div class="page-container">  

<?php include 'sidebar.php';?>
<div class="page-content">
    <?php include 'nav.php';?>
   <div class="page-content-wrap">
    <div class="message-wrapp panel-group" id="accordion">
        <div class="message-title">
            <h3>messages</h3>
            <div class="add-project pull-right"> <a class="btn" data-toggle="modal" data-target="#add-message">add new message</a> </div>
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
            </div>
            <div id="collapse1" class="panel-collapse collapse  in">
                <div class="comment">
                    <button class="btn author">Sayush</button> <span class="date"><i class="fa fa-calendar"></i>jun 14th, 2:27 pm</span>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="comment reply">
                    <button class="btn author">Sayush</button> <span class="date"><i class="fa fa-calendar"></i>jun 14th, 2:27 pm</span>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="reply-btn"> <a class="btn"><i class="fa fa-reply"></i>Reply</a> </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="comment">
                    <button class="btn author">Sayush</button> <span class="date"><i class="fa fa-calendar"></i>jun 14th, 2:27 pm</span>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="reply-btn"> <a class="btn"><i class="fa fa-reply"></i>Reply</a> </div>
            </div>
        </div>
         <div class="panel panel-default">
            <div class="panel-heading">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="comment">
                    <button class="btn author">Sayush</button> <span class="date"><i class="fa fa-calendar"></i>jun 14th, 2:27 pm</span>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="comment reply">
                    <button class="btn author">Sayush</button> <span class="date"><i class="fa fa-calendar"></i>jun 14th, 2:27 pm</span>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                 <div class="comment reply">
                    <button class="btn author">Sayush</button> <span class="date"><i class="fa fa-calendar"></i>jun 14th, 2:27 pm</span>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                <div class="reply-btn"> <a class="btn"><i class="fa fa-reply"></i>Reply</a> </div>
            </div>
        </div>
        
    </div>
</div>
    
</div>
<div class="modal fade" id="add-message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Message</h4> </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                            <input type="text" class="form-control"  placeholder="essageM"> 
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Author Name">
                    </div>
                    
                     <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Location">
                    </div>
                     <div class="form-group">
                            <input type="text" class="form-control datepicker"  placeholder="Date">
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
       
</div>
<?php include 'footer.php';?>