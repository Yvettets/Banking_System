<!doctype html>
<html lang="en">

<head>
<title>Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <title>All customers</title>
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
                        <a class="nav-link text-nowrap" aria-current="page" style="color:white;" href="index.php">Home</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; ">
                        <a class="nav-link text-nowrap" style="color:white;" href="sendmoney.php">Send Money</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap active" style="color:white;" href="allcust.php">View All Customers</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px;">
                        <a class="nav-link text-nowrap" style="color:white;" href="transactions.php">Transactions</a>
                    </li>
                    <li class="nav-item" style="margin-left:15px; margin-right:75px;">
                        <a class="nav-link text-nowrap"  style="color:white;" href="aboutus.php">About Us</a>
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
                <h1 style=" color:white;">All Customers</h1>
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
                   $sql = "SELECT * FROM `bank` ";
                   $result = mysqli_query($conn, $sql);
            ?>
            <table  style="background-color:#B9D9EB;margin-top: 30px;width:100%;height:100%;">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Current Balance</th>
                        <th scope="col">Send Money From</th>
                    </tr>
                </thead>
                <?php
                   echo "<tbody>";
                   while($row = mysqli_fetch_assoc($result)){
                   echo    '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['Name'].'</td>
                            <td>'.$row['E-mail'].'</td>
                            <td>'.$row['CurrentBalance'].'</td>
                            <td style="padding:10px 10px 10px 10px">
                              <a href="sendmoney.php?reads='.$row['E-mail'].'"
                               <button type="button" style="background-color:87CEEB;"  class="btn btn-outline-primary">Send Money</button>
                              </a>
                            </td>
                        </tr>';
                    }
                } 
                     echo "</tbody>";
                ?>
        </div>
    </center>
</body>
</html>