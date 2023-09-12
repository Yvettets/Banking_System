<!doctype html>
<html lang="en">

<head> 
<title>Check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Check Balance</title>
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
    </style>
    <center>
        <div class="container" style="margin-top: 10%; padding:10px 80px 10px 80px; ">
            <div>
                <h1 style=" color:white;">Check Account Balance</h1>
            </div>
            <div class="container"
                style=" backdrop-filter: blur(5px);  border-radius:2px; padding: 20px 20px 20px 20px; margin-top:50px; width:60%;">
             <form action="checkblc.php" method="post">
            <input type="text" class="formin form-control" name="email" id="email" placeholder="Email"><br>
            <input class="btn btn-outline-primary" type="submit" value="Check Balance"><br><br>
        </form>
        </div>
        </div>
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $database = "banksys";
          $conn = mysqli_connect($servername, $username, $password, $database);
          if (!$conn) {
             die("Connection not established: " . mysqli_connect_error());
           }
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $email = $_POST['email'];
          $sql = "SELECT CurrentBalance FROM bank WHERE `E-mail`='$email'";
          $result = mysqli_query($conn, $sql);
          if ($result && mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              $balance = $row['CurrentBalance'];
              echo '<h2> ' . $balance .'<i class="fas fa-dollar-sign" aria-hidden="true"></i> </h2>';
          } else {
              echo '<div class="alert alert-danger align-items-center text-center" style="width:34%;" role="alert">
              <div><h2>No results found or something went wrong!</h2></div>
              </div>';
           }
          }
       ?>
    </center>
</body>
</html>