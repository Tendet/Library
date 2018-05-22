<?php
require "protector.php";
$message ="";
if (isset($_POST["names"]))
{
    extract($_POST);
    if (empty($names) or empty($email) or empty($password)) {
        echo "Empty Fields!!!!";
        die();
    }
    require "connect.php";//include require_once
    $password = md5($password);
    $sql = "insert into users values(null,'$names','$email','$password','Normal')";
    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        $message = "<p class='text-success'>Registration was a success</p>";
    } else
    {
        $message="<p class='text-danger'>Registration Failed. Please Contact the admin</p>";
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
            <li class="active"><a href="register.php">Register</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </div>
</nav>

<div class="col-sm-4 col-sm-offset-4">
    <h2 class="text-center">Register Here</h2>

    <?php echo $message; ?>
<form action="" method="post">
        <div class="form-group">
            <input type="text" required name="names" class="form-control" placeholder="name">
        </div>
        <div class="form-group">
            <input type="email" required name="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
            <input type="password" required name="password" class="form-control" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

</div>


</body>
</html>
