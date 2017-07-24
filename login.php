<?php include 'header.php';
if(isset($_POST['do_login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $login_user=$front->login($username,$password);
}

     $s0='class="active"';
?>
<div class="page-container">  

<?php include 'sidebar.php';?>
<div class="page-content">
    <?php include 'nav.php';?>
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-xs-6">
                <div class="wrapper">
                    <form method="post">
                        <fieldset>
                            <label>
                                <input type="text" name="username" placeholder="Username">
                            </label>
                        </fieldset>
                        <fieldset>
                            <label>
                                <input type="password" name="password" placeholder="Password">
                            </label>
                        </fieldset>
                        <fieldset>
                            <label>
                                <button type="submit" name="do_login">Login</button>
                            </label>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
       
</div>
<?php include 'footer.php';?>