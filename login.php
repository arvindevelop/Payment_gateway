<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/create.css">
    <title>Login</title>
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
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b style="color:yellow;">MY BANK</b></a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">  </ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php" style="color : white;"><b>Home</b></a>
              </li>
             <li class="nav-item">
                <a class="nav-link" href="createuser.php" style="color : white;"><b>Create Account</b></a>
              </li>
            </ul>
        </div>
    </div>
</nav>
<!--navbar end-->

<!--main content-->
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
                <input class="app-form-button btn btn-info" style="background-color : #00cec9;" type="submit" value="LOG IN" name="submit"></input>
                <input class="app-form-button btn btn-info" style="background-color : #00cec9;" type="reset" value="RESET" name="reset"></input>
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

</body>
</html>
