<?php

session_start();
session_destroy();
// session_unset('publisher_id');
// session_unset('publisher_email');

header('Location: login.php');

?>