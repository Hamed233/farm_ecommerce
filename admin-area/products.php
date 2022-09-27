<?php

/*
===============================
   products Page
===============================
*/

 ob_start(); // OutPut Buffering Start

  session_start();

  $pageTitle = 'products';

if (isset($_SESSION['Username'])) {

        include 'init.php';

        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

        if ($do == 'Manage') {


                  // Select All Users Expect Admin

                   $sql = $con->prepare("SELECT
                                              products. *,
                                              categories.Cat_Name,
                                              users.username
                                        FROM
                                              products
                                        INNER JOIN
                                              categories
                                        ON    categories.Cat_Name = products.Cat_Name
                                        INNER JOIN
                                              users
                                        ON
                                              users.username = products.Member_Name
                                        ORDER BY product_ID DESC");
                   $sql->execute();
                   $products = $sql->fetchAll();

                   if (! empty($products)) {

       ?>

                      <h1 class="text-center global-h1">Manage products</h1>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="main-table text-center table table-bordered">
                                    <tr>
                                        <td>#ID</td>
                                        <td>Product Image</td>
                                        <td>Name</td>
                                        <td>Description</td>
                                        <td>Price</td>
                                        <td>Adding Data</td>
                                        <td>Category</td>
                                        <td>isHiring</td>
                                        <td>Username</td>
                                        <td>Control</td>
                                    </tr>

                                    <?php

                                         foreach($products as $product) {

                                             echo "<tr>";
                                                echo "<td>" . $product['product_ID']    . "</td>";
                                                echo "<td>";
                                                if (empty($product['Image'])) {
                                                    echo "Not Found Image";
                                                } else {
                                                    echo "<img style='width: 100px; height: 100px' src='upload/products/" . $product['Image'] . "' alt='' />";
                                                }

                                                echo "</td>";
                                                echo "<td>" . $product['Name']          . "</td>";
                                                echo "<td>" . $product['Description']   . "</td>";
                                                echo "<td>" . $product['Price']         . "</td>";
                                                echo "<td>" . $product['Add_Date']      . "</td>";
                                                echo "<td>" . $product['Cat_Name']      . "</td>";
                                                echo "<td>" . $product['hiring']        . "</td>";
                                                echo "<td>" . $product['username']      . "</td>";
                                                echo "<td>
                                                    <a href='products.php?do=Edit&productid= " . $product['product_ID'] . "' class='btn btn-success'><i class='fa fa-edit'></i> Edit  </a>
                                                    <a href='products.php?do=Delete&productid= " . $product['product_ID'] . "'' class='btn btn-danger confirm'><i class='fas fa-times'></i> Delete  </a>";
                                                    if ($product['Approve'] == 0) {
                                                        echo "<a href='products.php?do=Approve&productid= " . $product['product_ID'] . "'' class='btn btn-info activate'><i class='fa fa-check'></i> Approve  </a>";
                                                    }
                                               echo "</td>";
                                             echo "</tr>";
                                         }
                                        ?>

                                </table>
                            </div>

                           <a href = 'products.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add New Item</a>

                        </div>
                         <?php } else {
                               echo '<div class="container">';
                                   echo "<div class='nice_alert'><b>Sorry Not Found Any Record To Show</b></div>";

                                   echo "<a
                                          href = 'products.php?do=Add'
                                          class='btn btn-primary'>
                                          <i class='fa fa-plus'></i> Add New Item</a>";
                                echo "</div>";
                           } ?>




    <?php    } elseif ($do == 'Add') { ?>

                       <h1 class="text-center global-h1">Add New Products</h1>
                        <div class="container offset-3">
                            <form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
                                <!-- Start  Name Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="name"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Name Of The Item" />
                                        </div>
                                      </div>
                                <!-- End  Name Field -->

                                <!-- Start  Description Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="description"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 placeholder="Description Of The Item" />
                                        </div>
                                     </div>

                                <!-- End  Description Field -->

                                <!-- Start  Price Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="price"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Price Of The Item" />
                                        </div>
                                   </div>
                                <!-- End  Price Field -->

                                <!-- Start  Country Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="country"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Country Of Made" />
                                        </div>
                                   </div>
                                <!-- End  Country Field -->

                                <!-- Start Product Image -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="file"
                                                 name="product-img"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Product Image" />
                                        </div>
                                   </div>
                                <!-- End Product Image -->

                                <!-- Start  Status Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="status">
                                                <option value="not">Status</option>
                                                <option value="New">New</option>
                                                <option value="Like-New">Like New</option>
                                                <option value="Used">Used</option>
                                                <option value="Old">Old</option>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  Status Field -->

                                <!-- Start  hiring Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="hiring">
                                                <option value="0">Not Hiring</option>
                                                <option value="1">Hiring</option>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  hiring Field -->

                                <!-- Start  Member Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="member">
                                                <option value="not">Member</option>
                                                  <?php
                                                  $allMember = getAllFrom("*", "users", "", "", "UserID");

                                                       foreach ($allMember as $user) {
                                                           echo "<option value='" . $user['username'] . "'>" . $user['username'] . "</option>";
                                                       }

                                                    ?>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  Member Field -->

                                <!-- Start  Category Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="category">
                                                <option value="not">Category</option>
                                                  <?php
                                                  $allCats = getAllFrom("*", "categories", "", "", "Cat_ID");
                                                       foreach ($allCats as $cat) {
                                                           echo "<option value='" . $cat['Cat_Name'] . "'>" . $cat['Cat_Name'] . "</option>";
                                                       }
                                                    ?>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  Category Field -->


                                <!-- Start  submit Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input
                                                 type="submit"
                                                 value="Add Item"
                                                 class="btn btn-success btn-sm" />
                                        </div>
                                    </div>
                                <!-- End  submit Field -->
                            </form>
                        </div>


    <?php


        } elseif ($do == 'Insert') {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

               echo "<h1 class='text-center'>Update Item</h1>";
               echo "<div class='container'>";

                $productImg     = $_FILES['product-img'];
                $productImgName = $_FILES['product-img']['name'];
                $productImgSize = $_FILES['product-img']['size'];
                $productImgTmp  = $_FILES['product-img']['tmp_name'];
                $productImgType = $_FILES['product-img']['type'];

                // List Odf Allowed File Typed To Upload

                $productImgAllowedExtention = array("jpeg", "jpg", "png", "gif");

                // Get productImg Extention

                $productImgEtention = strtolower(end(explode('.', $productImgName)));

                // Get Variable From The Form
                $name       = $_POST['name'];
                $desc       = $_POST['description'];
                $price      = $_POST['price'];
                $country    = $_POST['country'];
                $status     = $_POST['status'];
                $member     = $_POST['member'];
                $hiring     = $_POST['hiring'];
                $category   = $_POST['category'];


                // Validate The Form

                $formErrors = array();

                if (empty($name)) {

                    $formErrors[] = 'Name Can\'t Be <strong> Empty</strong>';

                }

                if (! empty($productImgName) && ! in_array($productImgEtention, $productImgAllowedExtention)) {

                    $formErrors[] = 'This Extention Is Not <strong> Allowed </strong>';

                }

                 if (empty($productImgName)) {

                    $formErrors[] = 'Image Product is <strong> Required </strong>';

                }

                 if ($productImgSize > 4194304) {

                    $formErrors[] = 'This Image Can\'t Larger Than <strong> 4MB </strong>';

                }


                if (empty($desc)) {

                    $formErrors[] = 'Description Can\'t Be <strong> Empty</strong>';

                }

                if (empty($price)) {

                    $formErrors[] = 'Price Can\'t Be <strong> Empty</strong>';

                }

                if (empty($country)) {

                    $formErrors[] = 'Country Can\'t Be <strong> Empty</strong>';

                }

                if ($status == 'not') {

                    $formErrors[] = 'You Must Choose <strong>Status</strong>';

                }

                if ($member == 'not') {

                    $formErrors[] = 'You Must Choose <strong>Members</strong>';

                }

                if ($category == 'not') {

                    $formErrors[] = 'You Must Choose <strong>Category</strong>';

                }

                // Loop Into Errors Array And Echo It

                foreach($formErrors as $error) {

                     echo  '<div class="alert alert-danger">' . $error . '</div>';

                }

                // Check If There's No Proceed The Update Operation

                if (empty($formErrors)) {


                  $productImg = rand(0, 1000000) . '_' . $productImgName;

                  move_uploaded_file($productImgTmp, "upload\products\\" . $productImg);
                    // Check If User Exist In Database

                  $check = checkItem("Name", "products", $name);  // خاصة بفنكشن التشيك على الاسم اذا كان موجود أم لا

                    if ($check == 1) {

                        $theMsg =  "<div class='alert alert-danger'>Sorry This Name Is Exist</div>";
                        redirectHome($theMsg, 'back');

                    } else {

                             // Insert UserInfo In DB

                        $sql = $con->prepare("INSERT INTO
                                            products(Name, Description, Price, Country_Made, Image, Status, Add_Date, Cat_Name, hiring, Member_Name)
                                            VALUES(:zname, :zdesc, :zprice, :zcountry, :zproductImg, :zstatus, now(), :zcategory, :zhire, :zmember)");
                        $sql->execute(array (

                            'zname'      => $name,
                            'zdesc'      => $desc,
                            'zprice'     => $price,
                            'zcountry'   => $country,
                            'zproductImg'=> $productImg,
                            'zstatus'    => $status,
                            'zcategory'  => $category,
                            'zhire'      => $hiring,
                            'zmember'    => $member
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


        } elseif ($do == 'Edit') {


                    // Check If Get Request itemid Is Numeric & Get The Integer Value It

                   $productid = isset($_GET['productid']) && is_numeric($_GET['productid']) ? intval($_GET['productid']) : 0;

                    // Select All Data Depend On This ID

                    $sql   = $con->prepare("SELECT * FROM products WHERE product_ID = ?");

                    // Execute Query

                    $sql->execute(array($productid));

                    // Fetch The Data

                    $product   = $sql->fetch();

                    // The Row Count

                    $count = $sql->rowCount();

                    // If There Is Such ID Show The Form

                  if($count > 0) { ?>

                        <h1 class="text-center global-h1">Edit products</h1>
                        <div class="container offset-3">
                            <form class="form-horizontal" action="?do=Update" method="POST">
                            <input type="hidden" name="productid" value="<?php echo $productid ?>" />

                                <!-- Start  Name Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="name"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Name Of The Item"
                                                 value="<?php echo $product['Name'] ?>"/>
                                        </div>
                                      </div>
                                <!-- End  Name Field -->

                                <!-- Start  Description Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="description"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 placeholder="Description Of The Item"
                                                 value="<?php echo $product['Description'] ?>"/>
                                        </div>
                                     </div>
                                <!-- End  Description Field -->

                                <!-- Start  Price Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="price"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Price Of The Item"
                                                 value="<?php echo $product['Price'] ?>"/>
                                        </div>
                                   </div>
                                <!-- End  Price Field -->

                                <!-- Start  Country Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="text"
                                                 name="country"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 placeholder="Country Of Made"
                                                 value="<?php echo $product['Country_Made'] ?>" />
                                        </div>
                                   </div>
                                <!-- End  Country Field -->

                                <!-- Start Product Image -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                          <input
                                                 type="file"
                                                 name="product-img"
                                                 class="form-control"
                                                 autocomplete= "off"
                                                 required='required'
                                                 value="<?php echo $product['Image'] ?>"
                                                 placeholder="Product Image" />
                                        </div>
                                   </div>
                                <!-- End Product Image -->

                                <!-- Start  Status Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="status">
                                                <option value="new" <?php if ($product['Status']== 'new') { echo "selected"; } ?> >New</option>
                                                <option value="like-new" <?php if ($product['Status']== 'like-new') { echo "selected"; } ?> >Like New</option>
                                                <option value="used" <?php if ($product['Status']== 'used') { echo "selected"; } ?> >Used</option>
                                                <option value="old" <?php if ($product['Status']== 'old') { echo "selected"; } ?> >Old</option>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  Status Field -->

                                <!-- Start  hiring Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="hiring">
                                                <option value="0"<?php if($product['hiring'] == 0) { echo "selected"; } ?>>Not Hiring</option>
                                                <option value="1"<?php if($product['hiring'] == 1) { echo "selected"; } ?>>Hiring</option>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  hiring Field -->

                                <!-- Start  Member Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="member">
                                                  <?php
                                                     $sql = $con->prepare("SELECT * FROM users");
                                                     $sql->execute();
                                                     $users = $sql->fetchAll();
                                                       foreach ($users as $user) {
                                                           echo "<option value='" . $user['username'] . "'";
                                                             if ($product['Member_Name'] == $user['username'] ) { echo "selected"; }
                                                            echo ">" . $user['username'] . "</option>";
                                                       }

                                                    ?>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  Member Field -->

                                <!-- Start  Category Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-10 col-md-7">
                                            <select class="form-control" name="category">
                                                  <?php
                                                     $sql2 = $con->prepare("SELECT * FROM categories");
                                                     $sql2->execute();
                                                     $cats = $sql2->fetchAll();
                                                       foreach ($cats as $cat) {
                                                           echo "<option value='" . $cat['Cat_Name'] . "'";
                                                           if ($product['product_ID'] == $cat['Cat_ID']) { echo "selected"; }
                                                           echo ">" . $cat['Cat_Name'] . "</option>";
                                                       }

                                                    ?>
                                            </select>
                                        </div>
                                   </div>
                                <!-- End  Category Field -->

                                <!-- Start  submit Field -->
                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input
                                                 type="submit"
                                                 value="Save Item"
                                                 class="btn btn-success btn-lg" />
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


        }  elseif ($do == 'Update') {

            echo "<h1 class='text-center'>Update Item</h1>";
            echo "<div class='container'>";

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Get Variable From The Form

                $id      = $_POST['productid'];
                $name    = $_POST['name'];
                $desc    = $_POST['description'];
                $price   = $_POST['price'];
                $country = $_POST['country'];
                $img     = $_POST['product-img'];
                $status  = $_POST['status'];
                $cat     = $_POST['category'];
                $hire    = $_POST['hiring'];
                $member  = $_POST['member'];



                // Validate The Form

             // Validate The Form

                $formErrors = array();

                if (empty($name)) {

                    $formErrors[] = 'Name Can\'t Be <strong> Empty</strong>';

                }

                if (empty($desc)) {

                    $formErrors[] = 'Description Can\'t Be <strong> Empty</strong>';

                }

                if (empty($price)) {

                    $formErrors[] = 'Price Can\'t Be <strong> Empty</strong>';

                }

                if (empty($country)) {

                    $formErrors[] = 'Country Can\'t Be <strong> Empty</strong>';

                }

                if ($status == 'not') {

                    $formErrors[] = 'You Must Choose <strong>Status</strong>';

                }

                if ($member == 'not') {

                    $formErrors[] = 'You Must Choose <strong>Members</strong>';

                }

                if ($cat == 'not') {

                    $formErrors[] = 'You Must Choose <strong>Category</strong>';

                }

                // Loop Into Errors Array And Echo It

                foreach($formErrors as $error) {

                     echo  '<div class="alert alert-danger">' . $error . '</div>';

                }

                // Check If There's No Proceed The Update Operation

                if (empty($formError)) {

                     // Update The Database With This Information

                  $sql = $con->prepare("UPDATE
                                              products
                                        SET
                                               Name = ?,
                                               Description = ?,
                                               Price = ?,
                                               Country_Made = ?,
                                               Image = ?,
                                               Status = ?,
                                               Cat_Name = ?,
                                               hiring = ?,
                                               Member_Name = ?

                                        WHERE
                                               product_ID = ? LIMIT 1");
                  $sql->execute(array($name, $desc, $price, $country, $img, $status, $cat, $member, $hiring, $id ));

                     // Echo Success Message

                    $theMsg ="<div class='alert alert-success'>" . $sql->rowCount() . "Record Update</div>";
                    redirectHome($theMsg, 'back');
                }


            } else {

                $theMsg   = '<div class="alert alert-danger">Sorry you Can\'t Browse This Page Directory</div>';
                redirectHome($theMsg);
            }


               echo "</div>";


        } elseif ($do == 'Delete') {

                echo "<h1 class='text-center'>Delete Item</h1>";
                  echo "<div class='container'>";

                        // Check If Get Request Itemid Is Numeric & Get The Integer Value It

                       $productid = isset($_GET['productid']) && is_numeric($_GET['productid']) ? intval($_GET['productid']) : 0;

                        // Select All Data Depend On This ID

                        $check = checkItem('product_ID', 'products', $productid);

                        // If There Is Such ID Show The Form

                      if($check > 0) {

                          $sql = $con->prepare('DELETE FROM products WHERE product_ID = :zname');
                          $sql->bindparam(":zname", $productid);    // ربطهم ببعض
                          $sql-> execute();
                          $theMsg = "<div class='alert alert-success'>" . $sql->rowCount() . 'Delete Record</div>';
                           redirectHome($theMsg);

                      } else {

                          $theMsg = '<div class="alert alert-danger">This Id Not Exist</div>';
                          redirectHome($theMsg);
                      }

                  echo "</div>";


        } elseif ($do == 'Approve') {


                  echo "<h1 class='text-center'>Approve Item</h1>";
                  echo "<div class='container'>";

                        // Check If Get Request Userid Is Numeric & Get The Integer Value It

                       $productid = isset($_GET['productid']) && is_numeric($_GET['productid']) ? intval($_GET['productid']) : 0;

                        // Select All Data Depend On This ID

                        $check = checkItem('product_ID', 'products', $productid);

                        // If There Is Such ID Show The Form

                      if($check > 0) {

                          $sql = $con->prepare("UPDATE products SET Approve = 1 WHERE product_ID = ?");
                          $sql-> execute(array($productid));
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

         ob_end_flush();
?>
