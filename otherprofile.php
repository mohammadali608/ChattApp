<?php 

require 'db.php';


    $id=$_POST['id'];


      $query="select * from tb_register where id=$id";
      
      $data=$con->prepare($query);
      $data->execute();

      $result=$data->get_result();

      $user=$result->fetch_assoc();

      echo '
      
         <div class="other-profile mt-2">
              <img src="'.$user['profile'].'">
              <span>'.$user['username'].'</span>
          </div>
      ';


?>