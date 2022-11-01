<?php 

  session_start();
  require 'db.php';

  $id=$_SESSION['id'];

  $search="";

    if(isset($_POST['search'])){

        $search=$_POST['search'];
    }

  
      if($search!=""){

        $query="select * from tb_register where id!=$id and username like '$search%'";

        Users_Online($con,$query,$id);
      }else{
        $query="select * from tb_register where id!=$id";
        Users_Online($con,$query,$id);
      }
    



 function last_msg($con,$reciever_id,$id){


    $query1="SELECT * FROM tb_msgs where sender_id=$id and reciever_id=$reciever_id or  sender_id=$reciever_id and reciever_id=$id order by id desc limit 1  ";
    $data1=$con->prepare($query1);
    $data1->execute();

    $result1=$data1->get_result();

    $users=$result1->fetch_assoc();

      return $users['message'];

 }     
    

    
    function Users_Online($con,$query,$id){

      $data=$con->prepare($query);
    $data->execute();
    
    $result=$data->get_result();

    $users="";

    while($row=$result->fetch_assoc()){

          if($row['active']==0){

              $users.='
                <div class="users mt-1"  data-id="'.$row['id'].'">
                    <div class="users-img float-left">
                      <img src="'.$row['profile'].'">
                      <span class="offline"></span>
                  </div>
                  <div class="float-left mt-4 ">
                    <span class="font-weight-bold">'.$row['username'].'</span>
                      <br>
                    <span>'.last_msg($con,$row['id'],$id).'</span>   
                  </div>
                </div>
              
              ';
          }else{

              
            $users.='
            <div class="users mt-1" data-id="'.$row['id'].'" >
                <div class="users-img float-left">
                  <img src="'.$row['profile'].'">
                  <span class="online"></span>
              </div>
              <div class="float-left mt-4 ">
                <span class="font-weight-bold">'.$row['username'] .'</span>
                  <br>
                <span>'.last_msg($con,$row['id'],$id).'</span>   
              </div>
            </div>
          
          ';
          }
        }
  
    echo $users;
  
    }

    
    
?>