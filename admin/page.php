<?php include_once '../dbo.class.php';
$db->chk_login();
if(isset($_POST['submit']))
{
    //update page content
    $update = "update page set content='".$_POST['content']."', name='".$_POST['name']."' where id='".$_GET['id']."'";
    $db->dml($update);
}

if(isset($_GET['id']))
{
    //get page detail
    $page = $db->get("select * from page where id='".$_GET['id']."'");
    $data = $page[0];
    if(empty($data))
    {
        header("location: dashboard.php");exit; 
    }
}
?>
<html lang="en">
    <head>
       <title><?php echo $site_name; ?> - <?php echo $home; ?></title>
         <!----include style and js from header------->
        <?php include_once './head.inc.php'; ?>
        <!----end header------->
         <script type="text/javascript" src="../css/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once './menu.inc.php'; ?>
        <div class="container">
            <hr>
              <div class="row">
                <div class="span12 well">
                    <h1><?php echo $data['name']; ?></h1><br>
                    <!--form start---->
                    <form method="post" name="page_form" action="" class=""> 
                        <input type="text" class="span4" placeholder="Page Title" required="required" name="name" id="name" value="<?= $data['name']; ?>" />
                        <br>
                        <textarea id="editor1" name="content"><?= $data['content']; ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'editor1' );
                        </script>
                        <br>
                        <button type="submit" name="submit" class="btn">Save</button>
                    </form>
                    <!---end form--->
                </div>
            </div>
              <!----Footer------->
            <?php include_once '../include/footer.inc.php'; ?>
            <!----End Footer------->
        </div>
    </body>
</html>