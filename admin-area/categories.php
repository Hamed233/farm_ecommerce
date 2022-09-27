<?php

/*
===============================
   Category Page
===============================
*/

  // ob_start(); // OutPut Buffering Start

   session_start();

  $pageTitle = 'Categories';

if (isset($_SESSION['Username'])) {

        include "init.php";

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage') {

            $sort = 'ASC';

            $sort_array = array('ASC', 'DESC');

            if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {

                $sort = $_GET['sort'];

            }

            $stmt= $con->prepare("SELECT * FROM categories ORDER BY ordering $sort");
            $stmt->execute();
            $cats = $stmt->fetchAll();
             if (! empty($cats)) {
   ?>

             <h1 class='text-center global-h1'>Manage Categories</h1>
               <div class="container categories">
                 <div class="table-responsive">
                     <table class="main-table text-center table table-bordered">
                         <tr>
                             <td>#ID</td>
                             <td>Cat Name</td>
                             <td>Cat Description</td>
                             <td>Brand</td>
                             <td>Control</td>
                         </tr>

                         <?php

                              foreach($cats as $cat) {

                                  echo "<tr>";
                                     echo "<td>" . $cat['Cat_ID']    . "</td>";
                                     echo "<td>" . $cat['Cat_Name']          . "</td>";
                                     echo "<td>" . $cat['Cat_Description']   . "</td>";
                                     echo "<td>";
                                        if (empty($cat['cate_img_brand'])) {
                                             echo "Not Found Image";
                                         } else {
                                             echo "<img style='width: 100px; height: 100px' src='upload/categories/categories_brand/" . $cat['cate_img_brand'] . "' alt='' />";
                                         }

                                      "</td>";
                                     echo "<td>
                                         <a href='categories.php?do=Edit&catid=" . $cat['Cat_ID'] . "' class='btn btn-primary'><i class='fa fa-edit'></i> Edit</a>
                                         <a href='categories.php?do=Delete&catid=" . $cat['Cat_ID'] . "' class='confirm btn btn-danger'><i class='fas fa-times'></i> Remove</a>";
                                    echo "</td>";
                                  echo "</tr>";
                              }
                             ?>

                     </table>
                 </div>

                   <a class="add_category btn btn-primary" href="categories.php?do=Add"><i class="fa fa-plus"></i> Add New Category</a>
                </div>
               <?php } else {
                       echo '<div class="container">';
                           echo "<div class='nice_alert'>Sorry Not Found Any Record To Show</div>";

                           echo "<a
                                  href = 'categories.php?do=Add'
                                  class='btn btn-primary'>
                                  <i class='fa fa-plus'></i> Add New Category</a>";
                        echo "</div>";
                   } ?>

 <?php

        } elseif ($do == 'Add') { ?>

                        <h1 class="text-center global-h1">Add New Category</h1>

                        <div class="container form-content offset-3">
                            <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
                                <!-- Start  Name Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="text" name="name" class="form-control" autocomplete= "off" required='required' placeholder="Name Of The Category">
                                        </div>
                                   </div>
                                <!-- End  Name Field -->

                                <!-- Start  Description Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <input type="text" name="description" class="form-control" placeholder="Description The Category"/>
                                        </div>
                                    </div>
                                <!-- End  Description Field -->

                                <!-- Start Categories Brand -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="file"
                                                 name="cat_img"
                                                 class="form-control"
                                                 required='required'
                                                 placeholder="Category Image" />
                                        </div>
                                   </div>
                                <!-- End Categories Brand -->

                                <!-- Start  Visibltiy Field -->
                                    <div class="form-group form-group-lg">
                                      <label class="col-sm-2 control-label">Visible</label>
                                        <div class="col-sm-10 col-md-7">
                                            <div>
                                              <input id="vis-yes" type="radio" name="visiblity" value="0" checked />
                                                <label for="vis-yes">Yes</label>
                                            </div>
                                            <div>
                                              <input id="vis-no" type="radio" name="visiblity" value="1" />
                                                <label for="vis-no">No</label>
                                            </div>

                                        </div>
                                    </div>
                                <!-- End  Visiblity Field -->

                                <!-- Start  submit Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input type="submit" value="Add New Categories" class="btn btn-success btn-lg" />
                                        </div>
                                    </div>
                                <!-- End  submit Field -->

                            </form>
                        </div>


    <?php


        } elseif ($do == 'Insert') {

                  // Insert Category Page


            if($_SERVER['REQUEST_METHOD'] == 'POST') {

               echo "<h1 class='text-center'>Update Category</h1>";
               echo "<div class='container'>";

               $cateImg     = $_FILES['cat_img'];
               $cateImgName = $_FILES['cat_img']['name'];
               $cateImgSize = $_FILES['cat_img']['size'];
               $cateImgTmp  = $_FILES['cat_img']['tmp_name'];
               $cateImgType = $_FILES['cat_img']['type'];

               // List Odf Allowed File Typed To Upload

               $cateImgAllowedExtention = array("jpeg", "jpg", "png", "gif");

               // Get cateImg Extention

               $cateImgEtention = strtolower(end(explode('.', $cateImgName)));

                // Get Variable From The Form

                $name              = $_POST['name'];
                $description       = $_POST['description'];
                $visiblity         = $_POST['visiblity'];


                // Validate The Form

                $formErrors = array();

                if (empty($name)) {

                    $formErrors[] = 'Category Name Can\'t Be <strong> Empty</strong>';

                }

                if (! empty($cateImgName) && ! in_array($cateImgEtention, $cateImgAllowedExtention)) {

                    $formErrors[] = 'This Extention Is Not <strong> Allowed </strong>';

                }

                 if (empty($cateImgName)) {

                    $formErrors[] = 'Image category is <strong> Required </strong>';

                }

                 if ($cateImgSize > 4194304) {

                    $formErrors[] = 'This Image Can\'t Larger Than <strong> 4MB </strong>';

                }


                if (empty($description)) {

                    $formErrors[] = 'Description Can\'t Be <strong> Empty</strong>';

                }


                // Loop Into Errors Array And Echo It

                foreach($formErrors as $error) {

                     echo  '<div class="alert alert-danger">' . $error . '</div>';

                }

                // Check If There's No Proceed The Update Operation

                if (empty($formErrors)) {


                  $cateImg = rand(0, 1000000) . '_' . $cateImgName;

                  move_uploaded_file($cateImgTmp, "upload\categories\categories_brand\\" . $cateImg);
                    // Check If User Exist In Database


                  $check = checkItem("Cat_Name", "categories", $name);  // خاصة بفنكشن التشيك على الاسم اذا كان موجود أم لا

                    if ($check == 1) {

                        $theMsg =  "<div class='alert alert-danger'>Sorry This Category Is Exist</div>";
                        redirectHome($theMsg, 'back');

                    } else {

                             // Insert CategoryInfo In DB

                        $sql = $con->prepare("INSERT INTO
                                            categories(Cat_Name, Cat_Description, cate_img_brand)
                                            VALUES(:zname, :zdescription, :zcatImg )");
                        $sql->execute(array (

                            'zname'            => $name,
                            'zdescription'     => $description,
                            'zcatImg'          => $cateImg
                        ));



                          echo "<div class='container'>";
                         // Echo Success Message

                         $theMsg = "<div class='alert alert-success'>" . $sql->rowCount() . 'Record Inserted</div>';
                         redirectHome($theMsg);


                          echo "</div>";
                       }
                     }

                   } else {

                         // Echo Failed Message

                         $theMsg = "<div class='alert alert-Danger'>Sorry Yoy Can't Browse This Page Directly</div";
                         redirectHome($theMsg, 'back');

            }


        } elseif ($do == 'Edit') {


                    // Check If Get Request Catid Is Numeric & Get The Integer Value It

                   $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

                    // Select All Data Depend On This ID

                    $sql = $con->prepare("SELECT * FROM categories WHERE Cat_ID = ? ");

                    // Execute Query

                    $sql->execute(array($catid));

                    // Fetch The Data

                    $cat  = $sql->fetch();

                    // The Row Count

                    $count = $sql->rowCount();

                    // If There Is Such ID Show The Form

                  if($count > 0) { ?>

                        <h1 class="text-cente global-h1">Edit Category</h1>

                        <div class="container form-content offset-3">
                            <form class="form-horizontal" action="?do=Update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="catid" value="<?php echo $catid ?>" />
                                <!-- Start  Name Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input type="text" name="name" class="form-control" required='required' placeholder="Name Of The Category" value="<?php echo $cat['Cat_Name'] ?>">
                                        </div>
                                   </div>
                                <!-- End  Name Field -->

                                <!-- Start  Description Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <input type="text" name="description" class="form-control" placeholder="Description The Category" value="<?php echo $cat['Cat_Description'] ?>"/>
                                        </div>
                                    </div>
                                <!-- End  Description Field -->

                                <!-- Start Categories Brand -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="file"
                                                 name="cat_img"
                                                 class="form-control"
                                                 required='required'
                                                 value="<?php echo $cat['cate_img_brand'] ?>"
                                                 placeholder="Category Image" />
                                        </div>
                                   </div>
                                <!-- End Categories Brand -->

                                <!-- Start  submit Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input type="submit" value="Save Category" class="btn btn-success btn-lg" />
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

            echo "<h1 class='text-center'>Update Category</h1>";
            echo "<div class='container'>";

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Get Variable From The Form

                $id      = $_POST['catid'];
                $name    = $_POST['name'];
                $desc    = $_POST['description'];
                $catImg  = $_FILES['cat_img'];

                     // Update The Database With This Information

                  $sql = $con->prepare("UPDATE
                                            categories
                                        SET
                                            Cat_Name = ?,
                                            Cat_Description = ?,
                                            cate_img_brand = ?,
                                        WHERE
                                             Cat_ID = ?");
                  $sql->execute(array($name, $desc, $catImg, $id));

                     // Echo Success Message

                    $theMsg ="<div class='alert alert-success'>" . $sql->rowCount() . "Record Update</div>";
                    redirectHome($theMsg, 'back');


            } else {

                $theMsg   = '<div class="alert alert-danger">Sorry you Can\'t Browse This Page Directory</div>';
                redirectHome($theMsg);
            }


               echo "</div>";


        } elseif ($do == 'Delete') {

                 echo "<h1 class='text-center'>Delete Category</h1>";
                  echo "<div class='container'>";

                        // Check If Get Request Catid Is Numeric & Get The Integer Value It

                       $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']) : 0;

                        // Select All Data Depend On This ID

                        $check = checkItem('Cat_ID', 'categories', $catid);

                        // If There Is Such ID Show The Form

                      if($check > 0) {

                          $sql = $con->prepare('DELETE FROM categories WHERE Cat_ID = :zid');
                          $sql->bindparam(":zid", $catid);    // ربطهم ببعض
                          $sql-> execute();
                          $theMsg = "<div class='alert alert-success'>" . $sql->rowCount() . 'Delete Record</div>';
                           redirectHome($theMsg);

                      } else {

                          $theMsg = '<div class="alert alert-danger">This Id Not Exist</div>';
                          redirectHome($theMsg, 'back');
                      }

                  echo "</div>";


        }

        include $tpl .'footer-copyright.php';
        include $tpl .'footer.php';

        } else {

            header('Location: index.php');
            exit();

    }


      //  ob_end_flush(); // Release The Output
?>
