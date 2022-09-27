<?php

   // i must Put (ob_start()) before (session_start).

   ob_start(); // Output Buffering start


   session_start();

    if (isset($_SESSION['Username'])) {

        $pageTitle =  'Dashboard';  // Special 'function'

        include 'init.php';

        /* Start Dashboard Page */

            $numUsers = 6;  // Number Of The Latest Users
            $latestUsers  = getLatest("*", "users", "UserID", $numUsers); // Latest Users Array

            $numProducts = 6;  // Number Of The Latest Items
            $latestProducts = getLatest("*", "products", "product_ID", $numProducts);  // Latest Items Array

        ?>
        <div class="home-stats">
          <div class="container text-center">
             <h2 class="page-heading">Dashboard</h2>
              <div class="row">
                  <div class="col-md-3">
                     <div class="stat st-members">
                          <i class="fa fa-users dash_i"></i>
                         <div class="info">
                           Total Members
                             <span>
                                 <a href= "members.php"><?php echo countItems('UserID', 'users') ?></a>
                             </span>

                         </div>
                      </div>
                   </div>

                  <div class="col-md-3">
                     <div class="stat st-pending">
                         <i class="fa fa-user-plus dash_i"></i>
                         <div class="info">
                            Pending Members
                             <span>
                                 <a href='members.php?do=Manage&page=Pending'><?php echo checkItem('RegStatus', 'users', 0 ) ?></a>
                             </span>
                         </div>
                      </div>
                   </div>

                  <div class="col-md-3">
                     <div class="stat st-items">
                         <i class="fa fa-tag dash_i"></i>
                         <div class="info">
                            Total Products
                             <span>
                                 <a href="products.php"><?php echo countItems('product_ID', 'products') ?></a>
                             </span>
                          </div>
                      </div>
                   </div>

                  <div class="col-md-3">
                     <div class="stat categories-count">
                         <div class="info">
                            Total Categories
                             <span>
                                <a href="categories.php"><?php echo countItems('Cat_ID', 'categories') ?></a>
                             </span>
                         </div>
                      </div>
                   </div>
              </div>
           </div>
         </div>

       <div class="container">
         <div class="first-block">
            <div class="row">
             <div class="col-sm-6 text-center">
               <div class="chart-one">
                <label class="label label-success">Area Chart</label>
                <div class="area-chart" id="area-chart" ></div>
              </div>
             </div>
             <div class="col-sm-6 text-center">
                <div class="panel panel-card">
                     <div class="panel-heading">
                       <i class="fa fa-tag"></i> Latest <?php echo $numProducts ?> Products
                        <span class="toggle-info pull-right">
                            <i class="fa fa-plus fa-lg"></i>
                         </span>
                     </div>
                     <div class="panel-body">
                       <div class="table-responsive">
                          <table class="table latest-product">
                            <thead class="bg-light">
                              <tr class="border-1">
                                <th class="border-0">Product Name</th>
                                <th class="border-0">Categories</th>
                                <th class="border-0">Customer</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                 if (! empty($latestProducts)) {
                                   foreach ($latestProducts as $product) {
                                     echo '<tr>';
                                      echo '<td>' . $product['Name'] . '</td>';
                                      echo '<td>' . $product['Cat_Name'] . '</td>';
                                      echo '<td>' . $product['Member_Name'] . '</td>';
                                     echo '</tr>';
                                   }
                                 } else {
                                     echo "<div class='nice_alert'>Sorry Not Found Any <b>Items</b></div>";
                                 }
                             ?>
                            </tbody>
                          </table>
                       </div>
                    </div>
                </div>
           </div>
         </div><!-- #first-block -->

           <div class="second-block">
             <div class="row">
               <div class="col-sm-6 text-center">
                  <div class="panel panel-card">
                       <div class="panel-heading">
                         <i class="fa fa-users"></i> Latest  <?php echo $numUsers ?> Registerd Users
                          <span class="toggle-info pull-right">
                              <i class="fa fa-plus fa-lg"></i>
                           </span>
                       </div>
                       <div class="panel-body">
                         <div class="table-responsive">
                            <table class="table latest-product">
                              <thead class="bg-light">
                                <tr class="border-1">
                                  <th class="border-0">Username</th>
                                  <th class="border-0">Kind User</th>
                                  <th class="border-0">Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                   if (! empty($latestUsers)) {
                                     foreach ($latestUsers as $user) {
                                       echo '<tr>';
                                        echo '<td>' . $user['username'] . '</td>';
                                        echo '<td>' . $user['KindUser'] . '</td>';
                                        echo '<td>' . $user['date_register'] . '</td>';
                                       echo '</tr>';
                                     }
                                   } else {
                                       echo "<div class='nice_alert'>Sorry Not Found Any <b>Users</b></div>";
                                   }
                               ?>
                              </tbody>
                            </table>
                         </div>
                      </div>
                  </div>
             </div>
               <div class="col-sm-6 col-sm-offset-3 text-center">
                 <div class="second-chart">
                  <label class="label label-success">Pie Chart</label>
                  <div id="pie-chart" ></div>
                 </div>
               </div>
             </div>
           </div>

     </div><!-- #container -->
</div>

<?php

        /* End Dashboard Page */
        include $tpl . 'footer-copyright.php';
        include $tpl . 'footer.php';
    } else {

        header('Location: index.php');

        exit();
    }

ob_end_flush();
?>
