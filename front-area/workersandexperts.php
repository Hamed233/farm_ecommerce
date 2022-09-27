<?php

/*
===============================
   workers and experts Page
===============================
*/

 ob_start(); // OutPut Buffering Start

  session_start();

  $pageTitle = 'ZEED Agricultural Store - Workers & Experts';

        include 'init.php';

        $request = isset($_GET['request']) ? $_GET['request'] : 'workersandexperts';

        if ($request == 'workersandexperts') {


        } elseif ($request == 'agricultural-specialist') {


        } elseif ($request == 'worker') {


        } elseif ($request == 'agricultural-guidance') {


        } else {

            echo "Not Found AnyThing";
            header('Location: index.php');
            exit();
        }

      include $tpl . 'footer.php';
      ob_end_flush();
    ?>
