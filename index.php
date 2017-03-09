<?php
include_once 'dbo.class.php';
$data = $db->get("select * from page where id=1");
?>
<html lang="en">
    <head>
        <title><?= $site_name; ?> - <?= $home; ?></title>
 <!----include style and js from header------->
        <?php include_once './include/head.inc.php'; ?>
        <!----end header------->
    </head>
    <body>
<!----include menu and logo------->
        <?php include_once './include/menu.inc.php'; ?>
        <!----End menu------->
<div class="container">
  <!--Start Carousel-->
  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
      <div class="item active"> <img src="img/featured/1.jpg" alt="">
        <div class="carousel-caption">
          <h4>Tanzania Safari Park</h4>
          <p> Tanzania ni Nchi nzuri sana kwa wageni na watalii kutoka nchi mbali mbali duniani</p>
        </div>
      </div>
      <div class="item"> <img src="img/featured/2.jpg" alt="">
        <div class="carousel-caption">
          <h4>Enjoy the beuty of africa</h4>
          <p> Welcome To Tanzania</p>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="img/arrow.png" alt=""></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="img/arrow2.png" alt=""></a> </div>
  <!--End Carousel-->
  <hr>
            <!--content----->
            <div class="row">
                 <div class="span12 well">
                <h1><?php echo $data[0]['name']; ?></h1>
            <?php echo $data[0]['content']; ?>
                 </div>
            </div>
            <!--end content----->
            <!----Footer------->
            <?php include_once './include/footer.inc.php'; ?>
            <!----End Footer------->
        </div>
    </body>
    <script>
        //apply slider script here
        $('.carousel').carousel({
          interval: 5000
        })
</script>
</html>
