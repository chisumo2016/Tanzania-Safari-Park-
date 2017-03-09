<?php
include_once '../dbo.class.php';
$db->chk_login();
$error = "";
$lbll1 = "Add User";
$lbl2 = "Register";
if (isset($_POST['submit'])) {
    $data = extract($_POST);
    if(isset($_POST['action']) && $_POST['action']=='E')
    {
        //check same email user alredy register or not
        $reg_user = "select count(id) as total from users where email='" . $_POST['email'] . "' and id!='".$_GET['id']."'";
        $alredy_exsit = $db->get($reg_user);
        if ($alredy_exsit[0]['total'] == 0) {
            $pwd_cond = "";
            if($_POST['password']!='')
            {
                $pwd_cond = ",password='".md5($_POST['password'])."'";
            }
             $update = "update users set name='".$_POST['name']."', email='".$_POST['email']."', username='".$_POST['username']."' ".$pwd_cond." where id='".$_GET['id']."'";
             $db->dml($update);
            unset($_POST);
            header("location: users.php");
        } else {
            //if same email user alredy exist then throw error
            $error = "User alredy exist, enter valid email";
        }
    }
    else
    {
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
    }
    
    unset($_POST);
}

//if id set then get user booking data
if(isset($_GET['id']) && $_GET['id']!='')
{
    $data = $db->get("select * from users where id='".$_GET['id']."' and is_admin!=1");
    if(empty($data[0]))
    {
       $error = "This is not valid user.";
    }
    else{ 
        $lbll1 = "Update User";
        $lbl2 = "Save";
        extract($data[0]);}
}

//if delete id set then delete user booking data
if(isset($_GET['del']) && $_GET['del']!='')
{
    $db->dml("delete from users where id='".$_GET['del']."'");
    header("location: users.php");
}

//get user old boooking data 
$users= $db->get("select * from users where is_admin!=1 order by id desc");
?>
<html lang="en">
    <head>
        <title><?= $site_name; ?> - Add user</title>
        <!----include style and js from header------->
        <?php include_once './head.inc.php'; ?>
         <link href="../css/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
          <script src="../css/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            //apply data table to table
            $(document).ready(function () {
                 $('#example').DataTable( {
                        responsive: true
                    } );
            });
        </script>
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
                    <h1><?php echo $lbll1; ?></h1>
                     <!----User registration form------->
                    <form method="post" name="register_form" action="" class="">
                        <?php if(isset($_GET['id']) && $_GET['id']!='') { ?>
                            <input type="hidden" name="action" value="E">
                        <?php } ?>
                        
                       <h4 class="error"> <?php echo $error.'<br>';unset($error); ?></h4>
                                <input type="text" id="name" name="name" value="<?= $name; ?>" required="required" class="span4" onkeypress="return onlyAlphabets(event,this);" placeholder="Name" />
                                 <br>
                                <input type="email" class="span4" placeholder="Email" value="<?= $email ?>" required="required" name="email" id="email" />
                                <br>
                                <input type="text" id="username" name="username" value="<?= $username ?>" required="required" class="span4" placeholder="Username" />
                                 <br>
                                 <input type="password" class="span4" placeholder="Password" <?php if(!isset($_GET['id'])) { ?> required="required" <?php } ?> name="password" id="password"/>				               
                                <span class="help-block">Do not edit password if not want to change</span>
                                <br>                                 
                                 <button type="submit" name="submit" class="btn"><?php echo $lbl2; ?></button>
                    </form>
                    <!----End User registration form------->
                </div>
            </div>
           
              <div class="row">
                <div class="span12 well">
                    <h1>User List</h1><br>
                    <!----Booking history tabel---->
                     <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($users)): ?>
                                <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td align="center"><a class="btn" href="users.php?id=<?= $user['id']; ?>">Edit</a>
                                    <a class="btn" href="users.php?del=<?= $user['id']; ?>">Delete</a>
                                </td>
                            </tr>
                             <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
              <!----Footer------->
            <?php include_once '../include/footer.inc.php'; ?>
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