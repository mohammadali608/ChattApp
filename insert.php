<?php 

  require 'db.php';
  session_start();

  $sender_id=$_SESSION['id'];
  $reciever_id=$_POST['reciever_id'];
  $msg=$_POST['msg'];

  $query="insert into tb_msgs (sender_id,reciever_id,message) values($sender_id,$reciever_id,'$msg')";

  $data=$con->prepare($query);
  $data->execute();
?>