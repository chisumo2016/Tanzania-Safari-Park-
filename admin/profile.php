<?php include_once '../dbo.class.php';
$db->chk_login();
$error = "";
if(isset($_POST['submit']))
{
    //update admin user detail
    $reg_user = "select count(id) as total from users where email='".$_POST['email']."' and id!='".$_SESSION['admin_id']."'";
    $alredy_exsit = $db->get($reg_user);
    if($alredy_exsit[0]['total']==0)
    {
        $pwd_cond = "";
        if($_POST['password']!='')
        {
            $pwd_cond = ",password='".md5($_POST['password'])."'";
        }
         $update = "update users set name='".$_POST['name']."', email='".$_POST['email']."' ".$pwd_cond." where id='".$_SESSION['admin_id']."'";
         $db->dml($update);
         $_SESSION['username']=$_POST['username'];
    }
 else { //if user alredy exist then throw error
   $error = "User alredy exist, enter valid email"; 
    }
}
    //get admin user detail
    $user = $db->get("select * from users where id='".$_SESSION['admin_id']."'");
    $data = $user[0];
    extract($user[0]);
    if(empty($data))
    {
        header("location: index.php");exit; 
    }
?>﻿<html lang="en">
    <head>
        <title><?= $site_name; ?> - My account</title>
         <!----include style and js from header------->
        <?php include_once './head.inc.php'; ?>
        <!----end header------->
    </head>
    <body>
        <?php include_once './menu.inc.php'; ?>
        <div class="container">
            <hr>
            <div class="row">
                <div class="span12 well">
                    <h1>My account</h1>
                    <!---form start-->
                    <form method="post" name="register_form" action="" class="">
                       <h4 class="error"> <?php echo $error.'<br>';unset($error); ?></h4>
                        <input type="text" id="name" name="name" value="<?= $name; ?>" required="required" class="span4" placeholder="Name" />
                         <br>
                        <input type="email" class="span4" placeholder="Email" value="<?= $email ?>" required="required" name="email" id="email" />
                        <br>
                        <input type="text" id="username" name="username" value="<?= $username ?>" required="required" class="span4" placeholder="Username" />
                         <br>
                        <input type="password" class="span4" placeholder="Password" name="password" id="password"/>				               
                        <span class="help-block">Do not edit password if not want to change</span>
                        <br>
                        <button type="submit" name="submit" class="btn">Save</button>
                    </form>
                    <!--end form-->
                </div>
            </div>
                 <!----Footer------->
            <?php include_once '../include/footer.inc.php'; ?>
            <!----End Footer------->
        </div>
    </body>
</html>