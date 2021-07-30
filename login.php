<?php 
  session_start();
      
    //create connection
    
require_once"./includes/dbconfig.php";
  
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <title>HMS - Hospital Management System</title>
    <!-- Bootstrap Core CSS -->
    <!-- Bootstrap Core CSS -->
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- chartist CSS -->
    <link href="./assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="./assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="./assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- font icon -->
  <link href="scss/icons/elegant-icons-style.css" rel="stylesheet" />
  <link href="scss\icons\font-awesome\css/font-awesome.min.css" rel="stylesheet" />
  <link href="scss/icons/daterangepicker.css" rel="stylesheet" />
  <link href="scss/icons/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="scss/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>



    <div class="login-page">
      
  <div class="form">
     <i class="mdi mdi-lock-outline " style="font-size: 48px !important;color: #582d81e6 !important; width: 130px;"></i>
        <form method="POST" action="">         
            <?php
                if(isset($_POST['subbtn']))
                     {
                          //the values in the boxes
                          $username = $_POST['username'];
                          $password = $_POST['password'];     
                          
                          $sql = "SELECT * FROM logintb WHERE username='$username' AND password='$password'";
                          $result = mysqli_query($db, $sql);
                          
                          if(mysqli_num_rows($result) == 1){
                            $_SESSION['message'] = "You are now logged in";
                            $_SESSION['username'] = $username;
                            ?><meta http-equiv="refresh" content="2;url=index.php" /><?php
                             //redirects to members page
                                           ?><div class="container"  id="validatn">
                                                <div class="alert alert-success alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Success!</strong> You are now logged in!
                                                </div> 
                                              </div>
                                              <?php
                          }else{
                            
                                              ?><div class="container"  id="validatn">
                                                <div class="alert alert-danger alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Error!</strong> Login Details combination incorrect!
                                                </div> 
                                              </div>
                                              <?php
                          
                          }
                          
                        } 

?>
          <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="Username" name="username" required="required">
          </div>
          
          <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Password" name="password" required="required">
          </div>

          <input type="submit" name="subbtn" class="btn btn-success" value="Login">
    </form>
   <p>Developed by <a href="https://fb.com/flochristos">Flochristos</p>
  </div>
</div> 
<script type="text/javascript">
  $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>