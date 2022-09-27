

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <a class="navbar-brand" href="dashboard.php"><img src="<?php echo $img; ?>zeed.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Members</a>
      </li>
      <li class="nav-item dropdown navbar-dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <?php

           $userID = $_SESSION['ID'];

           $getAll = $con->prepare("SELECT * FROM users WHERE UserID = ? ORDER BY UserID");
           $getAll->execute(array($userID));
           $avatar = $getAll->fetch();


             if (empty($avatar['avatar'])) {
                 echo "<img class='avatar' src='upload/avatars/avatar2.png' alt='' />";
             } else {
                 echo "<img class='avatar' src='upload/avatars/" . $avatar['avatar'] . "' alt='' />";
             }

              echo $_SESSION['Username']; ?>

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../front-area/index.php">Visit Website</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
