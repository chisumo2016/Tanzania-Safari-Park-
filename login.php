<?php include_once 'dbo.class.php';
$error = "";
if(isset($_POST['submit']))
{
    $data = extract($_POST);
    //fetch login user data if user exist        
    $reg_user = "select * from users where email='".$_POST['email']."' and password='".md5($_POST['password'])."' and is_admin=0";
    $user = $db->get($reg_user);
    if(!empty($user))
    {
        unset($_POST);
        $_SESSION['uid'] = $user[0]['id'];
        $_SESSION['username'] = $user[0]['username'];
		setcookie("user_id", $user[0]['id'], time()+(60*60*24*30));
		setcookie("user_name", $user[0]['username'], time()+(60*60*24*30));
		header("location: index.php");exit; 
    }
 else{
     //if wrong username and password then throw error
     $error = "Enter valid email and password"; }
 unset($_POST);
}
?>
<html lang="en">
    <head>
        <title><?= $site_name; ?> - <?= $login; ?></title>
        <!----include style and js from header------->
        <?php include_once './include/head.inc.php'; ?>
        <!----end header------->
    </head>
    <body>
          <!----include menu and logo------->
        <?php include_once './include/menu.inc.php'; ?>
        <!----End menu------->
        <div class="container">
            <hr>
            <div class="row">
                <div class="span12 well">
                    <h1><?= $login; ?></h1>
                    <!----User login form------->
                    <form method="post" name="login_form" action="" class="">
                       <h4 class="error"> <?php echo $error.'<br>';unset($error); ?></h4>
                                <input type="email" class="span4" placeholder="Email" value="<?= $data['email']; ?>" required="required" name="email" id="email" />
                                <br>
                                <input type="password" class="span4" placeholder="Password" name="password" required="required" id="password"/>				               
                                <br>
<!--                        <span class="help-block">Did you fill in all of the fields?</span>-->
                                 <button type="submit" name="submit" class="btn">Login</button>
                    </form>
                    <!----End login form------->
                </div>
            </div>
             <!----Footer------->
            <?php include_once './include/footer.inc.php'; ?>
            <!----End Footer------->
        </div>
    </body>
</html>
