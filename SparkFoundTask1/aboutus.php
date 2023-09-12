<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>About us</title>
</head>
<body style="background-color: #87CEEB;" >
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
                        <a class="nav-link text-nowrap active" style="color:white;" href="aboutus.php">About Us</a>
                    </li>
                </ul>
            </b>
        </div>
    </nav>
    <div class="div4" >
        <br><br><br><br><br>
        <img src="pic/bc1.webp" style=" border-radius:10px;margin-left:590px; margin-bottom:20px;width:300px; ">
        <br><br>
        <center>
            <p style="color:white;"><h1>Created by</h1></p>
            <h1 style="color:white;"> Yvette Tannous</h1>
            <p><h2 style="color:white;"><b>Internship at Sparks Foundation <br>I'm a Lebanese University student in Lebanon. <br></b></h2></p>
            <br>
        </center>
    </div>
</body>
</html>