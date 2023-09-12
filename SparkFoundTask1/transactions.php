<!doctype html>
<html lang="en">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <title>Transactions </title>
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
                        <a class="nav-link text-nowrap" aria-current="page" style="color:white;" href="index.php">Home</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; ">
                        <a class="nav-link text-nowrap"style="color:white;"  href="sendmoney.php">Send Money</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" style="color:white;"  href="allcust.php">View All Customers</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap active" style="color:white;" href="transactions.php">Transactions</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; margin-right:75px;">
                        <a class="nav-link text-nowrap" style="color:white;" href="aboutus.php">About Us</a>
                    </li>
                </ul>
            </b>
        </div>
    </nav>
    <style>
        th,
        td {
            text-align: center;
        }
    </style>
    <center>
        <div class="container" style="margin-top: 10%; padding:10px 80px 10px 80px; ">
            <div>
                <h1 style=" color:white;">All Transactions</h1>
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
                $sql = "SELECT * FROM `transactions`";
                $result = mysqli_query($conn, $sql);
            ?>
            <table style="background-color:#B9D9EB;margin-top: 30px;width:100%;height:100%;">
                <thead>
                    <tr>
                        <th scope="col">Sender</th>
                        <th scope="col">Receiver</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php
                   echo "<tbody>";
                   while($row = mysqli_fetch_assoc($result)){
                   if(!(empty($row['sender']) && empty($row['receiver']) && empty($row['amount']))){
                       echo    '
                          <tr>
                             <td>'.$row['sender'].'</td>
                             <td>'.$row['receiver'].'</td>
                             <td>'.$row['amount'].'</td>
                             <td>'; ?> <?php if($row['status'] == "succeed"){echo '<b><p style="color:green;">Succeed Transaction.</p></b>';}else{echo '<b><p style="color:red;">Failed Transaction.</p></b>';} ?>
                               <?php echo '</td>
                          </tr>';}
                    }
    
                   }
                   echo "</tbody>";
                ?>
        </div>
    </center>
</body>
</html>
