<?php
include 'config.php';

if(isset($_POST['submit']))
{
    //session_start();
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`id`, `sender`, `receiver`, `balance`) VALUES ('$from','$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                    
                    $_SESSION['logged_in'] = 'true';
                    
                    
                    echo "<script> alert('Transaction Successfully');
                    window.location='selecteduserdetail.php?id=$from';
                    </script>";
                    
                }
                else
                {
                    echo "error";
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body style="background-color : #E59866 ;">
 
    <!-- navbar --> 
    <nav class="navbar navbar-expand-md " style="background-color : grey;">
        <a class="navbar-brand" href="index.php" style="color : #FFCD00;font-weight:bold;font-size:largest"><b>MY BANK</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color : white;"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color : white;"><b><?php
                        session_start();

                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 'true')
                        {
                            $name = $_SESSION['name'];
                            echo  $name ;
                        }
                        else
                        {
                            ?>
                            <a href="#">Log out</a>
                        <?php
                        }
                        ?></b></a>
                </li>
            </div>
        </nav>
    <!--navbar end-->

    <!--main container-->
	<div class="container">
        <h2 class="text-center pt-4" style="color : indigo;">Transfer Money</h2>
            <?php
                include 'config.php';
                //session_start();
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
                <div>
                    <table class="table table-striped table-condensed table-bordered">
                        <tr style="color : black;">
                            <th class="text-center">User Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Balance</th>
                        </tr>
                        <tr style="color : black;">
                            <td class="py-2"><?php echo $rows['id'] ?></td>
                            <td class="py-2"><?php echo $rows['name'] ?></td>
                            <td class="py-2"><?php echo $rows['email'] ?></td>
                            <td class="py-2"><?php echo $rows['balance'] ?></td>
                        </tr>
                    </table>
                </div>
                <br><br><br>
                <label style="color : black;"><b>Transfer To:</b></label>
                <select name="to" class="form-control" required>
                        <option value="" disabled selected>Choose</option>
                        <?php
                            include 'config.php';
                            //session_start();
                            $sid=$_GET['id'];
                            $sql = "SELECT * FROM users where id!=$sid";
                            $result=mysqli_query($conn,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <option class="table" value="<?php echo $rows['id'];?>" >
                        <?php 
                            if($rows['email'] == "adminmybank@mybank.com")
                            {
                                continue;
                            }
                            else
                            {
                                echo $rows['name'] ;?> (
                                <?php echo $rows['email'] ;?> ) 
                        </option>
                        <?php 
                            }
                        } 
                        ?>
                </select><br><br>
                <!--<div>-->
                <label style="color : black;"><b>Amount:</b></label>
                <input type="number" class="form-control" name="amount" placeholder="Enter Amount" required >   
                <br><br>
                <div class="text-center" >
                    <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer</button>
                </div>
            </form>

        <!--particular user transaction detail-->
        <div class="container">
            <h2 class="text-center pt-4" style="color : indigo;">Transaction History</h2><br>
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped table-condensed table-bordered">
                    <thead style="color : black;">
                        <tr>
                            <th class="text-center">User Id</th>
                            <th class="text-center">Sender</th>
                            <th class="text-center">Receiver</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            include 'config.php';
                            //session_start();
                            $sid=$_GET['id'];
                            $sql ="select * from transaction where id=$sid";

                            $query =mysqli_query($conn, $sql);

                            while($rows = mysqli_fetch_assoc($query))
                            {
                        ?>

                            <tr style="color : black;">
                            <td class="py-2"><?php echo $rows['id']; ?></td>
                            <td class="py-2"><?php echo $rows['sender']; ?></td>
                            <td class="py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="py-2"><?php echo $rows['balance']; ?> </td>
                            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
                            </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>

            </div>
        </div><br><br>
        <!--transaction detail end-->

        <!--main container end-->
    </div>
    <?php include 'footer.php';?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>