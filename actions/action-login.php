<?php

include "../classes/User.php";

// create or instantiate object
$user = new User;

// call the method
$user->login($_POST);
?>