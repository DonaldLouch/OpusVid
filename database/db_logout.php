<?php

if (isset($_POST['submit'])) {
  session_start();
  session_unset();
  session_destroy();
  header('Location: ../resources/views/back-end/login.php?logged=success');
  exit();
}
