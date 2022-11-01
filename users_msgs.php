<?php 
  require 'db.php';
  session_start();

  $reciever_id=$_POST['reciever_id'];
  $sender_id=$_SESSION['id'];

  $query="SELECT * FROM tb_msgs where sender_id=$sender_id and reciever_id=$reciever_id or  sender_id=$reciever_id and reciever_id=$sender_id order by id desc";
  $data=$con->prepare($query);
  $data->execute();

  $result=$data->get_result();

  $users='';

  while ($row=$result->fetch_assoc()) {


        if($row['sender_id']==$sender_id){

          $users.='
          
          <div class="containers">
              <img src="'.User_Profile($con,$sender_id).'" alt="Avatar"  >
              <p>'.$row['message'].'</p>
          <span class="time-right">'.$row['msg_time'].'</span>
        </div>
          ';

        }else if($row['sender_id']==$reciever_id){
          $users.='
          <div class="containers darker">
          <img src="'.User_Profile($con,$reciever_id).'" alt="Avatar" class="right"  >
          <p>H'.$row['message'].'</p>
          <span class="time-left">'.$row['msg_time'].'</span>
        </div>
          ';

        }else{


        }


  }

  echo $users;


function User_Profile($con,$id){


  $query="select * from tb_register where id=$id";
      
  $data=$con->prepare($query);
  $data->execute();

  $result=$data->get_result();

  $user=$result->fetch_assoc();

  return $user['profile'];
}

?>