<?php
  session_start();
  require_once('lib/mainClass.php');
  
  $myApp = new myApp();
  $myApp->mainView();
?>