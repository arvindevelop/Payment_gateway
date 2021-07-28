<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" type="text/css" href="css/create.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    
</head>

<body style="background-color : #fab1a0;">
<?php
    include('config.php');
    session_start();
    if(isset($_POST['submit']))
    {
                    
        $email = $_POST['email'];
        $password = $_POST['password'];
                
        $sql="SELECT * from users";
        $result=mysqli_query($conn,$sql);
        
        $flag = 0;
        while($rows = mysqli_fetch_assoc($result)){
            if($rows['email'] == $email && $rows['password'] == $password)
            {
                if($rows['email'] != "adminmybank@mybank.com")
                {
                    $flag = 1;
                    $_SESSION['name'] = $rows['name'];
                    $_SESSION['logged_in'] = 'true';
                        $id = $rows['id'];
                        $email = $rows['email'];
                        echo "<script> alert('Logged In Successfully');
                        window.location='selecteduserdetail.php?id=$id';
                        </script>";
                }
                else
                {
                    $flag = 1;
                    $_SESSION['name'] = $rows['name'];
                    $_SESSION['logged_in'] = 'true';
                        header("Location: transfermoney.php");
                }
            }
        }
        if(!$flag)
        {
            echo "<script>window.alert('Email or Password incorrect')</script>";
        }
    }
?>

<!-- navbar --> 
<nav class="navbar navbar-expand-md " style="background-color : grey;">
      <a class="navbar-brand" href="index.php" style="color : #FFCD00;font-weight:bold;font-size:largest"><b>MY BANK</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php" style="color : white;"><b>Back to Home</b></a>
              </li>
          </div>
       </nav>
<!--navbar end-->

<h2 class="text-center pt-4" style="color : indigo;">LOG IN</h2>
<br>

<div class="background1">
    <div class="container1">
      <div class="screen">
        <div class="screen-body">
          <div class="screen-body-item text-center">
            <img class="img" src="image\user-circle-solid.svg" width="100px" height="100px" style="border: none; border-radius: 40%;">
          <div class="screen-body-item">
            <form class="app-form" method="post">
              <div class="app-form-group">
                <input class="app-form-control" placeholder="EMAIL" type="email" name="email" required>
              </div>
              <div class="app-form-group">
                <input class="app-form-control" placeholder="PASSWORD" type="password" name="password" required>
              </div><br>
              <div class="app-form-group float-right">
                <input class="app-form-button btn btn-info" type="submit" value="LOG IN" name="submit"></input>
                <input class="app-form-button btn btn-info" type="reset" value="RESET" name="reset"></input>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div><br>
<!--footer-->
<?php include 'footer.php';?>
<!--footer end-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>