<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SAJJID JHADU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="signup.php">SIGNUP PAGE</a></li>
            <li><a class="dropdown-item" href="logout.php">LOGOUT PAGE</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="welcome.php">welcome to php</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>






<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
require 'base/dbconn.php';
$username = $_POST["username"];
$useremail = $_POST["useremail"];
$password = $_POST["userpass"];
$confirmpassword = $_POST["usercpass"];
$contact = $_POST["usercontact"];

$sqlemail = "SELECT * FROM `sajjid` WHERE Email = '$useremail'";
$result = mysqli_query($connection,$sqlemail);
$row = mysqli_num_rows($result);

if($row>0){
    echo "useremail already exist";
}else{
    if($password == $confirmpassword){
        $hashpass = password_hash($password,PASSWORD_DEFAULT);
        $sqlinsert = "INSERT INTO `sajjid`( `Name`, `Email`, `Password`, `Contact`) VALUES ('$username','$useremail','$hashpass','$contact')";
        $resultins = mysqli_query($connection,$sqlinsert);
        if($resultins){
            echo "inserted";
        }
    }else{
        echo "password doesnot match";
    }
}

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        .demo{ background: #F2F2F2; }
.form-container{
    background-color: #e8ddbf;
    font-family: 'Nunito', sans-serif;
    text-align: center;
    padding: 60px 100px 100px;
    border-radius: 50%;
}
.form-container .title{
    color: #666157;
    font-size: 30px;
    font-weight: 700;
    text-transform: capitalize;
    margin: 0 0 20px;
    display: inline-block;
    position: relative;
}
.form-container .form-horizontal .form-group{
    font-size: 0px;
    margin: 0 0 15px;
}
.form-container .form-horizontal .form-control{
    color: #666157;
    background: #E6E6E6;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 1px;
    height: 45px;
    padding: 6px 30px;
    border-radius: 50px;
    box-shadow: inset -3px -3px 10px #eee;
    border: none;
    border-top: 2px solid #CECECE;
    border-left: 2px solid #CECECE;
}
.form-container .form-horizontal .form-control:focus{
    outline: none;
    box-shadow: none;
}
.form-container .form-horizontal .form-control::placeholder{
    color: #666157; 
    font-weight: 600;  
    font-style: italic;
}
.form-container .form-horizontal .btn{
    color: #fff;
    background-color: #e6a760;
    font-size: 25px;
    font-weight: 700;
    font-style: italic;
    text-transform: capitalize;
    width: 100%;
    border: none;
    border-radius: 50px;
    box-shadow: inset -3px -3px 10px #bd841b;
    transition: all 0.3s ease 0s;
}
.form-container .form-horizontal .btn:hover{ letter-spacing: 3px; }
.form-container .form-horizontal .btn:focus{ outline: none; }
@media only screen and (max-width:479px){
    .form-container{
        padding: 50px 50px 70px;
        border-radius: 30%;
    }
}

    </style>
  </head>
  <body>
  <div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="form-container">
                    <h3 class="title">SIGN UP PAGE</h3>
                    <form class="form-horizontal" action = "signup.php" method = "post">
                        <div class="form-group">
                            <label>username</label>
                            <input type="text" class="form-control" placeholder="username" name = "username">
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                            <input type="email" class="form-control" placeholder="useremail" name = "useremail">
                        </div>
                        <div class="form-group">
                        <label>password</label>
                            <input type="password" class="form-control" placeholder="Password" name = "userpass">
                        </div>
                        <div class="form-group">
                        <label>confirm password</label>
                            <input type="password" class="form-control" placeholder="confirmPassword" name = "usercpass">
                        </div>
                        <div class="form-group">
                        <label>Contact</label>
                            <input type="text" class="form-control" placeholder="contact" name = "usercontact">
                        </div>
                       
                        <button class="btn btn-default"> Sign up  </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>