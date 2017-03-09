<?php $url = pathinfo($_SERVER['REQUEST_URI'],PATHINFO_FILENAME); 
$id="";
if(isset($_GET['id'])){$id=$_GET['id'];}?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"><span class="color-highlight"><?= $site_name; ?></span></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
            <li <?php echo ($url=='dashboard')?'class="active"':''; ?>><a href="dashboard.php" >Booking</a></li>
            <li <?php echo ($id=='1')?'class="active"':''; ?>><a href="page.php?id=1" >Home</a></li>
            <li <?php echo ($id=='2')?'class="active"':''; ?>><a href="page.php?id=2" >About</a></li>
            <li <?php echo ($id=='3')?'class="active"':''; ?>><a href="page.php?id=3" >Contact</a></li>
            <li <?php echo ($id=='4')?'class="active"':''; ?>><a href="page.php?id=4" >Gallery</a></li>
            <li <?php echo ($url=='users')?'class="active"':''; ?>><a href="users.php" >Users</a></li> 
            <li <?php echo ($url=='profile')?'class="active"':''; ?>><a href="profile.php" >Profile</a></li> 
            <li <?php echo ($url=='logout')?'class="active"':''; ?>><a href="logout.php" >Logout</a></li> 
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </div>
</div>