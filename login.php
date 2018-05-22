<?php
$message="";
if (isset($_POST["email"]))
{
    extract($_POST);
    $password=md5($password);
    require "connect.php";
    $sql="select * from users where email='$email' and password='$password'";
    //echo $sql;
    $result=mysqli_query($conn,$sql);
    $number=mysqli_num_rows($result);
   // echo $number;
    if($number==1)
    {
        session_start();
        $row=mysqli_fetch_assoc($result);
        extract($row);
        $_SESSION["id"]=$id;
        $_SESSION["names"]=$names;
        $_SESSION["role"]=$role;
        header("location:home.php");
        //var_dump($_SESSION);
    }
    else
    {
        $message= "Failed.Wrong username or password";
    }
}



?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="register.php">Library sytem</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="register.php">Register</a></li>
            <li class="active"><a href="login.php">login</a></li>
        </ul>
    </div>
</nav>
<?php
echo $message;

?>
<div class="col-sm-4 col-sm-offset-4">
    <h2 class="text-center">Sign in Here</h2>
    <form method="post" action="">
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

</div>


</body>
</html>
