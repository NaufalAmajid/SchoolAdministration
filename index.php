<?php
if (!isset($_GET['admin'])) {
  header('location: page_student/login_student.php');
} else {
  header('location: index_admin.php');
}
