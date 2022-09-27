<?php

      session_start();

      $noNavbar  = '';       // Special 'Navbar'
      $pageTitle ='login admin';  // Special 'function'

       if (isset($_SESSION['Username'])) {
            header('Location: dashboard.php');
        }

   // Include inti page
       include "init.php";

/* ========== Form =========== */


    //  Check If User Coming From HTTP Post Request


if($_SERVER['REQUEST_METHOD'] == 'POST'){

     $username   = $_POST['username'];
     $password   = $_POST['pass'];
     $hashedPass = sha1($password);


    $sql = $con->prepare("SELECT UserID, username, Password FROM users WHERE username = ? AND Password = ? AND GroupID = 1 LIMIT 1");
    $sql->execute(array($username, $hashedPass));
    $row = $sql->fetch();
    $count = $sql->rowCount();

    // If count > 0 This Mean The Database Contain Record About This Username

    if($count > 0) {
        $_SESSION['Username'] = $username;     // Register Session username
        $_SESSION['ID'] = $row['UserID'];   // Register Session ID
        header('Location: dashboard.php');  // Redirect To Dashboard page
        exit();

    } else { ?>

      <div class="alert alert-danger">Not Found This Mail</div>


    <?php }

}

?>
 <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
   <div class="form-content">
     <h4 class="text-center">Admin Login</h4>
     <input class = "form-control" type="text" name="username" placeholder="Username" autocomplete="off" />
     <input class = "form-control" type="password" name="pass" placeholder="password" autocomplete="new-password" />
     <input class = "btn btn-success btn-block" type="submit" value="Login" name ="submit" />
   </div>
 </form>

<?php
     // Include Footer page
    include $tpl . 'footer.php';
?>
