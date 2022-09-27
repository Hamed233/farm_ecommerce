<?php

/*
===============================
   pharmacy Page
===============================
*/

 ob_start(); // OutPut Buffering Start

  session_start();

  $pageTitle = 'ZEED Agricultural Store - pharmacy';


        include 'init.php';

        $pharmacy = isset($_GET['pharmacy']) ? $_GET['pharmacy'] : 'pharmacy';

        if ($pharmacy == 'pharmacy') { ?>

          <div class="container">
            <div class="row">
               <div class="d-sm-none d-md-block col-md-3 col-lg-3">
                 <div class="categories-section">
                   <div class="cate-title">
                      categories
                   </div>
                   <div class="categories-list-box">
                     <?php
                       $catNames = getAllFrom("*", "categories", "", "", "Cat_ID");

                       if (!empty($catNames)) {
                         foreach ($catNames as $cat_name) { ?>
                            <dl>
                              <dt class="cate-name">
                                <img class="cate-brand" src="<?php echo '../admin-area/upload/categories/categories_brand/' . $cat_name['cate_img_brand'] ?>" />
                                <span><a href="categories.php?cat=<?php echo $cat_name['Cat_Name']; ?>"><?php echo $cat_name['Cat_Name']; ?> </a></span>
                              <dt>
                            </dl>
                      <?php }
                    } else {
                      echo "No Found Any Categories";
                    }
                    ?>
                   </div>
                 </div>
               </div>
               <?php
                 $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = ? AND Approve = 1 ORDER BY product_ID ASC");
                 $stmt->execute(array($cat));
                 $products = $stmt->fetchAll();
               ?>
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                  <div class="category-content text-right">
                    <h2 class="category-name"><?php echo $cat ?></h2>
                    <img src="<?php echo $img; ?>core-img/decor.png" alt="">
                     <div class="row">
                       <?php

                         foreach ($products as $product) { ?>
                           <div class="col-sm-4 col-md-3 col-lg-3">
                             <div class="product-info">
                               <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $product['Image'] ?>" alt="Image" >
                               <div class="more-info">
                                 <p class="product-name"><a href="#"><?php echo $product['Name'] ?></a></p>
                                 <span class="product-price">$<?php echo $product['Price'] ?></span>
                               </div><!-- #more-info -->
                            </div><!-- ##product-info -->
                           </div>
                     <?php  }
                       ?>
                  </div><!-- #category-content -->
               </div>
            </div>
          </div>
        </div>


  <?php      } elseif ($pharmacy == 'agricultural') { ?>

          <div class="container">
            <div class="row">
               <div class="d-sm-none d-md-block col-md-3 col-lg-3">
                 <div class="categories-section">
                   <div class="cate-title">
                      categories
                   </div>
                   <div class="categories-list-box">
                     <?php
                       $catNames = getAllFrom("*", "categories", "", "", "Cat_ID");

                       if (!empty($catNames)) {
                         foreach ($catNames as $cat_name) { ?>
                            <dl>
                              <dt class="cate-name">
                                <img class="cate-brand" src="<?php echo '../admin-area/upload/categories/categories_brand/' . $cat_name['cate_img_brand'] ?>" />
                                <span><a href="categories.php?cat=<?php echo $cat_name['Cat_Name']; ?>"><?php echo $cat_name['Cat_Name']; ?> </a></span>
                              <dt>
                            </dl>
                      <?php }
                    } else {
                      echo "No Found Any Categories";
                    }
                    ?>
                   </div>
                 </div>
               </div>
               <?php
                 $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = ? AND Approve = 1 ORDER BY product_ID ASC");
                 $stmt->execute(array($cat));
                 $products = $stmt->fetchAll();
               ?>
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                  <div class="category-content text-right">
                    <h2 class="category-name"><?php echo $cat ?></h2>
                    <img src="<?php echo $img; ?>core-img/decor.png" alt="">
                     <div class="row">
                       <?php

                         foreach ($products as $product) { ?>
                           <div class="col-sm-4 col-md-3 col-lg-3">
                             <div class="product-info">
                               <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $product['Image'] ?>" alt="Image" >
                               <div class="more-info">
                                 <p class="product-name"><a href="#"><?php echo $product['Name'] ?></a></p>
                                 <span class="product-price">$<?php echo $product['Price'] ?></span>
                               </div><!-- #more-info -->
                            </div><!-- ##product-info -->
                           </div>
                     <?php  }
                       ?>
                  </div><!-- #category-content -->
               </div>
            </div>
          </div>
        </div>


  <?php  } elseif ($pharmacy == 'veterinary') { ?>

          <div class="container">
            <div class="row">
               <div class="d-sm-none d-md-block col-md-3 col-lg-3">
                 <div class="categories-section">
                   <div class="cate-title">
                      categories
                   </div>
                   <div class="categories-list-box">
                     <?php
                       $catNames = getAllFrom("*", "categories", "", "", "Cat_ID");

                       if (!empty($catNames)) {
                         foreach ($catNames as $cat_name) { ?>
                            <dl>
                              <dt class="cate-name">
                                <img class="cate-brand" src="<?php echo '../admin-area/upload/categories/categories_brand/' . $cat_name['cate_img_brand'] ?>" />
                                <span><a href="categories.php?cat=<?php echo $cat_name['Cat_Name']; ?>"><?php echo $cat_name['Cat_Name']; ?> </a></span>
                              <dt>
                            </dl>
                      <?php }
                    } else {
                      echo "No Found Any Categories";
                    }
                    ?>
                   </div>
                 </div>
               </div>
               <?php
                 $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = ? AND Approve = 1 ORDER BY product_ID ASC");
                 $stmt->execute(array($cat));
                 $products = $stmt->fetchAll();
               ?>
               <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                  <div class="category-content text-right">
                    <h2 class="category-name"><?php echo $cat ?></h2>
                    <img src="<?php echo $img; ?>core-img/decor.png" alt="">
                     <div class="row">
                       <?php

                         foreach ($products as $product) { ?>
                           <div class="col-sm-4 col-md-3 col-lg-3">
                             <div class="product-info">
                               <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $product['Image'] ?>" alt="Image" >
                               <div class="more-info">
                                 <p class="product-name"><a href="#"><?php echo $product['Name'] ?></a></p>
                                 <span class="product-price">$<?php echo $product['Price'] ?></span>
                               </div><!-- #more-info -->
                            </div><!-- ##product-info -->
                           </div>
                     <?php  }
                       ?>
                  </div><!-- #category-content -->
               </div>
            </div>
          </div>
        </div>


  <?php      } elseif ($pharmacy == 'Consult-doctor') {

    } else {

        echo "Not Found AnyThing";
        header('Location: index.php');
        exit();
    }

  include $tpl . 'footer.php';
  ob_end_flush();
?>
