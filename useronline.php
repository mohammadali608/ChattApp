<?php 

  session_start();
  require 'db.php';

    $id=$_SESSION['id'];

    $query="select * from tb_register where id!=$id";

    $data=$con->prepare($query);
    $data->execute();
    
    $result=$data->get_result();

    $users="";

    while($row=$result->fetch_assoc()){

          if($row['active']==0){

              $users.='
                <div class="users mt-1">
                    <div class="users-img float-left">
                      <img src="'.$row['profile'].'">
                      <span class="offline"></span>
                  </div>
                  <div class="float-left mt-4 ">
                    <span class="font-weight-bold">'.$row['username'].'</span>
                      <br>
                    <span>Hi how are you</span>   
                  </div>
                </div>
              
              ';
          }else{

            $users.='
            <div class="users mt-1">
                <div class="users-img float-left">
                  <img src="'.$row['profile'].'">
                  <span class="online"></span>
              </div>
              <div class="float-left mt-4 ">
                <span class="font-weight-bold">'.$row['username'].'</span>
                  <br>
                <span>Hi how are you</span>   
              </div>
            </div>
          
          ';
          }

    }

    echo $users;
  
?>