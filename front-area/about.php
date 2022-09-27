<?php

      ob_start();
      session_start();
      $pageTitle ='About Us';  // Special 'function'
      include 'init.php';
?>

  <!-- ##### Breadcrumb Area Start ##### -->
  <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('<?php echo $img; ?>bg-img/33.jfif');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>حول</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Breadcrumb Area End ##### -->
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


  <!-- ##### About Us Area Start ##### -->
  <section class="about-us-area">
    <div class="container">
      <div class="row align-items-center">
        <!-- About Us Content -->
        <div class="col-12 col-md-8">
          <div class="about-us-content mb-100">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>معلومات عنا</p>
              <h2><span>من نحن </span> ساخبركم</h2>
              <img src="<?php echo $img; ?>core-img/decor.png" alt="">
            </div>
            <p>متجر لتقديم الاحتياجات الزراعية من بيع الاداوات الزراعية وتقديم الخبراء من اخصائيين وا واطباء  يملكون الخبرة للنمو الزراعي .</p>
            <a href="#" class="btn famie-btn mt-30">الانظمام الى شركائنا</a>
          </div>
        </div>

        <!-- Famie Video Play -->
        <div class="col-12 col-md-4">
          <div class="famie-video-play mb-100">
            <img src="<?php echo $img; ?>bg-img/6.jpg" alt="">
            <!-- Play Icon -->
            <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-icon"><i class="fa fa-play"></i></a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ##### About Us Area End ##### -->

  <!-- ##### Services Area Start ##### -->
  <section class="services-area d-flex flex-wrap">
    <!-- Service Thumbnail -->
    <div class="services-thumbnail bg-img jarallax" style="background-image: url('<?php echo $img; ?>bg-img/7.jpg');"></div>

    <!-- Service Content -->
    <div class="services-content section-padding-100-50 px-5">
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

  <!-- ##### Our Products Area Start ##### -->
  <section class="our-products-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
            <p>منتجات مميزة</p>
            <h2><span>منتجاتنا</span> هي أعلى جودة </h2>
            <img src="<?php echo $img; ?>core-img/decor2.png" alt="">
          </div>
        </div>
      </div>
</section>

  <!-- ##### Contact Area Start ##### -->
  <section class="contact-area">
    <div class="container">
      <div class="row justify-content-between">

        <!-- Contact Content -->
        <div class="col-12 col-lg-5">
          <div class="contact-content mb-100">
            <!-- Section Heading -->
            <div class="section-heading text-center">
              <p>تواصل معنا الان</p>
              <h2><span>لاستقبال اقتراحاتكم</span> ولتلبية احتياجاتكم</h2>
              <img src="<?php echo $img; ?>core-img/decor.png" alt="">
            </div>
            <!-- Contact Form Area -->
            <div class="contact-form-area text-right">
              <form action="contact-process.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="name" placeholder="الاسم">
                  </div>
                  <div class="col-lg-6">
                    <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني">
                  </div>
                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="رسالتك">
                  </div>
                  <div class="col-12">
                    <textarea name="message" class="form-control" cols="30" rows="10" placeholder="الرسالة"></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn famie-btn">ارسال</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Contact Maps -->
        <div class="col-lg-6">
          <div class="contact-maps mb-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28313.28917392649!2d-88.2740948914384!3d41.76219337461615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880efa1199df6109%3A0x8a1293b2ae8e0497!2sE+New+York+St%2C+Aurora%2C+IL%2C+USA!5e0!3m2!1sen!2sbd!4v1542893000723"
              allowfullscreen></iframe>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- ##### Contact Area End ##### -->

  <?php
      include $tpl . 'footer.php';
      ob_end_flush(); // Release The Output
  ?>
