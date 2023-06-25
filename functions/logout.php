<?php

// destroy all cookies
setcookie('code_user', '', time() - 86400, '/');
setcookie('username', '', time() - 86400, '/');
setcookie('name', '', time() - 86400, '/');
setcookie('role', '', time() - 86400, '/');
header('Location: ../index.php?admin');