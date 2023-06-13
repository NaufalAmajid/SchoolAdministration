<?php

// destroy all cookies
setcookie('code_user', '', time() - 3600, '/');
setcookie('username', '', time() - 3600, '/');
setcookie('name', '', time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');
header('Location: ../index.php');