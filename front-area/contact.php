<?php

      ob_start();
      session_start();
      $pageTitle ='Contact Us';  // Special 'function'
      include 'init.php';
?>

  <!-- ##### Breadcrumb Area Start ##### -->
  <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('<?php echo $img; ?>bg-img/oo.jfif');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>اتصل بنا</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Breadcrumb Area End ##### -->

  <!-- ##### Contact Information Area Start ##### -->
  <section class="contact-info-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
            <p>معلومات الاتصال</p>
            <h2><span>أفضل طريقة</span> للاتصال بنا للحصول على</h2>
            <img src="<?php echo $img; ?>core-img/decor2.png" alt="">
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Information Area -->
        <div class="col-12 col-md-4">
          <div class="single-information-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms">
            <div class="contact-icon">
              <i class="icon_pin_alt"></i>
            </div>
            <h5>العنوان</h5>
            <h6>حائل  ,شارع بيروت </h6>
          </div>
        </div>

        <!-- Single Information Area -->
        <div class="col-12 col-md-4">
          <div class="single-information-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
            <div class="contact-icon">
              <i class="icon_phone"></i>
            </div>
            <h5>هاتف</h5>
            <h6>+84 223 9000</h6>
          </div>
        </div>

        <!-- Single Information Area -->
        <div class="col-12 col-md-4">
          <div class="single-information-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
            <div class="contact-icon">
              <i class="icon_mail_alt"></i>
            </div>
            <h5>البريد الالكتروني</h5>
            <h6>Zeedis1995@gmail.com</h6>
          </div>
        </div>

      </div>
      <div class="c-border"></div>
    </div>
  </section>
  <!-- ##### Contact Information Area End ##### -->

  <!-- ##### Contact Area Start ##### -->
  <section class="contact-area section-padding-100-0">
    <div class="container">
      <div class="row justify-content-between">

        <!-- Contact Content -->
        <div class="col-12 col-lg-5">
          <div class="contact-content text-center mb-100">
             <!-- Section Heading -->
            <div class="section-heading">
              <p>تواصل معنا الان</p>
              <h2><span>لاستقبال اقتراحاتكم</span> ولتلبية احتياجاتكم</h2>
              <img src="<?php echo $img; ?>core-img/decor.png" alt="">
            </div>
            <!-- Contact Form Area -->
            <div class="contact-form-area text-right">
              <form action="contact-process.php" method="post">
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
