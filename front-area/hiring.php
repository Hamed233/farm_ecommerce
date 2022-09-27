<?php

/*
===============================
   Shopping Page
===============================
*/

 ob_start(); // OutPut Buffering Start

  session_start();

  $pageTitle = 'ZEED Agricultural Store - Shopping';

        include 'init.php';

?>

<div class="container">
  <div class="row">
    <div class="col-12">
       <div class="hiring-content">
          <h2 class="text-center">Hiring Tools</h2>
          <?php $productsHire = getAllFrom("*", "products", "WHERE hiring = 1", "", "product_ID");
          foreach ($productsHire as $hire) { ?>
            <div class="col-sm-12 col-md-3 col-lg-3">
               <div class="product-hire">
                   <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $hire['Image'] ?>" alt="Image" >
                   <div class="more-info">
                     <p class="product-name"><a href="#"><?php echo $product['Name'] ?></a></p>
                   </div><!-- #more-info -->
               </div>
            </div>
    <?php } ?>

       </div>
    </div>
  </div>
</div>

<?php
  include $tpl . 'footer.php';
  ob_end_flush();
?>
