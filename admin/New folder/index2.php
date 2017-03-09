<?php include("../dbo.class.php");
$error = "";
if(isset($_POST['submit']))
{
    //check admin user data
    $chk_login = "select * from users where email='".$_POST['email']."' and password='".md5($_POST['password'])."' and is_admin=1";
    $user = $db->get($chk_login);  
    if(!empty($user)){ 
        $_SESSION['admin_id'] = $user[0]['id'];
        $_SESSION['admin_user'] = $user[0]['username'];
        header("location: dashboard.php");exit; }
    else{ //if user not valid then throw error
        $error = "Enter valid email and password"; }
}
		setcookie("admin_user_id", $user[0]['id'], time()+(60*60*24*30));
		setcookie("admin_user_name", $user[0]['username'], time()+(60*60*24*30));
?>
<html lang="en">
    <head>
        <title><?= $site_name; ?> - <?= $login; ?></title>
        <!--head file---->
        <?php include_once './head.inc.php'; ?>
        <!--end head file---->
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"><span class="color-highlight"><?= $site_name; ?></span></a>
    </div>
  </div>
</div>
        <div class="container">
            <hr>
            <div class="row">
                <div class="span12 well">
                    <h1>Admin <?= $login; ?></h1>
                    <!--login form ---->
                    <form method="post" name="register_form" action="" class="">
                       <h4 class="error"> <?php echo $error.'<br>';unset($error); ?></h4>
                                <input type="email" class="span4" placeholder="Email" value="<?= $data['email']; ?>" required="required" name="email" id="email" />
                                <br>
                                <input type="password" class="span4" placeholder="Password" name="password" required="required" id="password"/>				               
                                <br>
                                 <button type="submit" name="submit" class="btn">Login</button>
                    </form>
                    <!---end form----->
                </div>
            </div>
            <!--footer file--->
            <?php include_once './include/footer.inc.php'; ?>
            <!---end footer------>
        </div>
    </body>
</html>