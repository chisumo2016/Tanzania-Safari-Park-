<?php
include_once '../dbo.class.php';
$db->chk_login();
$error = "";
if (isset($_POST['submit'])) {
    $data = extract($_POST);
    //check same email user alredy register or not
    $reg_user = "select count(id) as total from users where email='" . $_POST['email'] . "'";
    $alredy_exsit = $db->get($reg_user);
    if ($alredy_exsit[0]['total'] == 0) {
        //insert user data to user table, unset post data and redirect to login page
        $insert = "insert into users(name,email,username,password,date) values('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['username'] . "','" . md5($_POST['password']) . "','" . date('y-m-d h:i:s') . "')";
        $db->dml($insert);
        unset($_POST);
        header("location: users.php");
        exit;
    } else {
        //if same email user alredy exist then throw error
        $error = "User alredy exist, enter valid email";
    }
    unset($_POST);
}
?>
<html lang="en">
    <head>
        <title><?= $site_name; ?> - Add user</title>
        <!----include style and js from header------->
        <?php include_once './head.inc.php'; ?>
        <!----end header------->
    </head>
    <body>
        <!----include menu and logo------->
        <?php include_once './menu.inc.php'; ?>
        <!----End menu------->
        <div class="container">
            <hr>
            <div class="row">
                <div class="span12 well">
                    <h1>Add user</h1>
                    <!----User registration form------->
                    <form method="post" name="register_form" action="" class="">
                       <h4 class="error"> <?php echo $error.'<br>';unset($error); ?></h4>
                                <input type="text" id="name" name="name" value="<?= $name; ?>" required="required" class="span4" onkeypress="return onlyAlphabets(event,this);" placeholder="Name" />
                                 <br>
                                <input type="email" class="span4" placeholder="Email" value="<?= $email ?>" required="required" name="email" id="email" />
                                <br>
                                <input type="text" id="username" name="username" value="<?= $username ?>" required="required" class="span4" placeholder="Username" />
                                 <br>
                                <input type="password" class="span4" placeholder="Password" name="password" required="required" id="password"/>				               
                                 <br>                                 
                                 <button type="submit" name="submit" class="btn">Register</button>
                    </form>
                    <!----End User registration form------->
                </div>
            </div>
            <!----Footer------->
            <?php include_once './include/footer.inc.php'; ?>
            <!----End Footer------->
        </div>
    </body>
</html>
<script language="Javascript" type="text/javascript">
//this functin allow only alphabates, tab, delete keys
 function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode==9 || charCode==0 || charCode==46 || charCode==36 || charCode==35 || charCode==8 || charCode==37 || charCode==38 || charCode==39 || charCode==40 || charCode==32 || charCode==16 || charCode==13)
                    return true;
                else
                    return false;
            }
            catch (err) {
               // alert(err.Description);
            }
        }
    </script>