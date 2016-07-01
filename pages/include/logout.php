<?php
session_start();
unset($_SESSION['userid']);
session_start();
unset($_SESSION['email']);
session_start();
unset($_SESSION['name']);

session_destroy();
header('Location: ../../index.php');
?>