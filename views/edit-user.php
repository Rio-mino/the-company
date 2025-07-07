<?php
session_start();
require "../classes/User.php";

// create the object
$user_obj = new User;

// call the function to get user info
$user = $user_obj->getUser($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Edit User</title>
</head>
<body>
     <nav class="navbar navbar-expand bg-dark px-3 mb-5">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="dashboard.php" class="navbar-brand text-white text-decoration-none">
            <h1 class="h3 mb-0">The Company</h1>
        </a>

        <div class="d-flex align-items-center">
            <span class="navbar-text text-white me-3">
                <?= $_SESSION['full_name'] ?>
            </span>
            <form action="../actions/action-logout.php" method="post">
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <h2 class="text-center mb-4">EDIT USER</h2>

        <form action="../actions/action-edit-user.php" method="post" enctype="multipart/form-data">
          <div class="row justify-content-center mb-3">
            <div class="col-6">
                <?php
                    if($user['photo']){
                    ?>
                    <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="d-block mx-auto edit-photo">
                     <?php
                    }else{
                    ?>
                    <i class="fa-solid fa-user text-secondary d-block text-center fa-3x edit-icon pb-4"></i>
                    <?php
                    }
                    ?>

                    <input type="file" name="photo" class="form-control mb-2" accept="image/*">
             <div class="mb-3">
            <label for="first-name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control" value="<?= $user
            ['first_name'] ?>" autofocus>
          </div>

          <div class="mb-3">
            <label for="last-name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last-name" class="form-control" value="<?= $user
            ['last_name'] ?>" autofocus>
          </div>

          <div class="mb-3">
            <label for="Username" class="form-label">UserName</label>
            <input type="text" name="userame" id="fusername" class="form-control" value="<?= $user
            ['username'] ?>" maxlength="15" required>
          </div>

          <div class="text-end">
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
            <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
          </div>        
            
            </div>
            
          </div>

         
        </form>
    </main>
</body>
</html>