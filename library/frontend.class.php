<?php
@session_start();
error_reporting(E_WARNING & E_ERROR & ~E_NOTICE );
require_once('database.php');
require_once('config.php');
$front=new frontend;
$math = new EvalMath;
$front->saveData();
class frontend{
    public function frontend()
    {
        $this->db = database::get_instance();
    }
    public function isLoggedin()
    {
        @session_start();
        if(isset($_SESSION['user'])||$this->cookieLogin())
        {
            if(basename($_SERVER['PHP_SELF'])=='login.php'||basename($_SERVER['PHP_SELF'])=='forgotpassword.php'){
                header('location:index.php');
                exit;
            }
            return true;
        }
        else
        {
            if(basename($_SERVER['PHP_SELF'])!='login.php'&&basename($_SERVER['PHP_SELF'])!='forgotpassword.php'&&basename($_SERVER['PHP_SELF'])!='index.php'&&basename($_SERVER['PHP_SELF'])!='quote.php'&&basename($_SERVER['PHP_SELF'])!='policy-details.php'&&basename($_SERVER['PHP_SELF'])!='about-us.php'&&basename($_SERVER['PHP_SELF'])!='contact_us.php'&&basename($_SERVER['PHP_SELF'])!='privacy-policy.php'&&basename($_SERVER['PHP_SELF'])!='terms-and-conditons.php'&&basename($_SERVER['PHP_SELF'])!='order-details.php'){
                header('location:index.php#Login');
                exit;
            }
            return false;
        }
    }
    public function valid_email($str)
    {
        return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    public function login($username, $password, $remember = false, $encrypt_password = true)
    {
        $db = $this->db;
        $username=$db->format_string($username);
        $password=$db->format_string($password);
        if (!$username || !$password) {
            echo "Enter Username and Password";
            exit;
            return false;
        }
        if ($encrypt_password)
            $password = md5($password);
        if (!$db) {
            echo "Connection to the database failed";
            exit;
        }
        $query = "SELECT *
				  FROM users
				  WHERE email = '".$username."'
				  AND password = '".$password."' AND status='1' AND type=4
				  ";
        $result = $db->query($query);
        $result_row=$db->fetch($result);
        $ID=$result_row['ID'];
        if (mysqli_num_rows($result) == 0) {
            echo "Invalid Username or Password";
            return false;
        }
        $now=date('Y-m-d H:i:s');
        $_SESSION['logged'] = $result_row['loggedin'];
        $result=$db->query("update users set loggedin='$now' where email='$username'");
        if (!isset($_SESSION))
            @session_start();
        $_SESSION['user'] = $ID;
        $_SESSION['name'] =$result_row['firstname'];
        $_SESSION['email'] =$result_row['email'];
        if ($remember) {
            $expire_time = time() + 30000;
            setcookie('adminuser', $username, $expire_time);
            setcookie('password', md5($password), $expire_time);
            setcookie('expire_time', $expire_time, $expire_time);
        } else {
            setcookie('adminuser', false);
            setcookie('password', false);
            setcookie('expire_time', false);
        }
        echo 'success';
        exit;
    }
    public function register($postdata)
    {
        if(!empty($postdata['name'])&&!empty($postdata['email'])&&!empty($postdata['password'])){
            $registerval['firstname']=$postdata['name'];
            $registerval['email']=$postdata['email'];
            $registerval['username']=$postdata['email'];
            $registerval['type']=4;
            $registerval['status']=1;
            $registerval['created']=date('Y-m-d');
            $registerval['key']=md5($registerval['email'] + microtime());
            $registerval['password']=md5($postdata['password']);
            if($postdata['password']!=$postdata['cpassword'])
            {
                echo "Confirm password is wrong";
                exit;
            }
            if($this->valid_email($registerval['email'])==TRUE){
                $reguser=$this->db->get_fields_value('users', "email='".$registerval['email']."'");
                if(!$reguser){
                    $uid=$this->db->dbinsert('users',$registerval);
                    $userdetails['user']=$uid;
                    $userdetails['name']=$postdata['name'];
                    $uid=$this->db->dbinsert('user_details',$userdetails);
                    $_SESSION['user']=$uid;
                    $_SESSION['name'] =$postdata['name'];
                    $_SESSION['email']=$registerval['email'];
                    $_SESSION['user_type']=4;
                    $lstlogin['loggedin']=date('Y-m-d H:i:s');
                    $this->db->dbupdate('users',$lstlogin,'id',$uid);
                    $subject='SaveKubwa –  Welcome to the family';
                    $messagein='<div style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold; color:#6a747c"> 
Welcome to the SAVEKUBWA family, where we believe in transparency and BIG savings!!<br><br>
Your username is:  '.$registerval['email'].'<br><br>
You can access your account by clicking Retrieve Quote or Sign In -> <span style="color:#e61d63">Your Account<span> from www.savekubwa.com.<br><br>
Once logged in you have access to:<br><br>
<span style="color:#e61d63">Saved Quotes</span> <span style="color:#44c8f1">– This is a list of past searches you have done. You can either run them again or edit the information. Handy and time saving feature</span><br><br>
<span style="color:#e61d63">Profile</span> <span style="color:#44c8f1">– Allows you to update data that you may not have had access to while running a search e.g. KRA Pin</span><br><br>
<span style="color:#e61d63">Change Password</span> <span style="color:#44c8f1">– Change your existing password to a new one.</span><br><br>
<span style="color:#e61d63">Order History</span> <span style="color:#44c8f1">– All your bought polices through SaveKubwa are stored here to refer to online or download and file.</span><br><br>
<span style="color:#e61d63">Documents</span> <span style="color:#44c8f1">– Allows you to upload your key documents to have them available in a central place keeping them accessible at all times.</span><br><br>
<span style="color:#e61d63">Notifications</span> <span style="color:#44c8f1">– Quick updates from the system or insurance company to keep you on top of things.</span><br><br>
SaveKubwa has been built with the user in mind so we would love to have your feedback through the website, positive or negative it’s all taken with a smile J<br><br>
<span style="color:#e61d63">Love</span> <span style="color:#44c8f1">from,</span><br><br>
<span style="color:#44c8f1">All at SaveKubwa.com</span>
		 	</div>';
                    $this->sentMail($registerval['email'],$subject,$postdata['name'],$messagein);
                    $this->sentMail('jambo@savekubwa.com',$subject,$postdata['name'],$messagein);
                    echo "success";
                    exit;
                }
                else{
                    echo "User with same email exists";
                    exit;
                }
            }
            else {
                echo 'Invalid Email Address';
                exit;
            }
        }
        else
        {
            echo 'Please enter all fields';
            exit;
        }
    }
   
    
}
?>