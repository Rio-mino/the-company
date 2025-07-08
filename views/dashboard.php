<?php 

session_start();

require "../classes/User.php";


// create object
$user_obj = new User;

// call the function
$all_users = $user_obj->getAllUsers();



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

    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand bg-dark px-3 mb-5">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="dashboard.php" class="navbar-brand text-white text-decoration-none">
            <h1 class="h3 mb-0">The Compan OOP</h1>
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

<main class="main row justify-content-center gx-0">
    <div class="col-6">
        <h2 class="text-center">User Lists</h2>
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Action Buttons</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($user = $all_users->fetch_assoc()){
                    ?>
                    <tr>
                        <td>
                            <?php
                            if($user['photo']){
                                ?>
                                <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="d-block mx-auto dashboard-photo">
                                <?php
                            }else{
                            ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center fa-3x dashboard-icon"></i>
                            <?php
                            }
                            ?>
                        </td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <?php
                             if($_SESSION['id'] == $user['id']){
                                ?>
                                <a href="edit-user.php" class="btn btn-outline-warning" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="delete-user.php" class="btn btn-outline-danger" title="Delete">
                                <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php
                             }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>