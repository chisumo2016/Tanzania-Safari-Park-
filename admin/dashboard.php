<?php include_once '../dbo.class.php';
$db->chk_login();
$error = "";
if(isset($_POST['submit']))
{
    $data = extract($_POST);
    //insert booking record if all field are filled corectly
    if($_POST['name']!='' && $_POST['number_people']!='' && $_POST['book_date']!='' && $_POST['depart_date']!='' && $_POST['arrival_date']!='')
    {
      if($_POST['action']=='E')
      {
          $insert = "update booking set name='".$_POST['name']."',number_people='".$_POST['number_people']."',book_date='".$_POST['book_date']."' "
                  . " ,depart_date= '".$_POST['depart_date']."', arrival_date='".$_POST['arrival_date']."' where id='".$_GET['id']."'";
      }
      $db->dml($insert);  
      header("location: dashboard.php");
    }
    else{
        //throw error if not filled all field
        $error = "Fill all field correctly."; }
}

//if id set then get user booking data
if(isset($_GET['id']) && $_GET['id']!='')
{
    $data = $db->get("select * from booking where id='".$_GET['id']."'");
    if(empty($data[0]))
    {
       $error = "This is not your booking detail.";
    }
    else{ extract($data[0]);}
}

//if delete id set then delete user booking data
if(isset($_GET['del']) && $_GET['del']!='')
{
    $data = $db->get("select count(id) as total from booking where id='".$_GET['del']."'");
    if($data[0]['total']==1)
    {
        $db->dml("delete from booking where id='".$_GET['del']."'");
    }
    header("location: dashboard.php");
}
//get user old boooking data 
$old_booking= $db->get("select b.*,u.username from booking b left join users u on b.user_id=u.id order by id desc");
?>
<html lang="en">
    <head>
       <title><?php echo $site_name; ?> - <?php echo $home; ?></title>
         <!----include style and js from header------->
        <?php include_once './head.inc.php'; ?>
        <!----end header------->
         <!----include page level script and css------->
       <link rel="stylesheet" media="all" type="text/css" href="../css/jquery-ui.css" />
	<link rel="stylesheet" media="all" type="text/css" href="../css/jquery-ui-timepicker-addon.min.css" />
        <link href="../css/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-sliderAccess.js"></script>
        <script src="../css/media/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            //apply data table to table
            $(document).ready(function () {
                 $('#example').DataTable( {
                        responsive: true
                    } );
            });
        </script>
        <!----end page level script------->
    </head>
    <body>
        <!----include menu and logo------->
        <?php include_once './menu.inc.php'; ?>
        <!----End menu------->
        <div class="container">
            <hr>
            <?php if(isset($_GET['id']) && $_GET['id']!='') {   ?>
            <div class="row">
                <div class="span12 well">
                    <h1><?= $booking; ?></h1>
                    <!----Booking form---->
                    <form method="post" name="register_form" action="" class="">
                       <h4 class="error"> <?php echo $error.'<br>';unset($error); ?></h4>
                       <input type="hidden" name="action" value="E">
                            <input type="text" id="name" name="name" required="required" value="<?= $name; ?>" class="span4" onkeypress="return onlyAlphabets(event,this);" placeholder="Full Name" />
                            <br>
                            <input type="text" class="span4" name="number_people" required="required" value="<?= $number_people; ?>" id="number_people" placeholder="Number of People"/>				               
                            <br>
                             <input type="text" class="span4" required="required" readonly="readonly" value="<?= $book_date ?>"name="book_date" id="book_date" placeholder="Booking Date" />
                           <br>
                             <input type="text" class="span4" required="required" readonly="readonly" value="<?= $depart_date; ?>" name="depart_date" id="depart_date" placeholder="Departure Date" />
                            <br>
                             <input type="text" class="span4" readonly="readonly" required="required" value="<?= $arrival_date; ?>" name="arrival_date" id="arrival_date" placeholder="Arrival Date" />
                           <br>
                            <button type="submit" name="submit" class="btn"><?php echo (isset($_GET['id']) && $_GET['id']!='')?'Save':'Book'; ?></button>
                    </form>
                    <!----end Booking form---->
                </div>
            </div>
            <?php  } ?>
              <div class="row">
                <div class="span12 well">
                    <h1>Booking List</h1><br>
                    <!----Booking history tabel---->
                     <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User</th>
                                <th>Number of people</th>
                                <th>Book date</th>
                                <th>Departure date</th>
                                <th>Arrival date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($old_booking)): ?>
                                <?php foreach($old_booking as $booking): ?>
                            <tr>
                                <td><?= $booking['name']; ?></td>
                                <td><?= $booking['username']; ?></td>
                                <td align="center"><?= $booking['number_people']; ?></td>
                                <td align="center"><?= $booking['book_date']; ?></td>
                                <td align="center"><?= $booking['depart_date']; ?></td>
                                <td align="center"><?= $booking['arrival_date']; ?></td>
                                <td align="center"><a class="btn" href="dashboard.php?id=<?= $booking['id']; ?>">Edit</a>
                                    <a class="btn" href="dashboard.php?del=<?= $booking['id']; ?>">Delete</a>
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
<script type="text/javascript">
//apply date time picker script to textbox
$('#arrival_date').datetimepicker({
	addSliderAccess: true,
	sliderAccessArgs: { touchonly: false }
});
$('#depart_date').datetimepicker({
	addSliderAccess: true,
	sliderAccessArgs: { touchonly: false }
});
$('#book_date').datetimepicker({
	addSliderAccess: true,
	sliderAccessArgs: { touchonly: false }
});

//enter only number in number of people
$("#number_people").keyup(function(){
    this.value = this.value.replace(/\D/g, '');
});

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