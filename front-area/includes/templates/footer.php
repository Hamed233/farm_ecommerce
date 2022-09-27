

      <!-- ##### Footer Area Start ##### -->
      <footer class="footer-area">
        <div class="main-footer bg-img bg-overlay section-padding-80-0" style="background-image: url('<?php echo $img; ?>bg-img/3.jpg');">
        <div class="container">
        <!-- Main Footer Area -->
            <div class="row">
              <!-- Single Footer Widget Area -->
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="footer-widget mb-80">
                  <a href="#" class="foo-logo d-block mb-30"><img src="<?php echo $img; ?>core-img/zeed.png" alt=""></a>
                  <p class="text-right">متجر زيد الزراعي</p>
                  <div class="contact-info">
                    <p><i class="fa fa-map-pin" aria-hidden="true"></i><span>حائل وشارع الملك عبدالعزيز</span></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i><span>zeedis1995@gmail.com</span></p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i><span>+966 223 9000</span></p>
                  </div>
                </div>
              </div>

              <!-- Single Footer Widget Area -->
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="footer-widget mb-80">
                  <h5 class="widget-title text-center">الاخبار</h5>

                  <!-- Single Recent News Start -->
                  <div class="single-recent-blog d-flex align-items-center">
                    <div class="post-thumbnail">
                      <img src="<?php echo $img; ?>bg-img/4.jpg" alt="">
                    </div>
                    <div class="post-content">
                      <a href="#" class="post-title">افضل الاخصائيين الزراعيين هنا سيكونون بخدمتكم</a>
                      <div class="post-date">خبرات تتراوح من 4 الى 30 سنة</div>
                    </div>
                  </div>

                  <!-- Single Recent News Start -->
                  <div class="single-recent-blog d-flex align-items-center">
                    <div class="post-thumbnail">
                      <img src="<?php echo $img; ?>bg-img/5.jpg" alt="">
                    </div>
                    <div class="post-content">
                      <a href="#" class="post-title">يستطيع العملاء المشاركة في عرض منتجاتهم من المواشي </a>
                      <div class="post-date">ابقار و اغنام و جمال و دواجن</div>
                    </div>
                  </div>

                </div>
              </div>

              <!-- Single Footer Widget Area -->
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="footer-widget mb-80 text-center">
                  <h5 class="widget-title text-center">للتواصل </h5>
                  <!-- Footer Social Info -->
                  <div class="footer-social-info">
                    <a href="#">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                      <i class="fa fa-pinterest" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        <!-- Copywrite Area  -->
        <div class="copywrite-area">
          <div class="copywrite-text">
            <div class="text-center">
              <p> متجر زيد الزراعي <?php echo date('Y'); ?> جميع الحقوق محفوظة  <i class="fa fa-heart fa-fw" aria-hidden="true"></i> رؤية_السعودية </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- ##### Footer Area End ##### -->


       <!-- ##### All Javascript Files ##### -->
      <script src="<?php echo $libr; ?>bootstrap/bootstrap.min.js"></script><!-- Bootstrap js -->
      <script src="<?php echo $js; ?>jquery.min.js"></script><!-- jquery 2.2.4  -->
      <script src="<?php echo $js; ?>popper.min.js"></script><!-- Popper js -->
      <script src="<?php echo $js; ?>owl.carousel.min.js"></script><!-- Owl Carousel js -->
      <script src="<?php echo $js; ?>classynav.js"></script><!-- Classynav -->
      <script src="<?php echo $js; ?>wow.min.js"></script><!-- Wow js -->
      <script src="<?php echo $js; ?>jquery.sticky.js"></script><!-- Sticky js -->
      <script src="<?php echo $js; ?>jquery.magnific-popup.min.js"></script><!-- Magnific Popup js -->
      <script src="<?php echo $js; ?>jquery.scrollup.min.js"></script><!-- Scrollup js -->
      <script src="<?php echo $js; ?>jarallax.min.js"></script><!-- Jarallax js -->
      <script src="<?php echo $js; ?>jarallax-video.min.js"></script><!-- Jarallax Video js -->
      <script src="<?php echo $js; ?>active.js"></script><!-- Active js -->
      <!-- start-smooth-scrolling -->
      <script src="<?php echo $js; ?>move-top.js"></script>
      <script src="<?php echo $js; ?>easing.js"></script>

      <script>
    		jQuery(document).ready(function ($) {
    			$(".scroll").click(function (event) {
    				event.preventDefault();

    				$('html,body').animate({
    					scrollTop: $(this.hash).offset().top
    				}, 1000);
    			});
    		});


    	</script>

   </body>
</html>
