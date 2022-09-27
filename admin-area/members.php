<?php

    /*
    ======================================================

    == Manage Members Page
    == You Can Add | Edit | Delete Members From Here

    ======================================================
    */

        session_start();

        $pageTitle = 'Members';

          if (isset($_SESSION['Username'])) {

             include 'init.php';

             $do = isset($_GET['do']) ? ($_GET['do']) : 'Manage';

              // Start Manage Page

              if ($do == 'Manage') { // Manage Page

                  $query = '';

                     if (isset($_GET['page']) && $_GET['page'] == 'Pending') {

                         $query = 'AND RegStatus = 0';
                     }




                  // Select All Users Expect Admin

                   $sql = $con->prepare("SELECT
                                               *
                                         FROM
                                               users
                                         WHERE
                                               GroupID != 1 $query
                                         And
                                              KindUser = 'user'
                                         ORDER BY UserID DESC");
                   $sql->execute();
                   $rows = $sql->fetchAll();


                  echo '<h1 class="text-center global-h1">Manage members</h1>';

                  echo '<h2 class="text-left global_h2">Ordinary Users</h2>';

                   if (! empty($rows)) { ?>

                        <div class="container">
                            <div class="table-responsive">
                                <table class="main-table text-center manage_member table table-bordered">
                                    <tr>
                                        <td>#ID</td>
                                        <td>Avatar</td>
                                        <td>Username</td>
                                        <td>Email</td>
                                        <td>Register Date</td>
                                        <td>Control</td>
                                    </tr>

                                    <?php

                                         foreach($rows as $row) {

                                             echo "<tr>";
                                                echo "<td>" . $row['UserID'] . "</td>";
                                                echo "<td>";
                                                if (empty($row['avatar'])) {
                                                    echo "<img src='upload/avatars/avatar2.png' alt='' />";
                                                } else {
                                                    echo "<img src='upload/avatars/" . $row['avatar'] . "' alt='' />";
                                                }

                                                echo "</td>";

                                                echo "<td>" . $row['username'] . "</td>";
                                                echo "<td>" . $row['Email']    . "</td>";
                                                echo "<td>" . $row['date_register']     . "</td>";
                                                echo "<td>
                                                    <a href='members.php?do=Edit&userid= "   . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit  </a>
                                                    <a href='members.php?do=Delete&userid= " . $row['UserID'] . "'' class='btn btn-danger confirm'><i class='fas fa-times'></i> Delete  </a>";


                                                        if ($row['RegStatus'] == 0) {

                                                            echo "<a href='members.php?do=Activate&userid= " . $row['UserID'] . "'' class='btn btn-info activate'><i class='fas fa-check'></i> Activate  </a>";
                                                        }

                                               echo "</td>";
                                             echo "</tr>";
                                         }


                                        ?>

                                </table>
                            </div>

                           <a href = 'members.php?do=Add'
                              class="btn btn-primary">
                           <i class="fa fa-plus"></i> Add New User</a>

                        </div>
                 <?php } else {
                       echo '<div class="container">';
                           echo "<div class='nice_alert'><b>Sorry Not Found Any Record To Show</b></div>";

                       echo "<a
                              href = 'members.php?do=Add'
                              class='btn btn-primary'>
                              <i class='fa fa-plus'></i> Add New User</a>";
                       echo "</div>";


                   } ?>

                   <?php
   // Select All Users Expect Admin

    $sql = $con->prepare("SELECT
                                *
                          FROM
                                users
                          WHERE
                                GroupID != 1 $query
                          And
                               KindUser = 'expert'
                          ORDER BY UserID DESC");
    $sql->execute();
    $rows = $sql->fetchAll();

   echo '<h2 class="text-left global_h2">Experts</h2>';

    if (! empty($rows)) { ?>

         <div class="container">
             <div class="table-responsive">
                 <table class="main-table text-center manage_member table table-bordered">
                     <tr>
                         <td>#ID</td>
                         <td>Avatar</td>
                         <td>Username</td>
                         <td>Email</td>
                         <td>Register Date</td>
                         <td>Control</td>
                     </tr>

                     <?php

                          foreach($rows as $row) {

                              echo "<tr>";
                                 echo "<td>" . $row['UserID'] . "</td>";
                                 echo "<td>";
                                 if (empty($row['avatar'])) {
                                     echo "<img src='upload/avatars/avatar2.png' alt='' />";
                                 } else {
                                     echo "<img src='upload/avatars/" . $row['avatar'] . "' alt='' />";
                                 }

                                 echo "</td>";

                                 echo "<td>" . $row['username'] . "</td>";
                                 echo "<td>" . $row['Email']    . "</td>";
                                 echo "<td>" . $row['date_register']     . "</td>";
                                 echo "<td>
                                     <a href='members.php?do=Edit&userid= "   . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit  </a>
                                     <a href='members.php?do=Delete&userid= " . $row['UserID'] . "'' class='btn btn-danger confirm'><i class='fas fa-times'></i> Delete  </a>";


                                         if ($row['RegStatus'] == 0) {

                                             echo "<a href='members.php?do=Activate&userid= " . $row['UserID'] . "'' class='btn btn-info activate'><i class='fas fa-check'></i> Activate  </a>";
                                         }

                                echo "</td>";
                              echo "</tr>";
                          }


                         ?>

                 </table>
             </div>

            <a href = 'members.php?do=Add'
               class="btn btn-primary">
            <i class="fa fa-plus"></i> Add New Expert</a>

         </div>
  <?php } else {
        echo '<div class="container">';
            echo "<div class='nice_alert'><b>Sorry Not Found Any Record To Show</b></div>";

        echo "<a
               href = 'members.php?do=Add'
               class='btn btn-primary'>
               <i class='fa fa-plus'></i> Add New Expert</a>";
        echo "</div>";
    } ?>

    <h2 class="text-left global_h2">Company Owners</h2>

   <?php  if (! empty($rows)) { ?>

          <div class="container">
              <div class="table-responsive">
                  <table class="main-table text-center manage_member table table-bordered">
                      <tr>
                          <td>#ID</td>
                          <td>Avatar</td>
                          <td>Username</td>
                          <td>Email</td>
                          <td>Register Date</td>
                          <td>Control</td>
                      </tr>

                      <?php

                           foreach($rows as $row) {

                               echo "<tr>";
                                  echo "<td>" . $row['UserID'] . "</td>";
                                  echo "<td>";
                                  if (empty($row['avatar'])) {
                                      echo "<img src='upload/avatars/avatar2.png' alt='' />";
                                  } else {
                                      echo "<img src='upload/avatars/" . $row['avatar'] . "' alt='' />";
                                  }

                                  echo "</td>";

                                  echo "<td>" . $row['username'] . "</td>";
                                  echo "<td>" . $row['Email']    . "</td>";
                                  echo "<td>" . $row['date_register']     . "</td>";
                                  echo "<td>
                                      <a href='members.php?do=Edit&userid= "   . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit  </a>
                                      <a href='members.php?do=Delete&userid= " . $row['UserID'] . "'' class='btn btn-danger confirm'><i class='fas fa-times'></i> Delete  </a>";


                                          if ($row['RegStatus'] == 0) {

                                              echo "<a href='members.php?do=Activate&userid= " . $row['UserID'] . "'' class='btn btn-info activate'><i class='fas fa-check'></i> Activate  </a>";
                                          }

                                 echo "</td>";
                               echo "</tr>";
                           }


                          ?>

                  </table>
              </div>

             <a href = 'members.php?do=Add'
                class="btn btn-primary">
             <i class="fa fa-plus"></i> Add New Company Owner</a>

          </div>
   <?php } else {
         echo '<div class="container">';
             echo "<div class='nice_alert'><b>Sorry Not Found Any Record To Show</b></div>";

         echo "<a
                href = 'members.php?do=Add'
                class='btn btn-primary'>
                <i class='fa fa-plus'></i> Add New Company Owner</a>";
         echo "</div>";
     } ?>

     <h2 class="text-left global_h2">Customers</h2>

<?php   if (! empty($rows)) { ?>

           <div class="container">
               <div class="table-responsive">
                   <table class="main-table text-center manage_member table table-bordered">
                       <tr>
                           <td>#ID</td>
                           <td>Avatar</td>
                           <td>Username</td>
                           <td>Email</td>
                           <td>Register Date</td>
                           <td>Control</td>
                       </tr>

                       <?php

                            foreach($rows as $row) {

                                echo "<tr>";
                                   echo "<td>" . $row['UserID'] . "</td>";
                                   echo "<td>";
                                   if (empty($row['avatar'])) {
                                       echo "<img src='upload/avatars/avatar2.png' alt='' />";
                                   } else {
                                       echo "<img src='upload/avatars/" . $row['avatar'] . "' alt='' />";
                                   }

                                   echo "</td>";

                                   echo "<td>" . $row['username'] . "</td>";
                                   echo "<td>" . $row['Email']    . "</td>";
                                   echo "<td>" . $row['date_register']     . "</td>";
                                   echo "<td>
                                       <a href='members.php?do=Edit&userid= "   . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit  </a>
                                       <a href='members.php?do=Delete&userid= " . $row['UserID'] . "'' class='btn btn-danger confirm'><i class='fas fa-times'></i> Delete  </a>";


                                           if ($row['RegStatus'] == 0) {

                                               echo "<a href='members.php?do=Activate&userid= " . $row['UserID'] . "'' class='btn btn-info activate'><i class='fas fa-check'></i> Activate  </a>";
                                           }

                                  echo "</td>";
                                echo "</tr>";
                            }


                           ?>

                   </table>
               </div>

              <a href = 'members.php?do=Add'
                 class="btn btn-primary">
              <i class="fa fa-plus"></i> Add New Customer</a>

           </div>
    <?php } else {
          echo '<div class="container">';
              echo "<div class='nice_alert'><b>Sorry Not Found Any Record To Show</b></div>";

          echo "<a
                 href = 'members.php?do=Add'
                 class='btn btn-primary'>
                 <i class='fa fa-plus'></i> Add New Customer</a>";
          echo "</div>";
      } ?>


    <?php
                      // Select All Users Expect Admin

                       $sql = $con->prepare("SELECT
                                                   *
                                             FROM
                                                   users
                                             WHERE
                                                   GroupID != 1 $query
                                             And
                                                  KindUser = 'doctor'
                                             ORDER BY UserID DESC");
                       $sql->execute();
                       $rows = $sql->fetchAll();


                       echo '<h2 class="text-left global_h2">Doctors</h2>';

                       if (! empty($rows)) { ?>

                            <div class="container">
                                <div class="table-responsive">
                                    <table class="main-table text-center manage_member table table-bordered">
                                        <tr>
                                            <td>#ID</td>
                                            <td>Avatar</td>
                                            <td>Username</td>
                                            <td>Email</td>
                                            <td>Register Date</td>
                                            <td>Control</td>
                                        </tr>

                                        <?php

                                             foreach($rows as $row) {

                                                 echo "<tr>";
                                                    echo "<td>" . $row['UserID'] . "</td>";
                                                    echo "<td>";
                                                    if (empty($row['avatar'])) {
                                                        echo "<img src='upload/avatars/avatar2.png' alt='' />";
                                                    } else {
                                                        echo "<img src='upload/avatars/" . $row['avatar'] . "' alt='' />";
                                                    }

                                                    echo "</td>";

                                                    echo "<td>" . $row['username'] . "</td>";
                                                    echo "<td>" . $row['Email']    . "</td>";
                                                    echo "<td>" . $row['date_register']     . "</td>";
                                                    echo "<td>
                                                        <a href='members.php?do=Edit&userid= "   . $row['UserID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit  </a>
                                                        <a href='members.php?do=Delete&userid= " . $row['UserID'] . "'' class='btn btn-danger confirm'><i class='fas fa-times'></i> Delete  </a>";


                                                            if ($row['RegStatus'] == 0) {

                                                                echo "<a href='members.php?do=Activate&userid= " . $row['UserID'] . "'' class='btn btn-info activate'><i class='fas fa-check'></i> Activate  </a>";
                                                            }

                                                   echo "</td>";
                                                 echo "</tr>";
                                             }


                                            ?>

                                    </table>
                                </div>

                               <a href = 'members.php?do=Add'
                                  class="btn btn-primary">
                               <i class="fa fa-plus"></i> Add New Doctor</a>

                            </div>
                     <?php } else {
                           echo '<div class="container">';
                               echo "<div class='nice_alert'><b>Sorry Not Found Any Record To Show</b></div>";

                           echo "<a
                                  href = 'members.php?do=Add'
                                  class='btn btn-primary'>
                                  <i class='fa fa-plus'></i> Add New Doctor</a>";
                           echo "</div>";
                       } ?>



        <?php } elseif ($do == 'Add') {  // Add New Member ?>

                        <h1 class="text-center">Add New Member</h1>

                        <div class="container offset-3">
                            <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
                                <!-- Start  Username Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="text" name="username" class="form-control" autocomplete= "off" required='required' placeholder="Username To Login" />
                                        </div>
                                    </div>
                                <!-- End  Username Field -->

                                <!-- Start  Password Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <input type="Password" name="password" class="password form-control" autocomplete="new-password" required='required' placeholder="Add A Complex Pass"/>
                                            <i class="show-pass fa fa-eye fa-2x"></i>
                                        </div>
                                    </div>
                                <!-- End  Password Field -->

                                <!-- Start  Email Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="Email" name="email" class="form-control" required='required' placeholder="Add Your Email" />
                                        </div>
                                    </div>
                                <!-- End  Email Field -->


                                <!-- Start image Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="file" name="avatar" class="form-control" required='required' placeholder="Upload Image"/>
                                        </div>
                                    </div>
                                <!-- End image Field -->

                                <!-- Start Select Box Kind User Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <select class="form-control" name="kind-user">
                                            <option value="user">User</option>
                                            <option value="expert">Expert</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="cutomer">Customer</option>
                                            <option value="own_company">Own Company</option>
                                          </select>
                                        </div>
                                    </div>
                                <!-- End Select Box Kind User Field -->

                                <!-- Start  submit Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input type="submit" value="Add New Member" class="btn btn-success btn-lg" />
                                        </div>
                                    </div>
                                <!-- End  submit Field -->

                            </form>
                        </div>

                  <?php

                 } elseif ($do == 'Insert') {

                  // Insert Member Page


            if($_SERVER['REQUEST_METHOD'] == 'POST') {

               echo "<h1 class='text-center'>Update Member</h1>";
               echo "<div class='container'>";

                // Upload Variables

                $avatar     = $_FILES['avatar'];

                $avatarName = $_FILES['avatar']['name'];
                $avatarSize = $_FILES['avatar']['size'];
                $avatarTmp  = $_FILES['avatar']['tmp_name'];
                $avatarType = $_FILES['avatar']['type'];

                // List Odf Allowed File Typed To Upload

                $avatarAllowedExtention = array("jpeg", "jpg", "png", "gif");

                // Get Avatar Extention

                $avatarEtention = strtolower(end(explode('.', $avatarName)));

                // Get Variable From The Form

                $user       = $_POST['username'];
                $pass       = $_POST['password'];
                $email      = $_POST['email'];
                $kindUser   = $_POST['kind-user'];

                $hashpass = sha1($_POST['password']);
                // Password Trick



                // Validate The Form

                $formErrors = array();

                if (strlen($user) < 4) {

                    $formErrors[] = 'Username Can\'t Be Less Than<strong> 4 </strong> Characters';

                }

                if (strlen($user) > 20) {

                    $formErrors[] = 'Username Can\'t Be More Than <strong> 20 </strong>Characters';

                }

                if (empty($user)) {

                    $formErrors[] = 'Username Can\'t Be <strong> Empty </strong>';

                }

                if (empty($pass)) {

                    $formErrors[] = 'Password Can\'t Be Less Than<strong> 8 </strong>';

                }

                if (empty($email)) {

                    $formErrors[] = 'Email Can\'t Be <strong> Empty </strong>';

                }

                if (! empty($avatarName) && ! in_array($avatarEtention, $avatarAllowedExtention)) {

                    $formErrors[] = 'This Extention Is Not <strong> Allowed </strong>';

                }

                 if (empty($avatarName)) {

                    $formErrors[] = 'Avatar is <strong> Required </strong>';

                }

                 if ($avatarSize > 4194304) {

                    $formErrors[] = 'Avatar Can\'t Larger Than <strong> 4MB </strong>';

                }

                // Loop Into Errors Array And Echo It

                foreach($formErrors as $error) {

                     echo  '<div class="alert alert-danger">' . $error . '</div>';

                }

                // Check If There's No Proceed The Update Operation

                if (empty($formErrors)) {

                    $avatar = rand(0, 1000000) . '_' . $avatarName;

                    move_uploaded_file($avatarTmp, "upload\avatars\\" . $avatar);
                    // Check If User Exist In Database

                  $check = checkItem("username", "users", $user);  // خاصة بفنكشن التشيك على الاسم اذا كان موجود أم لا

                    if ($check == 1) {

                        $theMsg =  "<div class='alert alert-danger'>Sorry This User Is Exist</div>";
                   //     redirectHome($theMsg, 'back');

                    } else {

                             // Insert UserInfo In DB

                        $sql = $con->prepare("INSERT INTO
                                            users(username, password, Email, KindUser, RegStatus, date_register, avatar)
                                            VALUES(:zuser, :zpass, :zmail, :zkind, 1, now(), :zavatar)");
                        $sql->execute(array (
                            'zuser'     => $user,
                            'zpass'     => $hashpass,
                            'zmail'     => $email,
                            'zkind'     => $kindUser,
                            'zavatar'   => $avatar
                        ));

                          echo "<div class='container'>";
                         // Echo Success Message

                         $theMsg = "<div class='alert alert-success'>" . $sql->rowCount() . 'Record Inserted</div>';
                         redirectHome($theMsg, 'back');


                          echo '</div>';
                       }


                }


            } else {

                $theMsg =  '<div class="alert alert-danger">Sorry you Can\'t Enter To This Page</div>';
                redirectHome($theMsg);
            }


               echo "</div>";




              } elseif ($do == 'Edit') {  // Edit Page


                    // Check If Get Request Userid Is Numeric & Get The Integer Value It

                   $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

                    // Select All Data Depend On This ID

                    $sql   = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

                    // Execute Query

                    $sql->execute(array($userid));

                    // Fetch The Data

                    $row   = $sql->fetch();

                    // The Row Count

                    $count = $sql->rowCount();

                    // If There Is Such ID Show The Form

                  if($count > 0) { ?>

                        <h1 class="text-center">Edit Member</h1>

                        <div class="container offset-3">
                            <form class="form-horizontal" action="?do=Update" method="POST">
                                <input type="hidden" name="userid" value="<?php echo $userid ?>" />
                                <!-- Start  Username Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" autocomplete= "off" required='required'  />
                                        </div>
                                    </div>
                                <!-- End  Username Field -->

                                <!-- Start  Password Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="hidden" name="oldPassword" value="<?php echo $row['Password'] ?>" />
                                          <input type="Password" name="newPassword" class="form-control" autocomplete="new-password"placeholder="Leave Blank If You Don\'t Want To Change"/>
                                        </div>
                                    </div>
                                <!-- End  Password Field -->

                                <!-- Start  Email Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="Email" name="email" value="<?php echo $row['Email'] ?>" class="form-control" required='required' />
                                        </div>
                                    </div>
                                <!-- End  Email Field -->

                                <!-- Start Select Box Kind User Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <select class="form-control" name="kind-user">
                                            <option value="user" <?php if ($row['KindUser'] == "user") { echo "selected"; } ?>>User</option>
                                            <option value="expert" <?php if ($row['KindUser'] == "expert") { echo "selected"; } ?>>Expert</option>
                                            <option value="doctor" <?php if ($row['KindUser'] == "doctor") { echo "selected"; } ?>>Doctor</option>
                                            <option value="cutomer" <?php if ($row['KindUser'] == "cutomer") { echo "selected"; } ?>>Customer</option>
                                            <option value="own_company" <?php if ($row['KindUser'] == "own_company") { echo "selected"; } ?>>Own Company</option>
                                          </select>
                                        </div>
                                    </div>
                                <!-- End Select Box Kind User Field -->

                                <!-- Start image Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="file" name="avatar" class="form-control" required='required' value="<?php echo $row['avatar'] ?>"/>
                                        </div>
                                    </div>
                                <!-- End image Field -->

                                <!-- Start  submit Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input type="submit" value="Save" class="btn btn-success btn-lg" />
                                        </div>
                                    </div>
                                <!-- End  submit Field -->

                            </form>
                        </div>


          <?php

                // If There Is No Such ID Show Error Message

                } else {

                      echo "<div class='container'>";
                      $theMsg    =  "<div class='alert alert-danger'>There is No Such Id</div>";
                      redirectHome($theMsg);
                      echo "</div>";
                }

        } elseif ($do == 'Update') {

            echo "<h1 class='text-center'>Update Member</h1>";
            echo "<div class='container'>";

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Get Variable From The Form

                $id       = $_POST['userid'];
                $user     = $_POST['username'];
                $email    = $_POST['email'];
                $kindUser = $_POST['kind-user'];
                $avatar   = $FILES['avatar']['name'];

                // Password Trick

                $pass = '';

                if (empty($_POST['newPassword'])) {

                    $pass = $_POST['oldPassword'];
                } else {

                    $pass = sha1($_POST['newPassword']);
                }

                // Validate The Form

                $formErrors = array();

                if (strlen($user) < 4) {

                    $formErrors[] = 'Username Can\'t Be Less Than<strong> 4 </strong> Characters';

                }

                if (strlen($user) > 20) {

                    $formErrors[] = 'Username Can\'t Be More Than <strong> 20 </strong>Characters';

                }

                if (empty($user)) {

                    $formErrors[] = 'Username Can\'t Be <strong> Empty </strong>';

                }

                if (empty($email)) {

                    $formErrors[] = 'Email Can\'t Be <strong> Empty </strong>';

                }

                // Loop Into Errors Array And Echo It

                foreach($formErrors as $error) {

                    echo '<div class="alert alert-danger">' . $error . '</div>';

                }

                // Check If There's No Proceed The Update Operation

                if (empty($formErrors)) {


                    $stmt2 = $con->prepare("SELECT
                                                  *
                                            FROM
                                                  users
                                            WHERE
                                                  Username = ?
                                            AND
                                                  UserID != ?");
                        $stmt2->execute(array($user, $id));
                        $count = $stmt2->rowCount();



                    if ($count == 1) {
                        echo "<div class='alert alert-danger'>Sorry This Name IS Exit</div>";
                        redirectHome($theMsg, 'back');

                    } else {

                     // Update The Database With This Information

                      $sql = $con->prepare("UPDATE users SET username = ?, Email = ?, password = ?, KindUser = ?, avatar = ?, WHERE UserID = ? LIMIT 1");
                      $sql->execute(array($user, $email, $pass, $kindUser, $id ));

                         // Echo Success Message

                        $theMsg ="<div class='alert alert-success'>" . $sql->rowCount() . "Record Update</div>";
                        redirectHome($theMsg, 'back');


                }
            }
            } else {
                 // Echo Danger Message

                $theMsg ="<div class='alert alert-danger'>Sorry You Can\'t Browse This Page</div>";
                redirectHome($theMsg, 'back');
            }

               echo "</div>";

        } elseif ($do == 'Delete') { // Delet Member Page

                  echo "<h1 class='text-center'>Delete Member</h1>";
                  echo "<div class='container'>";

                        // Check If Get Request Userid Is Numeric & Get The Integer Value It

                       $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

                        // Select All Data Depend On This ID

                        $check = checkItem('userid', 'users', $userid);

                        // If There Is Such ID Show The Form

                      if($check > 0) {

                          $sql = $con->prepare('DELETE FROM users WHERE UserID = :zuser');
                          $sql->bindparam(":zuser", $userid);    // ربطهم ببعض
                          $sql-> execute();
                          $theMsg = "<div class='alert alert-success'>" . $sql->rowCount() . 'Delete Record</div>';
                           redirectHome($theMsg);

                      } else {

                          $theMsg = '<div class="alert alert-danger">This Id Not Exist</div>';
                          redirectHome($theMsg);
                      }

                  echo "</div>";

             } elseif ($do =='Activate') {


                  echo "<h1 class='text-center'>Activate Member</h1>";
                  echo "<div class='container'>";

                        // Check If Get Request Userid Is Numeric & Get The Integer Value It

                       $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

                        // Select All Data Depend On This ID

                        $check = checkItem('userid', 'users', $userid);

                        // If There Is Such ID Show The Form

                      if($check > 0) {

                          $sql = $con->prepare("UPDATE users SET RegStatus = 1 WHERE UserID = ?");
                          $sql-> execute(array($userid));
                          $theMsg = "<div class='alert alert-success'>" . $sql->rowCount() . 'Record Update </div>';
                           redirectHome($theMsg);

                      } else {

                          $theMsg = '<div class="alert alert-danger">This Id Not Exist</div>';
                          redirectHome($theMsg);
                      }

                  echo "</div>";

              }

        include $tpl . 'footer-copyright.php';
        include $tpl . 'footer.php';
    } else {

        header('Location: index.php');

        exit();
    }
