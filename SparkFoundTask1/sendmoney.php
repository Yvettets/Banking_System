<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Send money</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="background-color: #87CEEB;">
    <?php include 'connect.php'; ?>
    <style>
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed fixed-top"
        style="font-family:candara; font-size:18px; box-shadow: 0px 0px 10px 0px white;">
        <div class="container-fluid">
        <a href="index.php"><img src="pic/bank.jpg" alt=""
                style="height: 80px;width:100px; margin-left:25px; margin-top:10px;border-radius: 10px;">
            </a>
        </div>
        <div>
            <b>
                <ul class="navbar-nav ">
                    <li class="nav-item nav-links" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" aria-current="page"style="color:white;"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; ">
                        <a class="nav-link text-nowrap active" style="color:white;" href="sendmoney.php">Send Money</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" style="color:white;" href="allcust.php">View All Customers</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" style="color:white;" href="transactions.php">Transactions</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; margin-right:75px;">
                        <a class="nav-link text-nowrap" style="color:white;" href="aboutus.php">About Us</a>
                    </li>
                </ul>
            </b>
        </div>
    </nav>
    <style>
        .formin {
            border-radius: 20px;
            width: 380px;
            height: 50px;
            padding: 5px 5px 5px 15px;
        }
        td {
            padding-top: 5px;
            padding-bottom: 10px;
        }
    </style>
    <center>
        <div class="container" style="margin-top:2%;">
           <br><br><br><br>
           <h1 style=" color:white;">Transfer Money</h1>
           <br><br>
            <div border-radius:5px;  ">
                <form action="sendmoney.php" method="post">
                    <table>
                        <tr>
                            <td><input type="text" class="formin form-control" name="email1" id=""
                                    placeholder="Sender's Email"
                                    value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"></td>
                        <tr>
                        <tr>
                            <td><input type="number" class="formin form-control" name="amount" id=""
                                    placeholder="Amount to Transfer"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="formin form-control" name="email2" id=""
                                    placeholder="Receiver's  Email"></td>
                        </tr>
                    </table>
                    <br><input class="btn btn-outline-primary" style=" color:black;" type="submit" value="Transfer"><br><br>
                    <p style="color:white;">If you'd like to check your balance, you can click <a href="checkblc.php">here</a></p>
                </form>
            </div>
        </div>
        <?php 
           $servername = "localhost";
           $username = "root"; 
           $password = "";
           $database = "banksys";
           $conn = mysqli_connect($servername, $username, $password, $database);
           if(!$conn){
	           die("Connection not established: ".mysqli_connect_error());
           }else{
               if($_SERVER['REQUEST_METHOD']== 'POST'){
                   $sender = $_POST['email1'];
                   $amount = $_POST['amount'];
                   $receiver = $_POST['email2'];
                   $checkblcquery = "SELECT `CurrentBalance` FROM `bank` WHERE `E-mail` = '$sender'";
                   $checkblc = mysqli_query($conn, $checkblcquery);
                   $ava_blc = null;
                   if ($checkblc) {
                       $row = mysqli_fetch_assoc($checkblc);
                       if ($row !== null && isset($row['CurrentBalance'])) {
                          $ava_blc = $row['CurrentBalance'];
                       }
                    }
                    if (empty($sender) || empty($amount) || empty($receiver)) {
                        echo '<div class="alert alert-danger align-items-center text-center" style="width:50%;" role="alert">
                        <div> Please fill in all required fields! </div></div>';
                    }else {
                        $checkblc = mysqli_query($conn, $checkblcquery);
                        if($ava_blc >= $amount){
                        $sql1 = "UPDATE `bank` SET `CurrentBalance` = `CurrentBalance` - $amount WHERE `E-mail` = '$sender'";
                        $sql2 = "UPDATE `bank` SET `CurrentBalance` = `CurrentBalance` + $amount WHERE `E-mail` = '$receiver'";
                        $result1 = mysqli_query($conn, $sql1);
                        $result2 = mysqli_query($conn, $sql2);
                        if($result1 && $result2){
                           echo '<div class="alert alert-danger" style="width:50%;" role="alert">
                           <div>The money was sent!</div></div></div>';
                           $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$receiver', '$amount', 'succeed')";
                           $sqltransact = mysqli_query($conn, $sqltran);
                        }else{
                            echo '<div class="alert alert-danger" role="alert">
                            <div> Wrong transfer! </div></div>';
                            $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$receiver', '$amount', 'failed')";
                            $sqltransact = mysqli_query($conn, $sqltran);
                        }
                    }else{
                       echo '<div class="alert alert-danger" style="width:50%;" role="alert">
                       <div><h2>No Sufficient Balance in Account!</h2></div></div></div> ';
                       $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$receiver', '$amount', 'failed')";
                       $sqltransact = mysqli_query($conn, $sqltran); 
                    }
                }
            }
        }
    ?>
    </center>
</body>
</html>