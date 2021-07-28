<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <title>TSF BANK</title>
  </head>

  <body>
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
              <li class="nav-item">
                <a class="nav-link" href="login.php" style="color : white;"><b>Transfer Money</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php" style="color : white;"><b>Admin Portal</b></a>
              </li>
            </ul>
        </div>
    </div>
</nav>
<!--navbar end-->
  
      <div class="container-fluid">
      <!-- Introduction section -->
            <div class="row intro py-1" style="background-color : #00A5F9;">
              <div class="col-sm-12 col-md">
                <div class="heading text-center my-5">
                  <h3>Welcome to</h3>
                  <h1>MY BANK</h1>
                </div>
              </div>
              <div class="col-sm-12 col-md img text-center">
                <img src="image/bank.png" class="img-fluid pt-2">
              </div>
            </div><br><br>

      <!-- Activity section -->
            <div class="row activity text-center">
                  <div class="col-md act">
                    <img src="image/transactionlogo1.png" class="img-fluid">
                    <br><br>
                    <a href="login.php"><button style="background-color : #bf4080;">Transfer Money</button></a>
                  </div>
                  <div class="col-md act">
                    <img src="image/transactionhistory.png" class="img-fluid">
                    <br><br>
                    <a href="login.php"><button style="background-color : #bf4080;">Transaction History</button></a>
                  </div>
            </div>
      </div><br>
      <?php include 'footer.php';?>
  </body>
</html>
