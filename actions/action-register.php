<?php

include "../classes/User.php";

// create object
$user = new User;

// call the function
$user->store($_POST);

// **
// The $_POST hold all the data
// we have coming from the register form
// First Nmae, Last Name, Username, Password
// **
// example
// $username = $_POST['username'];
// $password = $_POST['password'];
?>