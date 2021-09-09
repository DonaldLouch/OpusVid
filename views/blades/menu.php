<div id="blurryHeader"></div>
<header>
    <a href="../" title="<?php echo $websiteName; ?> Title Logo" id="siteLogo">
        <?php echo file_get_contents($baseFileURL."/ui/titleLogo.svg"); ?>
    </a>
    <?php include 'search_form.php'; ?>
    <nav id="links" class="links">
        <?php 
          if(substr_count($_SERVER["REQUEST_URI"] , "/") == 1 && !isset($_SESSION['uLevel'])) {
              $menuClass = new Menu;
              echo $menuClass->menuLevel1NoLogin();
          } 
          
          if(substr_count($_SERVER["REQUEST_URI"] , "/") == 1 && isset($_SESSION['uLevel'])) {
              $menuClass = new Menu;
              echo $menuClass->menuLevel1Login();
          } 
  
          if(substr_count($_SERVER["REQUEST_URI"] , "/") == 2 && !isset($_SESSION['uLevel'])) {
              $menuClass = new Menu;
              echo $menuClass->menuLevel2NoLogin();
          } 
  
          if(substr_count($_SERVER["REQUEST_URI"] , "/") == 2 && isset($_SESSION['uLevel'])) {
              $menuClass = new Menu;
              echo $menuClass->menuLevel2Login();
          } 
        ?>
    </nav>
</header>