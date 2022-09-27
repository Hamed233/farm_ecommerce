<?php
ob_start();
    session_start();
    $pageTitle = 'ZEED Agricultural Store';
    include "init.php";
?>

  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="welcome-slides owl-carousel">

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url('<?php echo $img; ?>bg-img/1st.jpg');">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInDown" data-delay="200ms">الزراعة المائية.</h2>
                <p data-animation="fadeInDown" data-delay="400ms"> يتوفر لدينا اخصائيون زراعييون لتقديم الخدمات الزراعية اللازمة بطرق احترافية وتقنيات جديدة.</p
                <a href="#" class="btn famie-btn mt-4" data-animation="bounceInDown" data-delay="600ms">للتواصل مع اخصائي زعي اضغط هنا</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- ##### Hero Area End ##### -->

  <!-- Single Benefits Area -->
     <div class="benefites-area">
       <div class="container">
         <div class="row">
          <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="100ms">
              <img src="<?php echo $img; ?>core-img/digger.png" alt="">
              <h5>أفضل الخدمات</h5>
            </div>
          </div>

          <!-- Single Benefits Area -->
          <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="300ms">
              <img src="<?php echo $img; ?>core-img/windmill.png" alt="">
              <h5>خبرات زراعية</h5>
            </div>
          </div>
          <!-- Single Benefits Area -->
          <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="700ms">
              <img src="<?php echo $img; ?>core-img/tractor.png" alt="">
              <h5>المعدات الزراعية</h5>
            </div>
          </div>

          <!-- Single Benefits Area -->
          <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="900ms">
              <img src="<?php echo $img; ?>core-img/sunrise.png" alt="">
              <h5>الاكتفاء الذاتي</h5>
            </div>
          </div>

        </div>
      </div>
    </div>

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

                  foreach ($catNames as $cat_name) { ?>
                     <dl>
                       <dt class="cate-name">
                         <img class="cate-brand" src="<?php echo '../admin-area/upload/categories/categories_brand/' . $cat_name['cate_img_brand'] ?>" />
                         <span><a href="categories.php?cat=<?php echo $cat_name['Cat_Name']; ?>"><?php echo $cat_name['Cat_Name']; ?> </a></span>
                       <dt>
                     </dl>
               <?php } ?>
            </div>
          </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
          <!-- Slideshow container -->
          <div class="slideshow-container">

          <!-- Full-width images with number and caption text -->

          <?php
          $getAll = $con->prepare("SELECT * FROM products WHERE Approve = 1 ORDER BY product_ID");
          $getAll->execute();
          $getProducts = $getAll->fetchAll();

          foreach ($getProducts as $product) { ?>
           <div class="mySlides">
             <img class="product-img" src="<?php echo '../admin-area/upload/products/' . $product['Image'] ?>">
             <div class="text">Caption Text</div>
           </div>
          <?php } ?>

          <!-- Next and previous buttons -->
          <a class="prev-img" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next-img" onclick="plusSlides(1)">&#10095;</a>

                    <!-- The dots/circles -->
            <div class="align-center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
            </div>
          </div>
        </div>
      </div><!-- #row -->
    </div><!-- #container -->

  <!-- Start Homepage Content -->
    <div class="container text-right">
      <div class="content-page">
         <div class="latest-planets global-section">
           <h2 class="category-name">Latest Planets</h2>
           <img src="<?php echo $img; ?>core-img/decor.png" alt="">
            <div class="row">
              <?php

                $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = 'planting' AND Approve = 1 ORDER BY product_ID ASC LIMIT 12");
                $stmt->execute();
                $products = $stmt->fetchAll();

                foreach ($products as $product) { ?>
                  <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="product-info">
                      <span class="product-price">$ <?php echo $product['Price'] ?></span>
                      <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $product['Image'] ?>" alt="planets" >
                      <p class="product-name"><?php echo $product['Name'] ?></p>
                   </div><!-- ##product-info -->
                  </div>
            <?php  }
              ?>

            </div><!-- ##row -->
       </div><!-- ##latest-planets -->

       <div class="new-machines global-section">
         <h2 class="category-name"><a href="categories.php?cat=New-Machines">New Machines</a> </h2>
         <img src="<?php echo $img; ?>core-img/decor.png" alt="">
          <div class="row">
            <?php

              $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = 'planting' AND Approve = 1");
              $stmt->execute();
              $Machines = $stmt->fetchAll();

              foreach ($Machines as $Machine) { ?>

                 <div class="col-sm-4 col-md-4 col-lg-4">
                   <div class="product-info">
                     <span class="product-price">$ <?php echo $Machine['Price'] ?></span>
                     <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $product['Image'] ?>" alt="planets" >
                     <p class="product-name"><?php echo $Machine['Name'] ?> </p>
                  </div><!-- ##product-info -->
                 </div>

               <?php } ?>

          </div><!-- ##row -->
       </div><!-- ##new-machines -->

       <div class="planets global-section">
         <h2 class="category-name"><a href="categories.php?cat=planting">Planets</a></h2>
         <img src="<?php echo $img; ?>core-img/decor.png" alt="">
          <div class="row">
            <?php

              $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = 'planting' AND Approve = 1 ORDER BY product_ID ASC LIMIT 12");
              $stmt->execute();
              $machines = $stmt->fetchAll();

              foreach ($machines as $machine) { ?>
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="product-info">
                    <span class="product-price">$ <?php echo $machine['Price'] ?></span>
                    <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $machine['Image'] ?>" alt="planets" >
                    <p class="product-name"><?php echo $machine['Name'] ?> </p>
                 </div><!-- ##product-info -->
                </div>
            <?php } ?>
          </div><!-- ##row -->
       </div><!-- ##plantings -->

       <div class="farming-machines global-section">
         <h2 class="category-name"><a href="categories.php?cat=Farming-Machines">Farming Machines</a></h2>
         <img src="<?php echo $img; ?>core-img/decor.png" alt="">
          <div class="row">

            <?php

              $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = 'planting' AND Approve = 1 ORDER BY product_ID ASC LIMIT 12");
              $stmt->execute();
              $farMachines = $stmt->fetchAll();

              foreach ($farMachines as $farMachine) { ?>
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="product-info">
                    <span class="product-status"><?php echo $farMachine['Status'] ?></span>
                    <span class="product-price">$ <?php echo $farMachine['Price'] ?></span>
                    <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $farMachine['Image'] ?>" alt="planets" >
                    <p class="product-name"><?php echo $farMachine['Name'] ?> </p>
                 </div><!-- ##product-info -->
                </div>
            <?php } ?>

          </div><!-- ##row -->
       </div><!-- ##farming-machines -->

       <div class="animals-eats global-section">
         <h2 class="category-name"><a href="categories.php?cat=animal-eats">Animal Eats</a></h2>
         <img src="<?php echo $img; ?>core-img/decor.png" alt="">
          <div class="row">
            <?php

              $stmt = $con->prepare("SELECT * FROM products WHERE Cat_Name = 'planting' AND Approve = 1 ORDER BY product_ID ASC LIMIT 12");
              $stmt->execute();
              $animalesEats = $stmt->fetchAll();

              foreach ($animalesEats as $animalesEat) { ?>
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="product-info">
                    <span class="product-status"><?php echo $animalesEat['Status'] ?></span>
                    <span class="product-price">$ <?php echo $animalesEat['Price'] ?></span>
                    <img class="img-product" src="<?php echo '../admin-area/upload/products/' . $animalesEat['Image'] ?>" alt="planets" >
                    <p class="product-name"><?php echo $animalesEat['Name'] ?> </p>
                 </div><!-- ##product-info -->
                </div>
            <?php } ?>
          </div><!-- ##row -->
       </div><!-- ##animals-eats -->
     </div><!-- ##page-content -->
    </div><!-- ##container -->


  <!-- End Homepage Content -->





  <!-- ##### Services Area Start ##### -->
  <section class="services-area d-flex flex-wrap">
    <!-- Service Thumbnail -->
    <div class="services-thumbnail bg-img jarallax" style="background-image: url('<?php echo $img; ?>bg-img/7.jpg');"></div>

    <!-- Service Content -->
    <div class="services-content section-padding-100-50 px-5 text-right">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>ماذا سنقدم</p>
              <h2><span>للمجتمع </span> وفق رؤية_السعودية_2030 </h2>
              <img src="<?php echo $img; ?>core-img/decor.png" art="">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mb-50">
            <p>سوف نقدم كل ماهو مفيد من استشارات مجانية واسعار مختلفة عن السوفق لتلبية احتياج عملائنا</p>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="100ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="<?php echo $img; ?>core-img/s1.png" alt="">
                <h5>بذور و شتل</h5>
              </div>
              <p>في متجر زيد الزراعي تتوفر لدينا جميع انواع الشتل والبذور </p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="300ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="<?php echo $img; ?>core-img/tractor.png" alt="">
                <h5>ادوات زراعية</h5>
              </div>
              <p>في متجر زيد الزراعي اجود الادوات الزراعية وباسعار منافسة </p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="500ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="<?php echo $img; ?>core-img/sprout.png" alt="">
                <h5>عمال وخبراء</h5>
              </div>
              <p>العمال والخبراء الزراعيين هم اهم ركيزة لنمو الارض فلقد وفرنا افضل الخبراء والعمال الزراعيين مهندسين وفنيين ومدربين </p>
            </div>
          </div>

          <!-- Single Service Area -->
          <div class="col-12 col-lg-6">
            <div class="single-service-area mb-50 wow fadeInUp" data-wow-delay="700ms">
              <!-- Service Title -->
              <div class="service-title mb-3 d-flex align-items-center">
                <img src="<?php echo $img; ?>core-img/s3.png" alt="">
                <h5>صيدلية : زراعية و بيطرية</h5>
              </div>
              <p>سلامة الزراع المواشي من اهم اهدافنا لذالك وفرنا صيدليات الكترونية واطباء بيطريين </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- ##### Services Area End ##### -->


  <?php
   /* Footer */
   include $tpl . 'footer.php';
    ob_end_flush();
  ?>
