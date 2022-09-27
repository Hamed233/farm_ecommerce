

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?php getTitle(); ?></title>

        <!-- Css Files & Library & Plugins -->
        <link rel="stylesheet" href="<?php echo $libr; ?>bootstrap/bootstrap.css" /><!-- Bootstrap-css -->
        <link rel="stylesheet" href="<?php echo $libr; ?>fontawesome/font-awesome.css" />    <!-- Font-Awesome-Icons-css -->
        <link rel="stylesheet" href="<?php echo $libr; ?>normalize/normalize.css" />    <!-- normalize-Css -->
        <link rel="stylesheet" href="<?php echo $libr; ?>jquery-ui.min.css" />          <!-- Jquery User Intrface -->
        <link rel="stylesheet" href="<?php echo $css; ?>flexslider.css" />              <!-- Flexslider css (for Testimonials) -->
        <link rel="stylesheet" href="<?php echo $css; ?>popuo-box.css" />               <!-- Popup css (for Video Popup) -->
        <link rel="stylesheet" href="<?php echo $css; ?>lightbox.css" />                <!-- Lightbox css (for Projects) -->
        <link rel="stylesheet" href="<?php echo $css; ?>main.css" />                    <!-- Css Core File  -->
        <!-- //Css Files & Library & Plugins -->

        <!-- Favicon -->
        <link rel="icon" href="<?php echo $img; ?>core-img/zeed.png">

        <!-- web-fonts -->
      	<link href="//fonts.googleapis.com/css?family=Economica:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
      	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
      	<link href="//fonts.googleapis.com/css?family=Rasa:300,400,500,600,700" rel="stylesheet">
      	<!-- //web-fonts -->

        <script>
          addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
          }, false);

          function hideURLbar() {
            window.scrollTo(0, 1);
          }
        </script>

    </head>
    <body>
      <!-- Preloader
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
      </div>
     //Preloader -->

     <!-- ##### Header Area Start ##### -->
     <header class="header-area">
       <!-- Top Header Area -->
       <div class="top-header-area">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <div class="top-header-content d-flex align-items-center justify-content-between">
                 <!-- Top Header Content -->
                 <div class="top-header-meta text-right">
                   <p>مرحبا بكم في <span>متجر زيد الزراعي</span>نأمل أن نقدم لكم خدمة تنال على رضاكم</p>
                 </div>
                 <!-- Top Header Content -->
                 <div class="top-header-meta text-left">
                   <a href="#" data-toggle="tooltip" data-placement="bottom" title="zeedis1995@gmail@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: Zeedis1995@gmail.com</span></a>
                   <a href="#" data-toggle="tooltip" data-placement="bottom" title="+966592297032"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +966592297032</span></a>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

       <!-- Navbar Area -->
       <div class="famie-main-menu">
         <div class="classy-nav-container breakpoint-off">
           <div class="container">
                 <!-- Menu -->
                 <nav class="classy-navbar justify-content-between" id="famieNav">
                   <!-- Nav Brand -->
                   <a href="index.php" class="nav-brand"><img src="<?php echo $img; ?>core-img/zeed.png" alt=""></a>
                   <!-- Navbar Toggler -->
                   <div class="classy-navbar-toggler">
                     <span class="navbarToggler"><span></span><span></span><span></span></span>
                   </div>
                   <!-- Menu -->
                   <div class="classy-menu">
                     <!-- Close Button -->
                     <div class="classycloseIcon">
                       <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                     </div>

                    <?php $catNames = getAllFrom("*", "categories", "", "", "Cat_ID"); ?>
                     <!-- Navbar Start -->
                     <div class="classynav">
                       <ul>
                         <li class="active">
                           <a href="index.php">الصفحة الرئيسية </a></li>
                         <li>
                         <li><a href="pharmacy.php?pharmacy=pharmacy">الصيدلية</a>
                 <ul class="dropdown">
                                 <li><a href="pharmacy.php?pharmacy=agricultural">زراعية</a></li>
                                 <li><a href="pharmacy.php?pharmacy=veterinary">بيطرية</a></li>
                                 <li><a href="pharmacy.php?pharmacy=Consult-doctor"> استشارة طبيب</a></li>
                               </ul>
                             </li>

                         <li><a href="workersandexperts.php?request=workersandexperts">عمال وخبراء</a>
                      <ul class="dropdown">
                                 <li><a href="workersandexperts.php?request=agricultural-specialist">اخصائي زراعي</a></li>
                                 <li><a href="workersandexperts.php?request=worker">عامل</a></li>
                                 <li><a href="workersandexperts.php?request=agricultural-guidance">الارشاد الزراعي</a></li>
                               </ul>
                             </li>
                           </li>
                         <li><a href="hiring.php">التأجير</a></li>
                         <li><a href="contact.php">اتصل بنا</a></li>
                         <li><a href="about.php">حول</a></li>
                         <?php if (!isset($_SESSION['Usermail'])) { ?>
                         <li> <a href="login.php">تسجيل الدخول</a> </li>
                       <?php } else { ?>


                         <li>
                           <a href="#"><?php echo $_SESSION['Usermail']; ?></a>
                           <ul class="dropdown">
                              <li> <a href="logout.php">logout</a> </li>
                           </ul>
                         </li>
                      <?php  } ?>



                   </ul>

                       <!-- Cart Icon -->
                       <div id="cartIcon">
                         <a href="cart.php">
                           <i class="fa fa-shopping-cart"></i>
                           <span class="cart-quantity">1</span>
                         </a>
                       </div>
                     </div>
                     <!-- Navbar End -->
                   </div>
             </nav>

             <!-- Search Form -->
             <div class="search-form">
               <form action="#" method="get">
                 <input type="search" name="search" id="search" placeholder="...ماذا تريد">
                 <button type="submit" class="d-none"></button>
               </form>
               <!-- Close Icon -->
               <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
             </div>
           </div>
         </div>
       </div>


             <!-- login -->


     </header>
     <!-- ##### Header Area End ##### -->
