<?php 
  session_start();
  require 'db.php';

  $id=$_SESSION['id'];

  $query="update tb_register set active=0 where id=$id";
  $data=$con->prepare($query);
  $data->execute();

  session_destroy();
  header('location:login.php');
  exit;



?>