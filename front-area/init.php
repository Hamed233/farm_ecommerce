<?php

      // Error Reporting
      ini_set('display_errors', 'On');
       error_reporting(E_ALL);

 include '../admin-area/database/connect-db.php'; // Include connect database

 $sessionUser = '';
  if (isset($_SESSION['Usermail'])) {
      $sessionUser = $_SESSION['Usermail'];
  }


   // pathes Directories

 $tpl   = 'includes/templates/';     // Template Directory
 $func  = 'includes/functions/';     // Function Directory
 $page  = 'includes/pages/';        // Pages Directory
 $libr  = 'includes/libraries/';    // Libraries Directory
 $css   = 'layout/css/';            // Css Directory
 $js    = 'layout/js/';             // js Directory
 $img   = 'layout/img/';            // img Directory




  /*
   ---------Include The Important Files----------
  */

      // Include Functions Page
    include $func . 'function.php';
        // Include Header page
    include $tpl . 'header.php';
