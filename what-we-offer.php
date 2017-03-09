<?php
include_once 'dbo.class.php';
//fetch about page data
$data = $db->get("select * from page where id=4");
?>
<html lang="en">
    <head>
        <title><?= $site_name; ?> - <?= $gallery; ?></title>
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
            <!---Content--->
            <div class="row">
                <div class="span12 well">
                <h1><?php echo $data[0]['name']; ?></h1>
                <?php echo $data[0]['content']; ?>
                </div>
            </div>
            <!---end Content--->
            <!----Footer------->
            <?php include_once './include/footer.inc.php'; ?>
            <!----End Footer------->
        </div>
    </body>
</html>
