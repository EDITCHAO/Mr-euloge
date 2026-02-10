<?php
// Afficher les erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr-euloge</title>

    <!--LOGO dans l'ongle du navigateur -->
    <link rel="icon" type="image/png" href="logo.jpeg"/>
    <!-- ===== CSS FILES ===== -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/skins/color-1.css">
    <link rel="stylesheet" href="css/admin-button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Style Switcher -->
     <link rel="stylesheet" href="css/skins/color-1.css" class="alternate-style" title="color-1" disabled>
     <link rel="stylesheet" href="css/skins/color-2.css" class="alternate-style" title="color-2" disabled>
     <link rel="stylesheet" href="css/skins/color-3.css" class="alternate-style" title="color-3" disabled>
     <link rel="stylesheet" href="css/skins/color-4.css" class="alternate-style" title="color-4" disabled>
     <link rel="stylesheet" href="css/skins/color-5.css" class="alternate-style" title="color-5" disabled>
     <link rel="stylesheet" href="css/style-switcher.css">
</head>
<body>
  <!-- ===== Main container Start ===== -->
    <div class="main-container">
      <!-- ===== Aside start ===== -->
        <div class="aside">
          <div class="logo">
            <a href="#"><span>Mr</span>EULOGE</a>
          </div>
          <div class="nav-toggler"> 
            <span></span>
          </div>
          <ul class="nav">
            <li><a href="#home" class="active"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#about"><i class="fa fa-user"></i>About</a></li>
            <li><a href="#service"><i class="fa fa-list"></i>Service</a></li>
            <li><a href="#portfolio"><i class="fa fa-briefcase"></i>Portfolio</a></li>
            <li><a href="#contact"><i class="fa fa-comments"></i>Contact</a></li>
            <li><a href="backend/admin/login.php"><i class="fa fa-lock"></i>Admin</a></li>
          </ul>
        </div>
      <!-- ===== Aside end ===== --> 
      <!-- ===== Main content start ===== -->
        <div class="main-content">
             <!-- Inclusion des sections -->
             <?php include 'frontend/home.php'; ?>
             <?php include 'frontend/about.php'; ?>
             <?php include 'frontend/service.php'; ?>
             <?php include 'frontend/portfolio.php'; ?>
             <?php include 'frontend/contact.php'; ?>

        </div>
        <!-- ===== Main content end ===== -->
    </div>
     <!-- ===== Main container end ===== --> 
     <!-- ===== Style Switcher Start--> 
     <div class="style-switcher">
      <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
      </div>
      <div class="day-night s-icon">
        <i class="fas fa-moon"></i>
      </div>
      <h4>theme colors</h4>
      <div class="colors">
        <span class="color-1" onclick="setActiveStyle('color-1')"></span>
        <span class="color-2" onclick="setActiveStyle('color-2')"></span>
        <span class="color-3" onclick="setActiveStyle('color-3')"></span>
        <span class="color-4" onclick="setActiveStyle('color-4')"></span>
        <span class="color-5" onclick="setActiveStyle('color-5')"></span>
      </div>
    </div>
     <!-- ===== Style Switcher End-->
     <!-- ===== JS Files ===== -->
     <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
     <script src="js/script.js"></script>
     <script src="js/style-switcher.js"></script>
</body>
</html>
