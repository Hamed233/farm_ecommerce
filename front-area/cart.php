<?php
    ob_start();
    session_start();
    $pageTitle = 'ZEED Store Shopping Cart';
    include "init.php";

    if (isset($_SESSION['Usermail'])) { ?>



  <?php } else { ?>

     <div class="cart-empty-section text-center">
        <h2>سلة التسوق الخاصة بك فارغة. </h2>
        <p>يخضع سعر وتوافر العناصر في ZAID للتغيير. تعد السلة مكانًا مؤقتًا لتخزين قائمة بالعناصر الخاصة بك وتعكس أحدث سعر لكل عنصر. سلة التسوق </p>
        <hr >

        <p>Login Now and add product in your basket</p>
        <div class="btn btn-success"><a href="login.php" target="_blank">Login</a></div>
     </div><!-- end cart-empty-section -->

  <?php }
?>




<?php
    /* Footer */
    include $tpl . 'footer.php';
    ob_end_flush();
?>
