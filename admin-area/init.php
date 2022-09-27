<?php

 include 'database/connect-db.php';

  // pathes

 $tpl   = 'includes/templates/';    // Templates Directory
 $func  = 'includes/functions/';    // Function Directory
 $css   = 'layout/css/';            // Css Directory
 $js    = 'layout/js/';              // js Directory
 $libr  = 'includes/libraries/';    // Libraries Directory
 $img   = 'layout/images/';


  /*
   ---------Include The Important Files----------
  */

      // Include Functions Page
    include $func . 'function.php';
        // Include Header page
    include $tpl . 'header.php';


   // Include Navbar On All Pages Expect The With $noNavbar Variable
  if (!isset($noNavbar)) {

      include $tpl . 'navbar.php';
  }
