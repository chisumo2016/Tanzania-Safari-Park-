<?php $url = pathinfo($_SERVER['REQUEST_URI'],PATHINFO_FILENAME); ?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"><span class="color-highlight"><?= $site_name; ?></span></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
            <li <?php echo ($url=='index')?'class="active"':''; ?>><a href="index.php"  >Home</a></li>
            <li <?php echo ($url=='about')?'class="active"':''; ?>><a href="about.php" >About Us</a></li>
            <li <?php echo ($url=='contact')?'class="active"':''; ?>><a href="contact.php" >Contact</a></li>
            <li <?php echo ($url=='gallery')?'class="active"':''; ?>><a href="what-we-offer.php" >What We Offer</a></li>
            <?php if(isset($_SESSION['uid'])): ?>
            <li <?php echo ($url=='booking')?'class="active"':''; ?>><a href="booking.php" >Booking</a></li> 
            <li <?php echo ($url=='profile')?'class="active"':''; ?>><a href="profile.php" >Profile</a></li> 
            <li <?php echo ($url=='logout')?'class="active"':''; ?>><a href="logout.php" >Logout</a></li> 
            <?php else: ?>
            <li <?php echo ($url=='register')?'class="active"':''; ?>><a href="register.php" >Register</a></li>
            <li <?php echo ($url=='login')?'class="active"':''; ?>><a href="login.php" >Login</a></li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>