<?php

// destroy all cookies
setcookie('name_student', '', time() - 86400, '/');
setcookie('code_class', '', time() - 86400, '/');
setcookie('nisn', '', time() - 86400, '/');
setcookie('code_student', '', time() - 86400, '/');
header('Location: ../index_student.php');