<?php

session_start();
session_destroy();
// session_unset('admin_id');
// session_unset('admin_email');

header('Location: login.php');

?>