<?php global $s0,$s1,$s2,$s3,$s4,$s5; ?>
<div class="page-sidebar">
    <ul class="x-navigation">
        <li class="xn-profile">
            <div class="profile">
                <div class="profile-image">
                    <img src="images/user.jpg" class="img-responsive"/>
                </div>
                <div class="profile-data">
                    <h6>MOODUSER</h6>
                </div>
            </div>       
        </li>
        <li class="xn-title"></li>
      <?php /* <li <?= $s0?$s0:''; ?>><a href="companies.php"><span class="fa fa-bank"></span> <span class="xn-text">Companies</span></a> </li>
 */ ?>
        <li <?= $s1?$s1:''; ?>><a href="projects.php"><span class="fa fa-inbox"></span> <span class="xn-text">projects</span></a> </li>
         <li <?= $s2?$s2:''; ?>><a href="tasks.php"><span class="fa fa-tasks"></span> <span class="xn-text">tasks</span></a> </li>
         <li <?= $s3?$s3:''; ?>><a href="message.php"><span class="fa fa-comments"></span> <span class="xn-text">messages</span></a> </li>
         <li <?= $s4?$s4:''; ?>><a href="#"><span class="fa fa-users"></span> <span class="xn-text">users</span></a> </li>
         <li <?= $s5?$s5:''; ?>><a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">roles</span></a> </li>
    </ul>
</div>