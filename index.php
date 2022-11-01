<?php 

  session_start();

    if(!isset($_SESSION['id'])){

        header('location:login.php');
        exit;
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Title</title>
</head>
<body>

    
  <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-6 col-12">
            <div class="user-profile">
                <img src="<?php echo $_SESSION['profile'];?>">
                <span><?php echo $_SESSION['name'];?></span>
                <a href="logout.php" class="btn btn-danger  float-right  m-2" >Logout </a>
            </div>
            <div class="user-online mt-1">
              <div class="user-input">
                  <input type="text" id="search" placeholder="search users">
              </div>
              <div class="users-chat-online">
                
                <div class="users mt-1">
                </div>
                
                
              </div>
              
        
            </div>
        </div>
        <div class="col-xl-8 col-lg-7 col-md-6 col-12">
                <div class="other-profile mt-2">
                  
              </div>
      <div class="user-info mt-2"> 
            
          <div class="user-msgs mt-2">
              
              
              <div class="containers">
              </div>
              
              
          
            </div>

            <div class="row mt-2">
              <div class="ml-3 col-md-9 col-9">
                <input type="text" id="msg" placeholder="enter something" class="form-control">
              </div>
              <div class="col-md-2 col-2 float-left">
                <button id="send">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i>

                </button>  
              </div>
            </div>
        </div>  

        </div>
      
        </div>
        
      </div>
  </div>  




<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>

$(document).ready(function(){





      var reciever_id=0;

      $(document).on("click",".users",function(){

          var id=$(this).data('id');
            if(id!=undefined){
                
             reciever_id=id; 
              $.ajax({
                url:"otherprofile.php",
                type:"post",
                data:{id:id},
                success:function(data){

                  $(".other-profile").html(data);
                }
              })
            } 
      })


        setInterval(function(){

            if(reciever_id!=0){

              $.ajax({
                  url:"users_msgs.php",
                  type:"post",
                  data:{reciever_id:reciever_id},
                  success:function(data){

                      $(".containers").html(data);
                  }

              })
            }

        },500)



      $("#send").on('click',function(){

          var msg=$('#msg').val();

          $.ajax({
            url:'insert.php',
            type:'post',
            data:{reciever_id:reciever_id,msg:msg},
            success:function(){
              alert('inserted');
              $("#msg").val('');
            }
          })


      })

    setInterval(function(){
      
      var search=$("#search").val();
      
        
        if(search!=""){

          $.ajax({
          url:"useronline.php",
          type:"post",
          data:{search:search},
          success:function(data){
              $(".users").html(data)
          }
      })
        }else{

          $.ajax({
          url:"useronline.php",
          type:"get",
          success:function(data){
              $(".users").html(data)
          }
      })
        }
      
      
    },500);
  })
</script>

</body>
</html>