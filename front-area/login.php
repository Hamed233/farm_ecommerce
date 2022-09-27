<?php

      ob_start();
      session_start();
      $pageTitle ='login';  // Special 'function'

      if (isset($_SESSION['Usermail'])) {
          header('Location: index.php');
      }

      include 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $mail       = $_POST['mail'];
  $pass       = $_POST['pass'];
  $hashedpass = sha1($pass);

    if (isset($_POST['login'])) {

    $stmt = $con->prepare("SELECT
                               UserID, Email, password
                           FROM
                                 users
                           WHERE
                                 Email = ?
                           AND
                                 password = ?");
    $stmt->execute(array($mail, $hashedpass));
    $get   = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['Usermail'] = $mail;              // Register Session Mail
        $_SESSION['userid']   = $get['UserID'];      // Register User ID In Session
        $_SESSION['username'] = $get['username'];  // Register Username In Session
        header('Location: index.php');             // Redirect To Dashboard Page
        exit();
    } else {
      echo '<div class="alert alert-danger">Something Is Wrong!</div>';
    }

  } else {

            // Filter Field

            // Var Errors
            $ErrUsername  = '';
            $ErrPass      = '';
            $ErrMail      = '';
            $ErrCheck     = '';
            $msgSuccess   = '';

            // variable To Store data from form
            $username      = $_POST['username'];
            $password1     = $_POST['pass'];
            $password2     = $_POST['pass2'];
            $email         = $_POST['mail'];
            $kind_user     = $_POST['kind_user'];


           if (isset($_POST['username'])) {

               $filterUsers = filter_var($username, FILTER_SANITIZE_STRING);

               if (strlen($filterUsers) < 4) {
                   $ErrUsername = '<span class="err-msg"> Username Must Be Larger Than 4 Characters</span>';
               }
           }

           if (isset($password1) && isset($password2)) {

               if (empty($password1)) {
                   $ErrPass = '<span class="err-msg"> Password is required </span>';
               }

               if (sha1($password1) !== sha1($password2)) {
                   $ErrPass = '<span class="err-msg"> Two Password Must Be Equal </span>';
               }


           }

           if (isset($email)) {

               $filterEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

               if (filter_var($filterEmail, FILTER_VALIDATE_EMAIL) != true) {

                   $ErrMail = '<span class="err-msg"> This Email Not Valid </span>';
               }
           }

                 // Check If There's No ERRORS Proceed The User Add
                if (empty($ErrUsername && $ErrPass && $ErrMail && $errImg)) {

                    // Check If User Exist In Database

                  $check = check("Username", "users", $username);  // خاصة بفنكشن التشيك على الاسم اذا كان موجود أم لا

                    if ($check == 1) {

                        $ErrCheck = '<span class="err-msg"> Sorry This Username Is Exist </span>';

                    } else {

                             // Insert UserInfo In DB

                        $sql = $con->prepare("INSERT INTO
                                            users(Username, Password, Email, KindUser, RegStatus, date_register)
                                            VALUES(:zuser, :zpass, :zmail, :zkinduser, 0, now())");
                        $sql->execute(array (

                            'zuser'     => $username,
                            'zpass'     => sha1($password1),
                            'zmail'     => $email,
                            'zkinduser' => $kind_user

                        ));

                          // echo success Msg
                         $msgSuccess = '<h2> Well Done! Login Now </h2>';
                         header('Location: index.php');
                         $_SESSION['Usermail'] = $mail;              // Register Session Mail
                         $_SESSION['userid'] = $get['UserID'];  // Register User ID In Session
                         exit();

                      }
                }
    }
}

?>
<div class="form-container">
  <div class="login-wrap">
    <img src="<?php echo $img; ?>core-img/zeed.png" alt="">
      <div class="login-html">
          <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab">Sign In</label>
          <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
          <!-- Start Login Page -->
          <div class="login-form">
            <form id="login" class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
              <div class="sign-in-htm">
                  <div class="group">
                    <input
                         id="user"
                         class="form-control input"
                         type="email"
                         name="mail"
                         placeholder="Your Email"
                         required="required"
                         type="text" >
                      <?php if (isset($ErrMail)) { echo $ErrMail; } ?>
                  </div>
                  <div class="group">
                      <input
                           id="pass"
                           class="form-control input"
                           minlength="4"
                           type="password"
                           name="pass"
                           autocomplete="new-password"
                           placeholder="Your Password"
                           required="required"
                           data-type="password">
                  </div>
                  <div class="group">
                      <input id="check" type="checkbox" class="check">
                      <label for="check"><span class="icon"></span> Keep me Signed In</label>
                  </div>
                  <div class="group">
                      <input type="submit" class="btn btn-success btn-block form-button" value="Sign In" name = 'login'>
                  </div>
                </form>
              </div>
               <!-- End Login Page -->
                <!-- Start SignUp Page -->
              <div class="sign-up-htm">
                <form class="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
                  <div class="group">
                      <input
                             pattern=".{4,}"
                             title="Username Musr Be 4 Characters"
                             class="form-control input"
                             id="user"
                             type="text"
                             name="username"
                             autocomplete="off"
                             placeholder="Your Username"
                             required="required" />

                     <?php if (isset($ErrUsername)) { echo $ErrUsername; }  ?>
                     <?php if (isset($ErrCheck)) { echo $ErrCheck; }  ?>
                  </div>

                  <div class="group">
                    <input
                         id="mail"
                         class="form-control input"
                         type="email"
                         name="mail"
                         placeholder="Your Email"
                         required="required"
                         type="text" >
                         <?php if (isset($ErrMail)) { echo $ErrMail; } ?>
                  </div>
                  <div class="group">
                    <input
                         id="pass"
                         class="form-control input"
                         minlength="4"
                         type="password"
                         name="pass"
                         autocomplete="new-password"
                         placeholder="Your Password"
                         required="required"
                         data-type="password">

                      <?php if (isset($ErrPass)) { echo $ErrPass; } ?>
                  </div>
                  <div class="group">
                      <input
                           id="pass"
                           class="form-control input"
                           minlength="4"
                           type="password"
                           name="pass2"
                           autocomplete="new-password"
                           placeholder="Your Password"
                           required="required"
                           data-type="password">
                      <?php if (isset($ErrPass)) { echo $ErrPass; } ?>
                  </div>

                  <div class="selectbox-kind-user">
                   <select name="kind_user">
                       <option value="CustomUser">CustomUser</option>';
                       <option value="OwnCompany">OwnCompany</option>';
                       <option value="Sellar">Sellar</option>';
                   </select>
                 </div>

                  <div class="group">
                      <input type="submit" class="btn btn-success btn-block form-button" value="Sign Up" name="signup" >
                  </div>
                  <div class="hr"></div>
                  <div class="foot-lnk">
                      <label for="tab-1">If you Already Member Click</a>
                  </div>
                </form>
              </div>
              <!-- End SignUp Page -->
          </div>
      </div>
  </div>
</div>

<div class="container">
  <!-- This Is Loop Special To Show Errors [Filter] Field -->
  <div class="success-msg text-center">
    <?php
        if (isset($msgSuccess)) {
            echo '<div class="alert alert-success">' . $msgSuccess . '</div>';
        }
      ?>
  </div>
</div>

<?php
    include $tpl . 'footer.php';
    ob_end_flush(); // Release The Output
?>
