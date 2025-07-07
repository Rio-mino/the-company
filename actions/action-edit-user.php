<?php

include "../classes/User.php";

// create object
$user = new User;

// call the update function
$user->update($_POST, $_FILES);

?>