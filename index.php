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
      </div>
  </div>  




  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  
<script>

  $(document).ready(function(){

    setInterval(function(){

        
      $.ajax({
          url:"useronline.php",
          type:"get",
          success:function(data){

              $(".users").html(data)
              
          }

      })
    },500);

  })
</script>

</body>
</html>